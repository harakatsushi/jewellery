<?php

namespace App\Admin\Controllers;

use Log;
use App\Csv2;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Extensions\Tools\ImportButton;
use Illuminate\Http\Request;
class Csv2Controller extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '運搬終了報告CSV';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Csv2);

        $grid->column('id', __('Id'));
        $grid->column('number1', __('Number1'));
        $grid->column('number2', __('Number2'));
        $grid->column('end_date', __('Number3'));
        $grid->column('unpan_tanto', __('Recv date'));
        $grid->column('reg_tanto', __('Haishutsu code'));
        $grid->column('unpanryo', __('Recv tanto'));
        $grid->column('unpanryo_code', __('Reg tanto'));
        $grid->column('yuka', __('Haiki code'));
        $grid->column('yuka_code', __('Haiki name'));
        $grid->column('car_number', __('Haiki cnt'));
        $grid->column('note', __('Haiki number tani'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
// 作成したImportButtonをツールに表示
        $grid->tools(function ($tools) {
            $tools->append(new ImportButton('csv2s'));
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
            $csv=new CSV2();
            Log::info(print_r($row,true));
            $csv->setAttribute('number1', $row[0]);
            $csv->setAttribute('number2', $row[1]);
            $csv->setAttribute('end_date', $row[2]);
            $csv->setAttribute('unpan_tanto', $row[3]);
            $csv->setAttribute('reg_tanto', $row[4]);
            $csv->setAttribute('unpanryo', $row[5]);
            $csv->setAttribute('unpanryo_code', $row[6]);
            $csv->setAttribute('yuka', $row[7]);
            $csv->setAttribute('yuka_code', $row[8]);
            $csv->setAttribute('car_number', $row[9]);
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
        $show = new Show(Csv2::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number1', __('Number1'));
        $show->field('number2', __('Number2'));
        $show->field('end_date', __('Number3'));
        $show->field('unpan_tanto', __('Recv date'));
        $show->field('reg_tanto', __('Haishutsu code'));
        $show->field('unpanryo', __('Recv tanto'));
        $show->field('unpanryo_code', __('Reg tanto'));
        $show->field('yuka', __('Haiki code'));
        $show->field('yuka_code', __('Haiki name'));
        $show->field('car_number', __('Haiki cnt'));
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
        $form = new Form(new Csv2);

        $form->text('number1', __('Number1'));
        $form->text('number2', __('Number2'));
        $form->text('end_date', __('Number3'));
        $form->text('unpan_tanto', __('Recv date'));
        $form->text('reg_tanto', __('Reg tanto'));
        $form->text('unpanryo', __('Haiki code'));
        $form->text('unpanryo_code', __('Haiki name'));
        $form->text('yuka', __('Haiki cnt'));
        $form->text('yuka_code', __('Haiki number tani'));
        $form->text('car_number', __('Nisugata code'));
        $form->text('note', __('Nisugata cnt'));


        return $form;
    }
}
