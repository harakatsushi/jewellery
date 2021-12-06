<?php

namespace App\Admin\Controllers;

use Log;
use App\Csv;
use App\Emission;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Extensions\Tools\ImportButton;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class CsvController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '排出事業者CSV';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Csv);

        $grid->column('id', __('Id'));
        $grid->column('number1', __('Number1'));
        $grid->column('number2', __('Number2'));
        $grid->column('number3', __('Number3'));
        $grid->column('recv_date', __('Recv date'));
        $grid->column('haishutsu_code', __('Haishutsu code'));
        $grid->column('recv_tanto', __('Recv tanto'));
        $grid->column('reg_tanto', __('Reg tanto'));
        $grid->column('haiki_code', __('Haiki code'));
        $grid->column('haiki_name', __('Haiki name'));
        $grid->column('haiki_cnt', __('Haiki cnt'));
        $grid->column('haiki_number_tani', __('Haiki number tani'));
        $grid->column('nisugata_code', __('Nisugata code'));
        $grid->column('nisugata_cnt', __('Nisugata cnt'));
        $grid->column('nisugata_cnt_kakutei', __('Nisugata cnt kakutei'));
        $grid->column('hazardous1', __('Hazardous1'));
        $grid->column('hazardous2', __('Hazardous2'));
        $grid->column('hazardous3', __('Hazardous3'));
        $grid->column('hazardous4', __('Hazardous4'));
        $grid->column('hazardous5', __('Hazardous5'));
        $grid->column('hazardous6', __('Hazardous6'));
        $grid->column('shushu_number1', __('Shushu number1'));
        $grid->column('saiitaku_nuber1', __('Saiitaku nuber1'));
        $grid->column('unpan_code1', __('Unpan code1'));
        $grid->column('car_number1', __('Car number1'));
        $grid->column('unpan_tanto1', __('Unpan tanto1'));
        $grid->column('kanyu_nymber1', __('Kanyu nymber1'));
        $grid->column('unpan_number1', __('Unpan number1'));
        $grid->column('shushu_number2', __('Shushu number2'));
        $grid->column('saiitaku_nuber2', __('Saiitaku nuber2'));
        $grid->column('unpan_code2', __('Unpan code2'));
        $grid->column('car_number2', __('Car number2'));
        $grid->column('unpan_tanto2', __('Unpan tanto2'));
        $grid->column('kanyu_nymber2', __('Kanyu nymber2'));
        $grid->column('unpan_number2', __('Unpan number2'));
        $grid->column('shushu_number3', __('Shushu number3'));
        $grid->column('saiitaku_nuber3', __('Saiitaku nuber3'));
        $grid->column('unpan_code3', __('Unpan code3'));
        $grid->column('car_number3', __('Car number3'));
        $grid->column('unpan_tanto3', __('Unpan tanto3'));
        $grid->column('kanyu_nymber3', __('Kanyu nymber3'));
        $grid->column('unpan_number3', __('Unpan number3'));
        $grid->column('shushu_number4', __('Shushu number4'));
        $grid->column('saiitaku_nuber4', __('Saiitaku nuber4'));
        $grid->column('unpan_code4', __('Unpan code4'));
        $grid->column('car_number4', __('Car number4'));
        $grid->column('unpan_tanto4', __('Unpan tanto4'));
        $grid->column('kanyu_nymber4', __('Kanyu nymber4'));
        $grid->column('unpan_number4', __('Unpan number4'));
        $grid->column('shushu_number5', __('Shushu number5'));
        $grid->column('saiitaku_nuber5', __('Saiitaku nuber5'));
        $grid->column('unpan_code5', __('Unpan code5'));
        $grid->column('car_number5', __('Car number5'));
        $grid->column('unpan_tanto5', __('Unpan tanto5'));
        $grid->column('kanyu_nymber5', __('Kanyu nymber5'));
        $grid->column('unpan_number5', __('Unpan number5'));
        $grid->column('shobun_number', __('Shobun number'));
        $grid->column('saiitaku_number', __('Saiitaku number'));
        $grid->column('shobun_jigyou_code', __('Shobun jigyou code'));
        $grid->column('shobun_hoho', __('Shobun hoho'));
        $grid->column('last_shobun_kbn', __('Last shobun kbn'));
        $grid->column('last_shobun_code1', __('Last shobun code1'));
        $grid->column('last_shobun_code2', __('Last shobun code2'));
        $grid->column('last_shobun_code3', __('Last shobun code3'));
        $grid->column('last_shobun_code4', __('Last shobun code4'));
        $grid->column('last_shobun_code5', __('Last shobun code5'));
        $grid->column('last_shobun_code6', __('Last shobun code6'));
        $grid->column('last_shobun_code7', __('Last shobun code7'));
        $grid->column('last_shobun_code8', __('Last shobun code8'));
        $grid->column('last_shobun_code9', __('Last shobun code9'));
        $grid->column('last_shobun_code10', __('Last shobun code10'));
        $grid->column('note1', __('Note1'));
        $grid->column('note2', __('Note2'));
        $grid->column('note3', __('Note3'));
        $grid->column('note4', __('Note4'));
        $grid->column('note5', __('Note5'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
// 作成したImportButtonをツールに表示
        $grid->tools(function ($tools) {
            $tools->append(new ImportButton('csvs'));
        });

$grid->filter(function ($filter) {
   $filter->between('created_at', '登録日時')->datetime();
});
        return $grid;
    }
    protected function importCsv( Request $request)
    {

    // CSVファイルをサーバーに保存
        $temporary_csv_file = $request->file('file')->store('csv');
        $fp = fopen(storage_path('app/') . $temporary_csv_file, 'r');

        // TODO:サイズが大きいCSVファイルを読み込む場合、この処理ではメモリ不足になる可能性がある為改修が必要になる
        while ($row = fgetcsv($fp)) {

            foreach ($row as $key => $value) {
                $row[$key]=mb_convert_encoding($value,'UTF-8','SHIFT_JIS')  ;
            }
            $csv=new CSV();
            Log::info(print_r($row,true));
            $csv->setAttribute('number1', $row[0]);
            $csv->setAttribute('number2', $row[1]);
            $csv->setAttribute('number3', $row[2]);
            $csv->setAttribute('recv_date', $row[3]);
            $csv->setAttribute('haishutsu_code', $row[4]);
            $csv->setAttribute('recv_tanto', $row[5]);
            $csv->setAttribute('reg_tanto', $row[6]);
            $csv->setAttribute('haiki_code', $row[7]);
            $csv->setAttribute('haiki_name', $row[8]);
            $csv->setAttribute('haiki_cnt', $row[9]);
            $csv->setAttribute('haiki_number_tani', $row[10]);
            $csv->setAttribute('nisugata_code', $row[11]);
            $csv->setAttribute('nisugata_cnt', $row[12]);
            $csv->setAttribute('nisugata_cnt_kakutei', $row[13]);
            $csv->setAttribute('hazardous1', $row[14]);
            $csv->setAttribute('hazardous2', $row[15]);
            $csv->setAttribute('hazardous3', $row[16]);
            $csv->setAttribute('hazardous4', $row[17]);
            $csv->setAttribute('hazardous5', $row[18]);
            $csv->setAttribute('hazardous6', $row[19]);
            $csv->setAttribute('shushu_number1', $row[20]);
            $csv->setAttribute('saiitaku_nuber1', $row[21]);
            $csv->setAttribute('unpan_code1', $row[22]);
            $csv->setAttribute('car_number1', $row[23]);
            $csv->setAttribute('unpan_tanto1', $row[24]);
            $csv->setAttribute('kanyu_nymber1', $row[25]);
            $csv->setAttribute('unpan_number1', $row[26]);
            $csv->setAttribute('shushu_number2', $row[27]);
            $csv->setAttribute('saiitaku_nuber2', $row[28]);
            $csv->setAttribute('unpan_code2', $row[29]);
            $csv->setAttribute('car_number2', $row[30]);
            $csv->setAttribute('unpan_tanto2', $row[31]);
            $csv->setAttribute('kanyu_nymber2', $row[32]);
            $csv->setAttribute('unpan_number2', $row[33]);
            $csv->setAttribute('shushu_number3', $row[34]);
            $csv->setAttribute('saiitaku_nuber3', $row[35]);
            $csv->setAttribute('unpan_code3', $row[36]);
            $csv->setAttribute('car_number3', $row[37]);
            $csv->setAttribute('unpan_tanto3', $row[38]);
            $csv->setAttribute('kanyu_nymber3', $row[39]);
            $csv->setAttribute('unpan_number3', $row[40]);
            $csv->setAttribute('shushu_number4', $row[41]);
            $csv->setAttribute('saiitaku_nuber4', $row[42]);
            $csv->setAttribute('unpan_code4', $row[43]);
            $csv->setAttribute('car_number4', $row[44]);
            $csv->setAttribute('unpan_tanto4', $row[45]);
            $csv->setAttribute('kanyu_nymber4', $row[46]);
            $csv->setAttribute('unpan_number4', $row[47]);
            $csv->setAttribute('shushu_number5', $row[48]);
            $csv->setAttribute('saiitaku_nuber5', $row[49]);
            $csv->setAttribute('unpan_code5', $row[50]);
            $csv->setAttribute('car_number5', $row[51]);
            $csv->setAttribute('unpan_tanto5', $row[52]);
            $csv->setAttribute('kanyu_nymber5', $row[53]);
            $csv->setAttribute('unpan_number5', $row[54]);
            $csv->setAttribute('shobun_number', $row[55]);
            $csv->setAttribute('saiitaku_number', $row[56]);
            $csv->setAttribute('shobun_jigyou_code', $row[57]);
            $csv->setAttribute('shobun_hoho', $row[58]);
            $csv->setAttribute('last_shobun_kbn', $row[59]);
            $csv->setAttribute('last_shobun_code1', $row[60]);
            $csv->setAttribute('last_shobun_code2', $row[61]);
            $csv->setAttribute('last_shobun_code3', $row[62]);
            $csv->setAttribute('last_shobun_code4', $row[63]);
            $csv->setAttribute('last_shobun_code5', $row[64]);
            $csv->setAttribute('last_shobun_code6', $row[65]);
            $csv->setAttribute('last_shobun_code7', $row[66]);
            $csv->setAttribute('last_shobun_code8', $row[67]);
            $csv->setAttribute('last_shobun_code9', $row[68]);
            $csv->setAttribute('last_shobun_code10', $row[69]);
            $csv->setAttribute('note1', $row[70]);
            $csv->setAttribute('note2', $row[71]);
            $csv->setAttribute('note3', $row[72]);
            $csv->setAttribute('note4', $row[73]);
            $csv->setAttribute('note5', $row[74]);
            $csv->save();

        }

     
    }
    public function excel($id)
    {
        $excel_file = storage_path('excel/template.xlsx');

        $cvs=CSV::find($id);
        $emission=Emission::where("code",$cvs->haiki_code)->first();
        $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];
        $rate=1;
        if($emission->eigyo==="VC本部営業"){
            $rate=0.7;
        }
        $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;
        Excel::load($excel_file, function($reader)  use ($cvs,$emission,$tani_name, $tanka_name,$rate){
            // 1番目のシートを選択
            $reader->sheet(0, function($sheet)  use ($cvs,$emission,$tani_name, $tanka_name,$rate){
                $sheet->cell('F9', function($cell) use ($emission) {
                    $cell->setValue( $emission->name);
                });
                $sheet->cell('B16', function($cell) use ($cvs) {
                    $cell->setValue( $cvs->haiki_name);
                });
                 $sheet->cell('D16', function($cell) use ($cvs) {
                    $cell->setValue( $cvs->haiki_cnt);
                });
                  $sheet->cell('E16', function($cell) use ($cvs, $tani_name) {
                    $cell->setValue( $tani_name[$cvs->haiki_number_tani]);
                });
                  $sheet->cell('F16', function($cell) use ($cvs, $tanka_name) {
                    $cell->setValue( $tanka_name[$cvs->haiki_number_tani]);
                });
                    $sheet->cell('G16', function($cell) use ($cvs, $tanka_name,$rate) {
                    $cell->setValue( $cvs->haiki_cnt*$tanka_name[$cvs->haiki_number_tani]*$rate);
                });
                $sheet->cell('H3', function($cell) use ($cvs) {
                    $cell->setValue($cvs->id);
                });
                $sheet->cell('H4', function($cell)  {
                    $cell->setValue( date("Y年m月d日"));
                });
                $sheet->cell('G10', function($cell)  use ($emission) {
                    $cell->setValue(  $emission->address);
                });
            });
        })->setFilename(date("YmdHis"))->export('xlsx');
    }
    public function excel2($id)
    {
        $excel_file = storage_path('excel/template.xlsx');

        $cvs=CSV::find($id);
        $emission=Emission::where("code",$cvs->haiki_code)->first();
        $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];
        $rate=0.6;
        if($emission->eigyo==="VC本部営業"){
            $rate=0.3;
        }
        $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;
        Excel::load($excel_file, function($reader)  use ($cvs,$emission,$tani_name, $tanka_name,$rate){
            // 1番目のシートを選択
            $reader->sheet(0, function($sheet)  use ($cvs,$emission,$tani_name, $tanka_name,$rate){
                $sheet->cell('F9', function($cell) use ($emission) {
                    $cell->setValue( $emission->name);
                });
                $sheet->cell('B16', function($cell) use ($cvs) {
                    $cell->setValue( $cvs->haiki_name);
                });
                 $sheet->cell('D16', function($cell) use ($cvs) {
                    $cell->setValue( $cvs->haiki_cnt);
                });
                  $sheet->cell('E16', function($cell) use ($cvs, $tani_name) {
                    $cell->setValue( $tani_name[$cvs->haiki_number_tani]);
                });
                  $sheet->cell('F16', function($cell) use ($cvs, $tanka_name) {
                    $cell->setValue( $tanka_name[$cvs->haiki_number_tani]);
                });
                    $sheet->cell('G16', function($cell) use ($cvs, $tanka_name,$rate) {
                    $cell->setValue( $cvs->haiki_cnt*$tanka_name[$cvs->haiki_number_tani]*$rate);
                });
                $sheet->cell('H3', function($cell) use ($cvs) {
                    $cell->setValue($cvs->id);
                });
                $sheet->cell('H4', function($cell)  {
                    $cell->setValue( date("Y年m月d日"));
                });
                $sheet->cell('G10', function($cell)  use ($emission) {
                    $cell->setValue(  $emission->address);
                });
            });
        })->setFilename(date("YmdHis"))->export('xlsx');
    }
    public function excel3($id)
    {
        $excel_file = storage_path('excel/template.xlsx');

        $cvs=CSV::find($id);
        $emission=Emission::where("code",$cvs->haiki_code)->first();
        $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];
        $rate=0.4;

        $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;
        Excel::load($excel_file, function($reader)  use ($cvs,$emission,$tani_name, $tanka_name,$rate){
            // 1番目のシートを選択
            $reader->sheet(0, function($sheet)  use ($cvs,$emission,$tani_name, $tanka_name,$rate){
                $sheet->cell('F9', function($cell) use ($emission) {
                    $cell->setValue( $emission->name);
                });
                $sheet->cell('B16', function($cell) use ($cvs) {
                    $cell->setValue( $cvs->haiki_name);
                });
                 $sheet->cell('D16', function($cell) use ($cvs) {
                    $cell->setValue( $cvs->haiki_cnt);
                });
                  $sheet->cell('E16', function($cell) use ($cvs, $tani_name) {
                    $cell->setValue( $tani_name[$cvs->haiki_number_tani]);
                });
                  $sheet->cell('F16', function($cell) use ($cvs, $tanka_name) {
                    $cell->setValue( $tanka_name[$cvs->haiki_number_tani]);
                });
                    $sheet->cell('G16', function($cell) use ($cvs, $tanka_name,$rate) {
                    $cell->setValue( $cvs->haiki_cnt*$tanka_name[$cvs->haiki_number_tani]*$rate);
                });
                $sheet->cell('H3', function($cell) use ($cvs) {
                    $cell->setValue($cvs->id);
                });
                $sheet->cell('H4', function($cell)  {
                    $cell->setValue( date("Y年m月d日"));
                });
                $sheet->cell('G10', function($cell)  use ($emission) {
                    $cell->setValue(  $emission->address);
                });
            });
        })->setFilename(date("YmdHis"))->export('xlsx');
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Csv::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number1', __('Number1'));
        $show->field('number2', __('Number2'));
        $show->field('number3', __('Number3'));
        $show->field('recv_date', __('Recv date'));
        $show->field('haishutsu_code', __('Haishutsu code'));
        $show->field('recv_tanto', __('Recv tanto'));
        $show->field('reg_tanto', __('Reg tanto'));
        $show->field('haiki_code', __('Haiki code'));
        $show->field('haiki_name', __('Haiki name'));
        $show->field('haiki_cnt', __('Haiki cnt'));
        $show->field('haiki_number_tani', __('Haiki number tani'));
        $show->field('nisugata_code', __('Nisugata code'));
        $show->field('nisugata_cnt', __('Nisugata cnt'));
        $show->field('nisugata_cnt_kakutei', __('Nisugata cnt kakutei'));
        $show->field('hazardous1', __('Hazardous1'));
        $show->field('hazardous2', __('Hazardous2'));
        $show->field('hazardous3', __('Hazardous3'));
        $show->field('hazardous4', __('Hazardous4'));
        $show->field('hazardous5', __('Hazardous5'));
        $show->field('hazardous6', __('Hazardous6'));
        $show->field('shushu_number1', __('Shushu number1'));
        $show->field('saiitaku_nuber1', __('Saiitaku nuber1'));
        $show->field('unpan_code1', __('Unpan code1'));
        $show->field('car_number1', __('Car number1'));
        $show->field('unpan_tanto1', __('Unpan tanto1'));
        $show->field('kanyu_nymber1', __('Kanyu nymber1'));
        $show->field('unpan_number1', __('Unpan number1'));
        $show->field('shushu_number2', __('Shushu number2'));
        $show->field('saiitaku_nuber2', __('Saiitaku nuber2'));
        $show->field('unpan_code2', __('Unpan code2'));
        $show->field('car_number2', __('Car number2'));
        $show->field('unpan_tanto2', __('Unpan tanto2'));
        $show->field('kanyu_nymber2', __('Kanyu nymber2'));
        $show->field('unpan_number2', __('Unpan number2'));
        $show->field('shushu_number3', __('Shushu number3'));
        $show->field('saiitaku_nuber3', __('Saiitaku nuber3'));
        $show->field('unpan_code3', __('Unpan code3'));
        $show->field('car_number3', __('Car number3'));
        $show->field('unpan_tanto3', __('Unpan tanto3'));
        $show->field('kanyu_nymber3', __('Kanyu nymber3'));
        $show->field('unpan_number3', __('Unpan number3'));
        $show->field('shushu_number4', __('Shushu number4'));
        $show->field('saiitaku_nuber4', __('Saiitaku nuber4'));
        $show->field('unpan_code4', __('Unpan code4'));
        $show->field('car_number4', __('Car number4'));
        $show->field('unpan_tanto4', __('Unpan tanto4'));
        $show->field('kanyu_nymber4', __('Kanyu nymber4'));
        $show->field('unpan_number4', __('Unpan number4'));
        $show->field('shushu_number5', __('Shushu number5'));
        $show->field('saiitaku_nuber5', __('Saiitaku nuber5'));
        $show->field('unpan_code5', __('Unpan code5'));
        $show->field('car_number5', __('Car number5'));
        $show->field('unpan_tanto5', __('Unpan tanto5'));
        $show->field('kanyu_nymber5', __('Kanyu nymber5'));
        $show->field('unpan_number5', __('Unpan number5'));
        $show->field('shobun_number', __('Shobun number'));
        $show->field('saiitaku_number', __('Saiitaku number'));
        $show->field('shobun_jigyou_code', __('Shobun jigyou code'));
        $show->field('shobun_hoho', __('Shobun hoho'));
        $show->field('last_shobun_kbn', __('Last shobun kbn'));
        $show->field('last_shobun_code1', __('Last shobun code1'));
        $show->field('last_shobun_code2', __('Last shobun code2'));
        $show->field('last_shobun_code3', __('Last shobun code3'));
        $show->field('last_shobun_code4', __('Last shobun code4'));
        $show->field('last_shobun_code5', __('Last shobun code5'));
        $show->field('last_shobun_code6', __('Last shobun code6'));
        $show->field('last_shobun_code7', __('Last shobun code7'));
        $show->field('last_shobun_code8', __('Last shobun code8'));
        $show->field('last_shobun_code9', __('Last shobun code9'));
        $show->field('last_shobun_code10', __('Last shobun code10'));
        $show->field('note1', __('Note1'));
        $show->field('note2', __('Note2'));
        $show->field('note3', __('Note3'));
        $show->field('note4', __('Note4'));
        $show->field('note5', __('Note5'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Csv);

        $form->number('number1', __('Number1'));
        $form->number('number2', __('Number2'));
        $form->number('number3', __('Number3'));
        $form->text('recv_date', __('Recv date'));
        $form->text('haishutsu_code', __('Haishutsu code'));
        $form->text('recv_tanto', __('Recv tanto'));
        $form->text('reg_tanto', __('Reg tanto'));
        $form->text('haiki_code', __('Haiki code'));
        $form->text('haiki_name', __('Haiki name'));
        $form->text('haiki_cnt', __('Haiki cnt'));
        $form->text('haiki_number_tani', __('Haiki number tani'));
        $form->text('nisugata_code', __('Nisugata code'));
        $form->text('nisugata_cnt', __('Nisugata cnt'));
        $form->text('nisugata_cnt_kakutei', __('Nisugata cnt kakutei'));
        $form->text('hazardous1', __('Hazardous1'));
        $form->text('hazardous2', __('Hazardous2'));
        $form->text('hazardous3', __('Hazardous3'));
        $form->text('hazardous4', __('Hazardous4'));
        $form->text('hazardous5', __('Hazardous5'));
        $form->text('hazardous6', __('Hazardous6'));
        $form->text('shushu_number1', __('Shushu number1'));
        $form->text('saiitaku_nuber1', __('Saiitaku nuber1'));
        $form->text('unpan_code1', __('Unpan code1'));
        $form->text('car_number1', __('Car number1'));
        $form->text('unpan_tanto1', __('Unpan tanto1'));
        $form->text('kanyu_nymber1', __('Kanyu nymber1'));
        $form->text('unpan_number1', __('Unpan number1'));
        $form->text('shushu_number2', __('Shushu number2'));
        $form->text('saiitaku_nuber2', __('Saiitaku nuber2'));
        $form->text('unpan_code2', __('Unpan code2'));
        $form->text('car_number2', __('Car number2'));
        $form->text('unpan_tanto2', __('Unpan tanto2'));
        $form->text('kanyu_nymber2', __('Kanyu nymber2'));
        $form->text('unpan_number2', __('Unpan number2'));
        $form->text('shushu_number3', __('Shushu number3'));
        $form->text('saiitaku_nuber3', __('Saiitaku nuber3'));
        $form->text('unpan_code3', __('Unpan code3'));
        $form->text('car_number3', __('Car number3'));
        $form->text('unpan_tanto3', __('Unpan tanto3'));
        $form->text('kanyu_nymber3', __('Kanyu nymber3'));
        $form->text('unpan_number3', __('Unpan number3'));
        $form->text('shushu_number4', __('Shushu number4'));
        $form->text('saiitaku_nuber4', __('Saiitaku nuber4'));
        $form->text('unpan_code4', __('Unpan code4'));
        $form->text('car_number4', __('Car number4'));
        $form->text('unpan_tanto4', __('Unpan tanto4'));
        $form->text('kanyu_nymber4', __('Kanyu nymber4'));
        $form->text('unpan_number4', __('Unpan number4'));
        $form->text('shushu_number5', __('Shushu number5'));
        $form->text('saiitaku_nuber5', __('Saiitaku nuber5'));
        $form->text('unpan_code5', __('Unpan code5'));
        $form->text('car_number5', __('Car number5'));
        $form->text('unpan_tanto5', __('Unpan tanto5'));
        $form->text('kanyu_nymber5', __('Kanyu nymber5'));
        $form->text('unpan_number5', __('Unpan number5'));
        $form->text('shobun_number', __('Shobun number'));
        $form->text('saiitaku_number', __('Saiitaku number'));
        $form->text('shobun_jigyou_code', __('Shobun jigyou code'));
        $form->text('shobun_hoho', __('Shobun hoho'));
        $form->text('last_shobun_kbn', __('Last shobun kbn'));
        $form->text('last_shobun_code1', __('Last shobun code1'));
        $form->text('last_shobun_code2', __('Last shobun code2'));
        $form->text('last_shobun_code3', __('Last shobun code3'));
        $form->text('last_shobun_code4', __('Last shobun code4'));
        $form->text('last_shobun_code5', __('Last shobun code5'));
        $form->text('last_shobun_code6', __('Last shobun code6'));
        $form->text('last_shobun_code7', __('Last shobun code7'));
        $form->text('last_shobun_code8', __('Last shobun code8'));
        $form->text('last_shobun_code9', __('Last shobun code9'));
        $form->text('last_shobun_code10', __('Last shobun code10'));
        $form->text('note1', __('Note1'));
        $form->text('note2', __('Note2'));
        $form->text('note3', __('Note3'));
        $form->text('note4', __('Note4'));
        $form->text('note5', __('Note5'));

        return $form;
    }
}
