<?php

namespace App\Admin\Controllers;

use App\Waste;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Extensions\Tools\ImportButton;
class WasteController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '廃棄物';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Waste);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->tools(function ($tools) {
            $tools->append(new ImportButton('wastes'));
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
        $show = new Show(Waste::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
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
            $csv->setAttribute('name', $row[1]);
          
            $csv->save();

        }

     
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Waste);

        $form->text('name', __('Name'));

        return $form;
    }
}
