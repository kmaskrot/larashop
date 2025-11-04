<?php

namespace App\Services;


use App\Exceptions\AlreadyRegisteredException;
use App\Exceptions\TooManyAttemptsException;
use App\Models\ConfirmationCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class UserService
{


    /**
     * @param string $email
     * @return bool
     */
    public static function isEmailVerified(string $email) :bool
    {
        $user = User::where('email', $email)->first();

        return $user && $user->email_verified_at;
    }

}