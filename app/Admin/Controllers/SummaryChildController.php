<?php

namespace App\Admin\Controllers;

use App\SummaryChild;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use DB;
class SummaryChildController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '集計フォーム(詳細)';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $_GET["date"]=str_replace("年",'',$_GET["date"]);
        $_GET["date"]=str_replace("月",'',$_GET["date"]);
        $grid = new Grid(new SummaryChild);
        $grid->model()->where('code', '=', $_GET["code"])->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m')"), '=',$_GET["date"]);

     //   $grid->model();
        $grid->column('recv_date', __('月日'));
         $grid->column('type', __('廃棄物の種類'));
          $grid->column('packing', __('荷姿'));
        $grid->column('haiki_cnt', __('数量'));
        $grid->column('haiki_number_tani', __('単位'));
        $grid->column('total1', __('収集運搬費'));
        $grid->column('total2', __('中間処理費'));
        $grid->column('total3', __('容器代'));
        $grid->column('total4', __('管理費'));
        $grid->column('total5', __('金額'));
        $grid->column('kg', __('中間処理重量（Kｇ)'));

        $grid->filter(function ($filter) {
            $filter->column(1/2, function ($filter) {
                $filter->disableIdFilter();
            });

        });
        return $grid;
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
