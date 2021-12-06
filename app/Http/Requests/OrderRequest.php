<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'      => 'required',
            'name'       => 'required|string',
             'category_id'       => 'required',
             // 'category2'       => 'required',
             // 'category3'       => 'required',
             // 'category4'       => 'required',
             'limit_date1'       => 'required|date',       ];
    }

    public function messages()
    {
        return [
             'name.required'          => ' 依頼タイトルを入力してください',
              'image.required'          => ' アイキャッチを選んでください',
            'category_id.required'          => 'カテゴリーを選んでください',
             'category2.required'          => '素材を選んでください',
             'category3.required'          => '修理・リサイクルを選んでください',
             'category4.required'          => '相談を選んでください',
             'limit_date1.required'          => '募集期限を選んでください',
        ];
    }
}
