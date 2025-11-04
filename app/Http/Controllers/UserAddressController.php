<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserAddressController extends Controller
{
    /**
     * @param User $user
     * @param UserAddress|null $address
     * @return View
     */
    public function form(User $user, UserAddress $address = null): View
    {
        return view('components.pages.user.information.address', [
            'user' => $user,
            'address' => $address
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param UserAddress $address
     * @return RedirectResponse
     */
    public function default(Request $request, User $user, UserAddress $address): RedirectResponse
    {
        $request->session()->regenerate();

        $user->addresses()->update(['is_default' => false]);

        $address->is_default = true;
        $address->save();

        return back()->with('status', __('Address has been default successfully!'));

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'address_key' => 'nullable|uuid',
            'address' => 'required|string|max:255',
            'complement' => 'nullable|string|max:255',
            'city' => 'required|string|max:50',
            'zip_code' => 'required|string|max:50',
            'country' => 'required|string|max:50',
        ]);

        $isDefault = $request->has('default') && request('default') === 'on';

        $newAddress = UserAddress::firstOrNew(['uuid' => $data['address_key']]);
        $newAddress->address = $data['address'];
        $newAddress->complement = $data['complement'];
        $newAddress->city = $data['city'];
        $newAddress->zip_code = $data['zip_code'];
        $newAddress->country = $data['country'];
        $newAddress->is_default = $isDefault;

        $request->session()->regenerate();

        if ($user = Auth::user()) {
            if ($isDefault) {
                $user->addresses()->update(['is_default' => false]);
            }
            $user->addresses()->save($newAddress);
        }


        return redirect()->route('user.addresses.list', ['user' => $user])->with('status', __('Address saved.'));

    }

    /**
     * @return View
     */
    public function list(): View
    {
        return view('components.pages.user.information.addresses', [
            'user' => Auth::user()
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param UserAddress $address
     * @return RedirectResponse
     */
    public function delete(Request $request, User $user, UserAddress $address): RedirectResponse
    {
        $request->session()->regenerate();

        if ($address->is_default) {
            return back()->withErrors(['default' => __('Address is default.')]);
        }
        $address->delete();

        return redirect()->route('user.addresses.list', ['user' => Auth::user()])->with('status', __('Address deleted successfully.'));
    }
}
