<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'      => 'required|string',
            'email'       => 'required|email',
            'detail'            => 'required|string',
            'recaptchaResponse' => ['required', new Recaptcha()],

        ];
    }

    public function messages()
    {
        return [
            'detail.required'          => ' お問い合わせ内容は必須です',
                        'recaptchaResponse.required' => 'お使いのブラウザでは送信することができません',
        ];
    }
}
