<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //テスト、またはローカルの時は判定しない
        if (app()->runningUnitTests() || app()->isLocal()) {
            return true;
        }

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.config('original.recaptcha.v3.secret_key').'&response='.$value);

        $reCAPTCHA = json_decode($verifyResponse);
        //成功かつスコアが0.5より大きい場合はスパムとみなさない
        if ($reCAPTCHA->success && $reCAPTCHA->score > 0.5) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'お問い合わせが送信できませんでした。';
    }
}
