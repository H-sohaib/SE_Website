<?php

namespace App\Rules;

use Closure;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements ValidationRule
{
    private $admin;

    public function __construct($admin)
    {
        $this->admin = $admin;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Hash::check($value, $this->admin->password))
            $fail('The password is incorrect.');
    }
}