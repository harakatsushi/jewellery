<?php

namespace App\Admin\Controllers;

use App\Introducer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IntroducerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '紹介者';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Introducer);

        $grid->column('id', __('Id'));
        $grid->column('company_id', __('排出事業者名'));
        $grid->column('name', __('本部紹介者'));
        $grid->column('fee', __('紹介手数料'));
        $grid->column('name2', __('自社紹介者'));
        $grid->column('fee2', __('紹介手数料'));
        $grid->column('area1', __('自社のエリア'));
        $grid->column('area2', __('他社エリア'));
        $grid->column('penalty', __('違約金'));
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
        $show = new Show(Introducer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('company_id', __('排出事業者名'));
        $show->field('name', __('本部紹介者'));
        $show->field('fee', __('紹介手数料'));
        $show->field('name2', __('自社紹介者'));
        $show->field('fee2', __('紹介手数料'));
        $show->field('area1', __('自社のエリア'));
        $show->field('area2', __('他社エリア'));
        $show->field('penalty', __('違約金'));
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
        $form = new Form(new Introducer);

        $form->text('company_id', __('排出事業者コード'))->rules('required');;
        $form->text('name', __('本部紹介者'))->rules('required');
        $form->text('fee', __('紹介手数料'))->rules('required');
        $form->text('name2', __('自社紹介者'));
        $form->text('fee2', __('紹介手数料'))->rules('required');
        $form->switch('area1', __('自社のエリア'));
        $form->switch('area2', __('他社エリア'));
        $form->text('penalty', __('違約金'))->rules('required');

        return $form;
    }
}
