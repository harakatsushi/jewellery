<?php

namespace App\Admin\Controllers;

use App\Transportation;
use App\Branch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Input;
class TransportationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ユーザー';
    use ModelForm {
        store as _store;
        update as _update;
    }

    // パスワードをbcryptで暗号化したうえで、もとのModelFormのstore/updateを呼び出す
    public function store()
    {
        Input::merge(['password' => bcrypt(Input::get('password'))]);
        $this->_store();
    }

    public function update($id)
    {
        Input::merge(['password' => bcrypt(Input::get('password'))]);
        $this->_update($id);
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Transportation);

        $grid->column('id', __('Id'));

        $grid->column('name', __('名前'));

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
        $show = new Show(Transportation::findOrFail($id));

        $show->field('id', __('Id'));

        $show->field('name', __('名前'));

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
        $form = new Form(new Transportation);

        // $form->text('yyyymmdd', __('年月日'));
         $form->text('name', __('名前'));
        // $form->text('address', __('住所'));
        // $form->text('tanto', __('担当者'));
        // $form->text('num', __('許可番号'));
 $branch_tmp =Branch::get();
        // // print_r($wastes_tmp);
        $branchs=[];
        foreach ($branch_tmp as $key => $value) {
             $branchs[$value->id]=$value->name;
        }
         $form->select('branch_id','支部')->options($branchs);
        $roles=["1"=>"マスター権限。全ての操作OK",
    "2"=>"全拠点の検索、詳細画面OK、編集OK、および一括アップロードOK",
"3"=>"全拠点の検索、詳細画面OK、および編集OK",
"4"=>"自拠点の検索、詳細画面OK、およびコメントのみOK",
"5"=>"自アカウント（クローザー）の詳細画面ＯＫおよび、コメントＯＫ",];
        foreach ($branch_tmp as $key => $value) {
             $branchs[$value->id]=$value->name;
        }
         $form->select('role','権限')->options($roles);
        // $form->text('type', __('廃棄物の種類'));
        // $form->text('car_number', __('車両番号'));
        // $form->text('packing', __('荷姿'));
        // $form->number('cnt', __('数量'));
         $form->password('password', __('password'));
         $form->email('email', __('email'));
        return $form;
    }
}
