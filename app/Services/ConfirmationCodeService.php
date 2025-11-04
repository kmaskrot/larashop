<?php


namespace App\Services;

use App\Exceptions\AlreadyRegisteredException;
use App\Exceptions\TooManyAttemptsException;
use App\Models\ConfirmationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConfirmationCodeService
{
    private const MAX_SEND_ATTEMPTS = 5;

    private const RESET_DELAY = 30;


    /**
     * @param string $email
     * @param Request $request
     * @param int $length
     * @return ConfirmationCode
     * @throws AlreadyRegisteredException
     * @throws TooManyAttemptsException
     */
    public static function generate(string $email, Request $request, int $length = 8): ConfirmationCode
    {
        if (UserService::isEmailVerified($email)) {
            throw new AlreadyRegisteredException('this email has already been registered');
        }

        $confirmationCode = ConfirmationCode::where('email', $email)->first() ?? ConfirmationCode::make();
        ++$confirmationCode->count;

        $timeSinceLastAttempt = self::getTimeSinceLastAttempt($confirmationCode);

        if ($confirmationCode->count > self::MAX_SEND_ATTEMPTS) {
            if ($timeSinceLastAttempt >= 0) {
                throw new TooManyAttemptsException(
                    "Too many attempts. please try again in " . abs($timeSinceLastAttempt) . " minute(s)."
                );
            }
            $confirmationCode->count = 1;
        }

        $confirmationCode->email = $email;
        $confirmationCode->code = Str::random($length);
        $confirmationCode->ip = $request->ip();
        $confirmationCode->save();

        return $confirmationCode;

    }

    /**
     * @param ConfirmationCode $confirmationCode
     * @return float
     */
    public static function getTimeSinceLastAttempt(ConfirmationCode $confirmationCode): float
    {
        $lastAttempt = $confirmationCode->updated_at ?? Carbon::now();
        $resetDelay = Carbon::now()->subMinutes(self::RESET_DELAY);

        return DateService::getTimeBetweenTwoDates($lastAttempt, $resetDelay);
    }
}