<?php

namespace App\Admin\Controllers;
use DB;
use App\Csv;
use App\Emission;
use App\SummaryParent;
use App\Transportation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Maatwebsite\Excel\Facades\Excel;
class SummaryParentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '集計フォーム';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SummaryParent);

        $grid->column('id', __('Id'));
        $grid->column('code', __('排出事業者名'));
        $grid->column('recv_date', __('月日'));
        $grid->column('packing', __('荷姿'));
        $grid->column('haiki_cnt', __('数量'));
        $grid->column('haiki_number_tani', __('単位'));
        $grid->column('total1', __('収集運搬費'));
        $grid->column('total2', __('中間処理費'));
        $grid->column('total3', __('容器代'));
        $grid->column('total4', __('管理費'));
        $grid->column('price', __('金額'));
        $grid->column('kg', __('中間処理重量（Kｇ)'));

        $grid->filter(function ($filter) {
            $filter->column(1/2, function ($filter) {
                $filter->disableIdFilter();
            });

        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Company::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('排出事業者名'));
        $show->field('packing', __('荷姿'));
        $show->field('price1', __('収集運搬単価'));
        $show->field('price2', __('中間処理単価'));
        $show->field('price3', __('容器単価'));
        $show->field('price4', __('管理費'));
        $show->field('price5', __('契約単価'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }
    public function excel()
    {
        $excel_file = storage_path('excel/template.xlsx');
        $_GET["date"]=str_replace("年", "", $_GET["date"]);
        $_GET["date"]=str_replace("月", "", $_GET["date"]);
        $csvs=CSV::where("haishutsu_code",$_GET["code"])->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m')"), '=',$_GET["date"])->get();
        $emission=Emission::where("code",$_GET["code"])->first();
                $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];
        $rate=0.6;
        if($emission->eigyo==="VC本部営業"){
            $rate=0.3;
        }
       // $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;
        Excel::load($excel_file, function($reader)  use ($csvs,$emission,$tani_name, $tanka_name,$rate){
            // 1番目のシートを選択
            $reader->sheet(0, function($sheet)  use ($csvs,$emission,$tani_name, $tanka_name,$rate){
                $sheet->cell('F9', function($cell) use ($emission) {
                    $cell->setValue( $emission->name);
                });
                 $sheet->cell('G10', function($cell)  use ($emission) {
                        $cell->setValue(  $emission->address);
                });
                 $ind=16;
                foreach ($csvs as $key => $cvs) {

                    $sheet->cell('B'.( $ind+$key), function($cell) use ($cvs) {
                        $cell->setValue( $cvs->haiki_name);
                    });
                     $sheet->cell('D'.( $ind+$key), function($cell) use ($cvs) {
                        $cell->setValue( $cvs->haiki_cnt);
                    });
                      $sheet->cell('E'.( $ind+$key), function($cell) use  ($emission) {
                        $cell->setValue( $emission->k_type);
                    });
                      $sheet->cell('F'.( $ind+$key), function($cell) use ($emission,$rate) {
                        $cell->setValue( $emission->price1*$rate);
                    });
                        $sheet->cell('G'.( $ind+$key), function($cell) use ($emission,$cvs, $tanka_name,$rate) {
                        $cell->setValue( $cvs->haiki_cnt*$emission->price1*$rate);
                    });
                    $sheet->cell('H3', function($cell) use ($cvs) {
                        $cell->setValue($cvs->id);
                    });
                    $sheet->cell('H4', function($cell)  {
                        $cell->setValue( date("Y年m月d日"));
                    });

                }

            });
        })->setFilename(date("YmdHis"))->export('xlsx');
    }
    public function excel2()
    {
        $excel_file = storage_path('excel/template.xlsx');

        $_GET["date"]=str_replace("年", "", $_GET["date"]);
        $_GET["date"]=str_replace("月", "", $_GET["date"]);
        $csvs=CSV::where("haishutsu_code",$_GET["code"])->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m')"), '=',$_GET["date"])->get();
        $emission=Emission::where("code",$_GET["code"])->first();
        $transportation=Transportation::find($emission->kameiten);
        $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];
        $rate=1;
        if($emission->eigyo==="VC本部営業"){
            $rate=0.7;
        }
      //  $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;
        Excel::load($excel_file, function($reader)  use ($csvs,$emission,$tani_name, $tanka_name,$rate, $transportation){
            // 1番目のシートを選択
            $reader->sheet(0, function($sheet)  use ($csvs,$emission,$tani_name, $tanka_name,$rate, $transportation){
                $sheet->cell('F9', function($cell) use ($transportation) {
                    $cell->setValue( $transportation->name);
                });
                 $sheet->cell('G10', function($cell)  use ($emission) {
                        $cell->setValue(  $emission->address);
                });
                 $ind=16;
                foreach ($csvs as $key => $cvs) {

                    $sheet->cell('B'.( $ind+$key), function($cell) use ($cvs) {
                        $cell->setValue( $cvs->haiki_name);
                    });
                     $sheet->cell('D'.( $ind+$key), function($cell) use ($cvs) {
                        $cell->setValue( $cvs->haiki_cnt);
                    });
                      $sheet->cell('E'.( $ind+$key), function($cell) use ($emission) {
                       $cell->setValue( $emission->k_type);
                    });
                      $sheet->cell('F'.( $ind+$key), function($cell) use ($emission,$rate) {
                        $cell->setValue( $emission->price4);
                    });
                        $sheet->cell('G'.( $ind+$key), function($cell) use ($emission,$cvs, $tanka_name,$rate) {
                        $cell->setValue( $cvs->haiki_cnt*$emission->price1*$emission->price4);
                    });
                    $sheet->cell('H3', function($cell) use ($cvs) {
                        $cell->setValue($cvs->id);
                    });
                    $sheet->cell('H4', function($cell)  {
                        $cell->setValue( date("Y年m月d日"));
                    });

                }

            });
        })->setFilename(date("YmdHis"))->export('xlsx');
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Company);

        $form->text('name', __('Name'));
        $form->text('packing', __('排出事業者名'));
        $form->number('price1', __('収集運搬単価'));
        $form->number('price2', __('中間処理単価'));
        $form->number('price3', __('容器単価'));
        $form->number('price4', __('管理費'));
        $form->number('price5', __('契約単価'));

        return $form;
    }
}
