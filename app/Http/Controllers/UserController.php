<?php

namespace App\Http\Controllers;



use Auth;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * @return View
     */
    public function detail(): View
    {
        return view('components.pages.user.information.detail', [
            'user' => Auth::user()
        ]);
    }


    /**
     * @return View
     */
    public function payments(): View
    {
        return view('components.pages.user.information.payments', [
            'user' => Auth::user()
        ]);
    }

    /**
     * @return View
     */
    public function orders(): View
    {
        return view('components.pages.user.information.orders', [
            'user' => Auth::user()
        ]);
    }

    /**
     * @return View
     */
    public function settings(): View
    {
        return view('components.pages.user.information.settings', [
            'user' => Auth::user()
        ]);
    }

    /**
     * @return View
     */
    public function newAddress(): View
    {
        return view('components.pages.user.information.address', [
            'user' => Auth::user()
        ]);
    }


}