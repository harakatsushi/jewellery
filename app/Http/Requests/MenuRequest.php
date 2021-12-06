<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            //'image'      => 'required',
            'name'       => 'required|string',
            'via'            => 'required',
            'status'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'via.required'          => '制作経由を選んでください',
             'status.required'          => '公開状況を選んでください',
        ];
    }
}
