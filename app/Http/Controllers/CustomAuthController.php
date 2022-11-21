<?php

namespace App\Http\Controllers;

use App\Http\Requests\Front\CustomBuyerSellerRegisterRequest;
use App\Http\Requests\Front\CustomerBuyerSellerLoginRequest;
use App\Models\Admin\Skill;
use App\Models\Admin\TradeLicenseFile;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    public $userDetails, $user, $users, $authUser;

    public function registerViewForClientAndFreelancer()
    {
        return view('front.auth.register');
    }

    public function loginViewForClientAndFreelancer()
    {
        return view('front.auth.login');
    }


    public function registerAndRedirectClientAndFreelancer(CustomBuyerSellerRegisterRequest $request)
    {
        DB::transaction(function () use ($request) {
            $this->userDetails = UserDetail::createOrUpdateUserDetails($request);
            $this->user = User::updateOrCreateUser($request, $this->userDetails->id);
            $this->user->roles()->sync($request->user_role_type);
            if (!empty($request->skills))
            {
                $this->user->skills()->sync($request->skills);
            }
            if ($request->hasFile('user_document_files')) {
                TradeLicenseFile::saveAndUpdateTradeLicenseFiles($request->file('user_document_files'), $this->user);
            }
        });

        if (isset($this->user)) {
            Auth::login($this->user);
            if (Str::contains(url()->current(), '/api/')) {
                return response()->json(['user' => $this->user,'skills' => $this->user->skills,'docFiles' => $this->user->tradeLicenseFiles, 'userDetails' => $this->userDetails, 'auth_token' => $this->user->createToken('auth_token')->plainTextToken]);
            } else {
                if ($this->user->user_role_type == 1 || $this->user->user_role_type == 2) {
                    return redirect()->route('client.dashboard')->with('success', 'Your account created successfully. Complete your profile and get your account approved');
//                    return redirect()->route('front.home')->with('success', 'Your account created successfully. Complete your profile and get your account approved');
                } else {
                    $this->user->userDetails->delete();
                    $this->user->delete();
                    return redirect()->route('front.register')->with('error', 'Only Buyer and seller can register here. Thanks');
                }
            }

        }
        if (Str::contains(url()->current(), '/api/')) {
            return response()->json(['error' => 'Something went wrong. Please try again.']);
        } else {
            return redirect()->route('front.register')->with('error', 'Something went wrong. Please try again');
        }
    }

    public function loginAndRedirectClientAndFreelancer(CustomerBuyerSellerLoginRequest $request)
    {
//        if (Str::contains(url()->current(), '/api/'))
//        {
//            if (empty($request->email))
//            {
//                return json_encode(['error' => 'Please provide email.']);
//            }
//        } else {
//
//        }
//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Str::contains(url()->current(), '/api/')) {
                $user = Auth::user();
                return response()->json(['user' => $user, 'auth_token' => $user->createToken('auth_token')->plainTextToken]);
            } else {
                if (auth()->user()->user_role_type == 1 || auth()->user()->user_role_type == 2) {
                    return redirect()->route('client.dashboard')->with('success', 'You are successfully logged in.');
                } else {
                    Auth::logout();
                    return redirect()->route('front.register')->with('error', 'Only Buyer and seller can login here');
                }
            }

        }
        if (Str::contains(url()->current(), '/api/')) {
            return response()->json(['error' => 'Email and Password does not match . Please try again.']);
        } else {

            return redirect()->route('front.register')->with('error', 'Something went wrong. Please try again');
        }
    }

    public function showUpdateProfileForm()
    {
        $this->user = User::where('id', auth()->id())->with('userDetails', 'tradeLicenseFiles')->first();
        $skills = Skill::where('status', 1)->get();
        $data = [
            'user'  => $this->user,
            'skills'    => $skills,
            'uploadedFiles'     => TradeLicenseFile::where('user_id', $this->user->id)->get(),
        ];
        if (Str::contains(url()->current(), '/api/'))
        {
            if (auth()->user()->user_role_type == 1 || auth()->user()->user_role_type == 2)
            {
                return response()->json($data);
            } else {
                return response()->json(['error' => 'Login as a SME or Student to view this page']);
            }
        } else {
            if (auth()->user()->user_role_type == 1 || auth()->user()->user_role_type == 2)
            {
                return view('front.auth-front.profile.profile-details',['user' => $this->user, 'skills' => $skills]);
            } else {
                return back()->with('error', 'Login as a SME or Student to view this page.');
            }
        }
    }

    public function showUpdateProfile (Request $request)
    {

        $this->authUser = \auth()->user();
        DB::transaction(function () use ($request) {
            $this->userDetails = UserDetail::createOrUpdateUserDetails($request, $this->authUser->userDetails->id);
            $this->user = User::updateOrCreateUser($request, $this->userDetails->id, $this->authUser->id);
            if (!empty($request->skills))
            {
                $this->user->skills()->sync($request->skills);
            }
            if ($request->hasFile('user_document_files')) {
                TradeLicenseFile::saveAndUpdateTradeLicenseFiles($request->file('user_document_files'), $this->user);
            }
        });
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json([
                'userDetails'   => $this->userDetails,
                'user'          => $this->user,
                'skills'        => $this->user->skills,
                'uploadedFiles' => $this->user->tradeLicenseFiles,
                'success'       => 'Your profile updated successfully.'
            ]);
        } else {
            return back()->with('success', 'Your profile updated successfully.');
        }
    }
}
