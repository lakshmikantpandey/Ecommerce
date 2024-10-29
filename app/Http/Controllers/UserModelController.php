<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Http\Requests\StoreUserModelRequest;
use App\Http\Requests\UpdateUserModelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function shop()
    {
        return view('pages.shop');
    }

    public function shopDetails()
    {
        return view('pages.shop-detail');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function notFound()
    {
        return view('pages.404');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
