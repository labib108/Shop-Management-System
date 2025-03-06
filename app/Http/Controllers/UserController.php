<?php

namespace App\Http\Controllers;

use App\JWTToken\JWTToken;
use App\Mail\EmailVerification;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    function homePage():View{
        return view('pages.login.login-page');
    }
    function LoginPage():View{
        return view('pages.login.login-page');
    }
    function RegistrationPage():View{
        return view('pages.login.registration-page');
    }
    function ResetPassPage():View{
        return view('pages.login.reset-pass-page');
    }
    function SendOtpPage():View{
        return view('pages.login.send-otp-page');
    }
    function VerifyOtpPage():View{
        return view('pages.login.verify-otp-page');
    }
    function ProfilePage():View{
        return view('pages.dashboard.profile-page');
    }

    public function UserRegistration(Request $request)
    {
        try {
            $validatedData  = $request->validate([
                'firstName' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email|max:50',
                'mobile' => 'required|string|max:50',
                'password' => 'required|string|min:6',
            ]);
            $validatedData ['password'] = Hash::make($validatedData ['password']);
            User::create($validatedData );
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully'
            ], 201);
        }catch (QueryException $e) {
            // Handle database-related exceptions
            return response()->json([
                'status' => 'failed',
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        } 
        catch (Exception  $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function UserLogin(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();
        if ($user && Hash::check($request->input('password'), $user->password)) {
            $token = JWTToken::CreateToken($user->email,$user->id );
            return response()->json([
                'status' => 'success',
                'message' => 'User login successfully'
            ])->cookie('token', $token, 60 * 24);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid credentials'
            ], 401);
        }
    }

    public function SendOtpCode(Request $request) {
        $email =  $request->input('email');
        $otp = rand(1000, 9999); // Generate a random 4-digit OTP
        $user = User::where('email',$email)->count();
        if ($user == 1) {
            Mail::to($email)->send(new EmailVerification($otp)); // Send the OTP to the user's email
            User::where('email', $email)->update(['otp' => $otp]); // Update the user's OTP in the database

            return response()->json([
                'status' => 'success',
                'message' => 'OTP sent successfully', // Return a success message
            ]) ;
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'User not found'
            ], 401);     // User not found
        }
    }

    public function VerifyOtpCode(Request $request) {
        $email =  $request->input('email'); 
        $otp = $request->input('otp');
        $user = User::where('email',$email)
            ->where('otp',$otp)->first();
        if ($user) {
            User::where('email',$email)->update(['otp' => '0']); 
            $token = JWTToken::VerifyEmailToken($email);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP verification successfully',
                'token' => $token
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid OTP'
            ], 401);
        }
    }

    public function ResetPassword(Request $request) {
        try {
            $email = $request->header('email');
            $password = $request->input('password'); // Get the password from the request
            $user = User::where('email','=',$email)->update(['password' => $password]); // Update the password in the database
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password reset successfully',
                ]);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid email' // Return an error message if the email is invalid',
            ], 500);
        }
    }

    public function UserProfile(Request $request) {
        $email = $request->header('email');
        $user = User::where('email',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'User profile fetched successfully',
            'user' => $user,
        ]);
    }
    public   function UpdateProfile(Request $request) {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $email = $request->header('email');
        $user = User::where('email',$email)->first();

        try {
            $firstName = $request->input('firstName') ?? $user->firstName;
            $lastName = $request->input('lastName')?? $user->lastName;
            $mobile = $request->input('mobile')?? $user->mobile;
            $address = $request->input('address')?? $user->address;
            $password =  $request->input('password') ? Hash::make($request->input('password')) : $user->password;

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->storeAs('images', uniqid() . '.' . $image->getClientOriginalExtension(), 'public');
                $user->image = $path;
            }
            $user->update([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'mobile' => $mobile,
                'address' => $address,
                'password' => $password,
                'image' => $user->image,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid email' // Return an error message if the email is invalid',
            ], 500);
        }
    }
    function UserLogout(){
        return redirect('/userLogin')->cookie('token','',-1);
    }
}


