<?php

namespace App\Http\Controllers;


use App\Mail\ConfirmationCodeMail;
use App\Models\ConfirmationCode;
use App\Models\User;
use App\Services\ConfirmationCodeService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Str;

class AuthenticateController extends Controller
{

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function lookup(Request $request): RedirectResponse
    {
        //if email is invalid redirect back with errors
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        $request->session()->forget('email');
        $request->session()->push('email', $data['email']);
        //if email already exist in database redirect to log in form
        if (User::whereEmail($data['email'])->exists()) {
            return redirect()->route('auth.login');
        }

        try {
            //generate code confirmation for registration
            $confirmationCode = ConfirmationCodeService::generate($data['email'], $request);

            //send code
            Mail::to($data['email'])->send(new ConfirmationCodeMail($confirmationCode));

        } catch (Exception $exception) {
            return back()->withErrors([__($exception->getMessage())]);
        }
        return redirect()->to(route('auth.register'));

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'password' => 'required|string',
        ]);


        if (!Session::has('email')) {
            return redirect()->route('auth.lookup');
        }

        $credentials = [
            'email' => Session::get('email')[0],
            'password' => $data['password']
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->forget('email');
            $request->session()->regenerate();

            return redirect()->intended();
        }


        return redirect()->back()->withErrors(['not_matching' => __("fields are not matching")]);
    }


    /**
     * Log the user out
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {

        //check if the register form is valid
        $data = $request->validate([
            'code' => 'required|string',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'day' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:1950|max:' . date('Y'),
        ]);

        //check if email is still in session
        if (!Session::has('email')) {
            return redirect()->route('auth.lookup');
        }
        $email = Session::get('email')[0];

        //check if general terms are agreed
        if (!$request->has('general_terms')) {
            return back()->withErrors(['general_terms' => __("field must be checked")]);
        }

        //check if email is already taken
        if( User::whereEmail($email)->exists()){
            return back()->withErrors(['email_already_exist' => __("email already exist")]);
        }

        //check if code is valid
        $isCodeValid = ConfirmationCode::whereEmail($email)->whereCode($data['code'])->first();

        if (!$isCodeValid || $isCodeValid->code !== $data['code']) {
            return back()->withErrors(['invalid_code' => __("Code is invalid")]);
        }

        // register the user
        $user = User::make();
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $email;
        $user->password = bcrypt($data['password']);
        $user->newsletter = $request->has('newsletter');
        $user->date_of_birth = Carbon::createFromDate($data['year'], $data['month'], $data['day']);
        $user->email_verified_at = Carbon::now();
        $user->save();
        return redirect()->route('auth.login');
    }
}
