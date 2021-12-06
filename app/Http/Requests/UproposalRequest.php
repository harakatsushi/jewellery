<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class UproposalRequest extends FormRequest
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
            'date'      => 'required|string',
            'price'       => 'required',


        ];
    }

    public function messages()
    {
        return [
            'date.required'          => ' 完了予定日は必須です',
           'price.required'          => ' 契約金額は必須です',
        ];
    }
}
