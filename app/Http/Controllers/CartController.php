<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * @return View
     */
    public function cart() : View
    {
        return view('components.pages.cart');
    }

    /**
     * @return RedirectResponse
     */
    public function lookup(): RedirectResponse
    {
        if(Auth::user()){
            return redirect()->route('payment.create');
        }
        return redirect()->route('auth.lookup');
    }
}
