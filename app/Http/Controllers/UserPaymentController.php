<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPayment;
use App\SDK\Stripe;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserPaymentController extends Controller
{
    /**
     * @param User $user
     * @param UserPayment|null $payment
     * @return View
     */
    public function form(User $user, UserPayment $payment = null): View
    {
        return view('components.pages.user.information.payment', [
            'user' => $user,
            'payment' => $payment
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param UserPayment $payment
     * @return RedirectResponse
     */
    public function default(Request $request, User $user, UserPayment $payment): RedirectResponse
    {
        $request->session()->regenerate();

        $user->payments()->update(['is_default' => false]);

        $payment->is_default = true;
        $payment->save();

        return back()->with('status', __('Address has been default successfully!'));

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {

        $request->session()->regenerate();

        $data = $request->validate([
            'card_exp_month' => 'required|integer|between:1,12',
            'card_exp_year' => 'required|integer|between:2004,2044',
            'card_number' => 'required|string|size:4',
            'card_name' => 'required|string|max:100',
            'card_type' => 'required|string|max:100',
            'card_payment_method_id' => 'required|string',
        ]);

        $isDefault = $request->has('default') && request('default') === 'on';

        $newPayment = UserPayment::make();
        $newPayment->number = $data['card_number'];
        $newPayment->name = $data['card_name'];
        $newPayment->provider = Stripe::class;
        $newPayment->type = $data['card_type'];
        $newPayment->status = 'creating';
        $newPayment->expiration_date = Carbon::createFromFormat('m/Y', $data['card_exp_month'] . '/' . $data['card_exp_year'])?->endOfDay();
        $newPayment->is_default = $isDefault;
        $newPayment->token = $data['card_payment_method_id'];
        $request->session()->regenerate();

        if ($user = Auth::user()) {
            if ($isDefault) {
                $user->payments()->update(['is_default' => false]);
            }
            $user->payments()->save($newPayment);

        }


        return redirect()->route('user.payments.list', ['user' => $user])->with('status', __('Address saved.'));

    }

    /**
     * @return View
     */
    public function list(): View
    {
        return view('components.pages.user.information.payments', [
            'user' => Auth::user()
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param UserPayment $payment
     * @return RedirectResponse
     */
    public function delete(Request $request, User $user, UserPayment $payment): RedirectResponse
    {
        $request->session()->regenerate();

        if ($payment->is_default) {
            return back()->withErrors(['default' => __('Address is default.')]);
        }
        $payment->delete();

        return redirect()->route('user.payments.list', ['user' => Auth::user()])->with('status', __('Payment Method deleted successfully.'));
    }


}
