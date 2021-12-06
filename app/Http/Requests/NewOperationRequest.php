<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class NewOperationRequest extends FormRequest
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
            'email'       => 'required|email|unique:users',
            'password'            => 'required|string|min:8',        ];
    }

    public function messages()
    {
        return [
            'genre_id.required'          => 'ジャンルを選んでください',

        ];
    }
}
