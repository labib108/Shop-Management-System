<?php

namespace App\Http\Controllers;

use App\JWTToken\JWTToken;
use App\Mail\EmailVerification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UserController extends Controller
{
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





    function UserRegistration(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password')
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully'
            ],200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    function UserLogin(Request $request)
    {
        $count = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->count();
        if ($count == 1) {
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'User login successfully'
            ],200)->cookie('token', $token, 60 * 24);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid credentials'
            ], 401);
        }
    }

    function SendOtpCode(Request $request) {
        $email =  $request->input('email');
        $otp = rand(1000, 9999); // Generate a random 4-digit OTP
        $user = User::where('email','=',$email)->count();
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

    function VerifyOtpCode(Request $request) {
        $email =  $request->input('email'); // Get the email from the request
        $otp = $request->input('otp'); // Get the OTP from the request
        $user = User::where('email','=',$email)
            ->where('otp','=',$otp)->count();
        if ( $user == 1) {
            User::where('email','=',$email)->update(['otp' => '0']); // Update the OTP in the database
            $token = JWTToken::VerifyEmailToken($request->input('email'));
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

    function ResetPassword(Request $request) {
        try {
            $email = $request->input('email');
            $password = $request->input('password'); // Get the password from the request
            $user = User::where('email','=',$email)->update(['password' => $password]); // Update the password in the database
            if ($user) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password reset successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User not found or password not updated',
                ], 404);
            };
        }catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid email' // Return an error message if the email is invalid',
            ], 500);
        }
    }

}
