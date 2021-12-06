<?php

namespace App\Admin\Controllers;

use App\Interm;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IntermController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '中間処理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Interm);

        $grid->column('id', __('Id'));
        $grid->column('yyyymmdd', __('年月日'));
        $grid->column('name', __('中間処理業者名'));
        $grid->column('address', __('住所'));
        $grid->column('tanto', __('担当者'));
        $grid->column('num', __('許可番号'));
        $grid->column('type', __('廃棄物の種類'));
        $grid->column('amount', __('総重量'));
        $grid->column('created_at', __('作成日'));
        $grid->column('updated_at', __('更新日'));

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
        $show = new Show(Interm::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('yyyymmdd', __('年月日'));
        $show->field('name', __('中間処理業者名'));
        $show->field('address', __('住所'));
        $show->field('tanto', __('担当者'));
        $show->field('num', __('許可番号'));
        $show->field('type', __('廃棄物の種類'));
        $show->field('amount', __('総重量'));
        $show->field('created_at', __('作成日'));
        $show->field('updated_at', __('更新日'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Interm);

        $form->date('yyyymmdd', __('年月日'));
        $form->text('name', __('中間処理業者名'));
        $form->text('address', __('住所'));
        $form->text('tanto', __('担当者'));
        $form->text('num', __('許可番号'));
       $form->text('type', __('廃棄物の種類'));
        $form->text('amount', __('総重量'));

        return $form;
    }
}
