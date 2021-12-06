<?php

namespace App\Admin\Controllers;

use Log;
use App\Csv3;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Extensions\Tools\ImportButton;
use Illuminate\Http\Request;
class Csv3Controller extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '処分終了報告CSV';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Csv3);

        $grid->column('id', __('Id'));
        $grid->column('number1', __('Number1'));
        $grid->column('kbn', __('Number3'));
        $grid->column('end_date', __('Number3'));
        $grid->column('shobun_tanto', __('Recv date'));
        $grid->column('hokoku_tanto', __('Haishutsu code'));
        $grid->column('recv_date', __('Recv tanto'));
        $grid->column('unpan_tanto', __('Reg tanto'));
        $grid->column('car_number', __('Haiki code'));
        $grid->column('amount', __('Haiki name'));
        $grid->column('amount_code', __('Haiki cnt'));
        $grid->column('note', __('Haiki number tani'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
// 作成したImportButtonをツールに表示
        $grid->tools(function ($tools) {
            $tools->append(new ImportButton('csv3s'));
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
            $csv=new CSV3();
            Log::info(print_r($row,true));
            $csv->setAttribute('number1', $row[0]);
            $csv->setAttribute('kbn', $row[1]);
            $csv->setAttribute('end_date', $row[3]);
            $csv->setAttribute('shobun_tanto', $row[3]);
            $csv->setAttribute('hokoku_tanto', $row[4]);
            $csv->setAttribute('recv_date', $row[5]);
            $csv->setAttribute('unpan_tanto', $row[6]);
            $csv->setAttribute('car_number', $row[7]);
            $csv->setAttribute('amount', $row[8]);
            $csv->setAttribute('amount_code', $row[9]);
            $csv->setAttribute('note', $row[10]);
            $csv->save();

        }

     
    }
    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Csv3::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number1', __('Number1'));
        $show->field('kbn', __('Number3'));
        $show->field('end_date', __('Number3'));
        $show->field('shobun_tanto', __('Recv date'));
        $show->field('hokoku_tanto', __('Haishutsu code'));
        $show->field('recv_date', __('Recv tanto'));
        $show->field('unpan_tanto', __('Reg tanto'));
        $show->field('car_number', __('Haiki code'));
        $show->field('amount', __('Haiki name'));
        $show->field('amount_code', __('Haiki cnt'));
        $show->field('note', __('Haiki number tani'));
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
        $form = new Form(new Csv3);

        $form->text('number1', __('Number1'));
        $form->text('kbn', __('Number3'));
        $form->text('end_date', __('Number3'));
        $form->text('shobun_tanto', __('Recv date'));
        $form->text('hokoku_tanto', __('Reg tanto'));
        $form->text('recv_date', __('Haiki code'));
        $form->text('unpan_tanto', __('Haiki name'));
        $form->text('car_number', __('Haiki cnt'));
        $form->text('amount', __('Haiki number tani'));
        $form->text('amount_code', __('Nisugata code'));
        $form->text('note', __('Nisugata cnt'));


        return $form;
    }
}
