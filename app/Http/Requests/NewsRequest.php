<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'      => 'required|string',
            'detail'       => 'required|string',
            'status'            => 'required|string|between:1,2',
            'type'            => 'required|string|between:1,3',
        ];
    }

    public function messages()
    {
        return [
            'type.required'          => '対象を選んでください',

        ];
    }
}
