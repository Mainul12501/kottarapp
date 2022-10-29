<?php

namespace App\Http\Controllers;

use App\Http\Requests\Front\CustomBuyerSellerRegisterRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    public $userDetails, $user, $users;

    public function registerViewForClientAndFreelancer ()
    {
        return view('front.auth.register');
    }

    public function loginViewForClientAndFreelancer ()
    {
        return view('front.auth.login');
    }


    public function registerAndRedirectClientAndFreelancer (CustomBuyerSellerRegisterRequest $request)
    {

        DB::transaction(function () use ($request){
            $this->userDetails = UserDetail::createOrUpdateUserDetails($request);

            $this->user = User::updateOrCreateUser($request, $this->userDetails->id);

        });

        if (isset($this->user))
        {
            Auth::login($this->user);
            if (Str::contains(url()->current(), '/api/'))
            {
                return response()->json(['user' => $this->user, 'auth_token' => $this->user->createToken('auth_token')->plainTextToken]);
            } else {
                if ($this->user->user_role_type == 0 || $this->user->user_role_type == 1)
                {
                    return redirect()->route('client.dashboard')->with('success', 'Your account created successfully. Complete your profile and get your account approved');
                } else {
                    $this->user->userDetails()->delete();
                    $this->user->delete();
                    return redirect()->route('front.register')->with('error', 'Only Buyer and seller can register. Thanks');
                }
            }

        }
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json(['error' => 'error', 'message' => 'Something went wrong. Please try again.'], 401);
        } else {
            return redirect()->route('front.register')->with('error', 'Something went wrong. Please try again');
        }
    }

    public function loginAndRedirectClientAndFreelancer (Request $request)
    {
        if (Auth::attempt($request->only('email', 'password')))
        {
            if (Str::contains(url()->current(), '/api/'))
            {
                $user = Auth::user();
                return response()->json(['user' => $user, 'auth_token' => $user->createToken('auth_token')->plainTextToken]);
            } else {
                if (auth()->user()->user_role_type == 0 || auth()->user()->user_role_type == 1)
                {
                    return redirect()->route('client.dashboard')->with('success', 'You are successfully logged in.');
                } else {
                    Auth::logout();
                    return redirect()->route('front.register')->with('error', 'Only Buyer and seller can login here');
                }
            }

        }
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json(['error' => 'error', 'message' => 'Something went wrong. Please try again.'], 401);
        } else {

            return redirect()->route('front.register')->with('error', 'Something went wrong. Please try again');
        }
    }
}
