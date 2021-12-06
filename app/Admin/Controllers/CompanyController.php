<?php

namespace App\Admin\Controllers;

use App\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '排出業者マスタ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company);

        $grid->column('id', __('Id'));
        $grid->column('name', __('排出事業者名'));
        $grid->column('packing', __('荷姿'));
        $grid->column('price1', __('収集運搬単価'));
        $grid->column('price2', __('中間処理単価'));
        $grid->column('price3', __('容器単価'));
        $grid->column('price4', __('管理費'));
        $grid->column('price5', __('契約単価'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
