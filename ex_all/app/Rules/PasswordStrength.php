<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PasswordStrength implements Rule
{
    public $length = 15;
    public $lengthCheck = false;
    public $uppercaseCheck = false;
    public $numericCheck = false;
    public $specialCharacterCheck = false;

    public function __construct($length)
    {
        $this->length = $length;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->lengthCheck = Str::length($value) >= $this->length;  //check 長度 
        $this->uppercaseCheck = Str::lower($value) !== $value;      //是否有大寫
        $this->numericCheck = (bool) preg_match('/[0-9]/', $value); //是否有數字
        $this->specialCharacterCheck = (bool) preg_match('/[^A-Za-z0-9]/', $value);  //是否有特殊符號

        return ($this->lengthCheck && $this->uppercaseCheck && $this->numericCheck && $this->specialCharacterCheck);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return 'The :attribute must be at least ' . $this->length . ' characters and contain at least one uppercase character, one number and one special character.';

        return "帳號或密碼錯誤";
    }
}
