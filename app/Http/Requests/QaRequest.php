<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class QaRequest extends FormRequest
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
            'question'      => 'required|string',
            'category'       => 'required|string|between:1,5',
            'status'            => 'required|string|between:1,2',

        ];
    }

    public function messages()
    {
        return [
            'approval.required'          => '個人情報の取扱いに同意いただく場合は、チェックしてください',
            'approval.accepted'          => '個人情報の取扱いに同意いただく場合は、チェックしてください',
            'recaptchaResponse.required' => 'お使いのブラウザでは送信することができません',
        ];
    }
}
