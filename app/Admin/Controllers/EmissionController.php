<?php

namespace App\Admin\Controllers;

use App\Emission;
use App\Waste;
use App\Transportation;
use App\Branch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EmissionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '排出事業者';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Emission);

        $grid->column('id', __('Id'));
        $grid->column('yyyymmdd', __('年月日'));
        $grid->column('name', __('排出事業者名'));
         $grid->column('eigyo', __('営業タイプ'));
        $grid->column('code', __('コード'));
        $grid->column('address', __('住所'));
        $grid->column('tanto', __('担当者'));
        $grid->column('k_type', __('契約種類'));
        $grid->column('type', __('廃棄物の種類'));
        $grid->column('packing', __('荷姿'));
        $grid->column('cnt', __('数量'));
        $grid->column('price1', __('契約単価'));
        $grid->column('price2', __('中間処理費'));
        $grid->column('price3', __('容器単価'));
        $grid->column('price4', __('管理費'));
        $grid->column('kg', __('中間処理重量（Kｇ)'));
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
        $show = new Show(Emission::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('yyyymmdd', __('年月日'));
        $show->field('name', __('排出事業者名'));
        $show->field('eigyo', __('営業タイプ'));
        $show->field('code', __('コード'));
        $show->field('address', __('住所'));
        $show->field('tanto', __('担当者'));
        $show->field('type', __('廃棄物の種類'));
        $show->field('packing', __('荷姿'));
        $show->field('cnt', __('数量'));
        $show->field('price1', __('契約単価'));
        $show->field('price2', __('中間処理費'));
        $show->field('price3', __('容器単価'));
        $show->field('price4', __('管理費'));
        $show->field('kg', __('中間処理重量（Kｇ)'));
        
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
        $form = new Form(new Emission);

        $form->text('yyyymmdd', __('年月日'));
        $form->text('name', __('排出事業者名'));
         $form->text('code', __('コード'));
        $form->text('address', __('住所'));
        $form->text('tanto', __('担当者'));
        $transportation_tmp =Transportation::get();
        // // print_r($wastes_tmp);
        $transportation=[];
        foreach ($transportation_tmp as $key => $value) {
             $transportation[$value->id]=$value->name;
        }
        $form->select('kameiten','加盟店')->options($transportation);
        // $this->set('wastes',$wastes);


        $wastes=["VC本部営業"=>"VC本部営業","自社営業"=>"自社営業"];
       //  $this->select('eigyo',$wastes);
         $form->select('eigyo','営業タイプ')->options($wastes);
        $wastes=["kg"=>"kg","40ℓ"=>"40ℓ","50ℓ"=>"50ℓ"];
       //  $this->select('eigyo',$wastes);
         $form->select('k_type','契約種類')->options($wastes);
        $form->text('type', __('廃棄物の種類'));
        $form->text('packing', __('荷姿'));
        $form->number('cnt', __('数量'));
        $form->number('price1', __('契約単価'));
        $form->number('price2', __('中間処理費'));
        $form->number('price3', __('容器単価'));
        $form->number('price4', __('管理費'));
        $form->number('kg', __('中間処理重量（Kｇ)'));
        return $form;
    }
}
