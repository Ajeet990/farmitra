<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userLoginWithMobile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile' => 'required|digits:10',
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'error' => $validator->errors()->first()], 422);
        }
        try {
            $mobile = $request->mobile;
        $otp = rand(1000, 9999); // Generate a random 4-digit OTP

        // Store OTP in database or cache
        $user = User::where('mobile', $mobile)->first();
        if(!$user){
            $user = User::firstOrCreate(['mobile' => $mobile,'name'=>'GUEST']);
        }
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10); // Set expiry time
        $user->save();

        // Integrate with an SMS service to send OTP (e.g., Twilio, Nexmo, etc.)
        Log::info("OTP for phone $mobile is $otp"); // Replace with actual SMS integration
        $response = Http::withHeaders([
            'Accept' => '*/*',
            'User-Agent' => 'Thunder Client (https://www.thunderclient.com)',
        ])->get('http://control.yourbulksms.net/api/sendhttp.php?authkey=34356e6c65747336353303&mobiles=91'.$mobile.'&message=Dear%20Farmitra%20Friend%2C%20Your%20Login%20OTP%20is%20'.$otp.'%20and%20is%20valid%20for%2010%20min.&sender=FRMTRA&route=2&country=0&DLT_TE_ID=1007719249134497727');
            return response()->json(['status'=>true,'message' => 'OTP sent successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>false,'message' => $th->getMessage()]);
        }
        
        //echo $response->body();
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|digits:10',
            'otp'   => 'required|digits:4',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        $user = User::where('mobile', $request->mobile)->first();
    
        if (!$user || $user->otp !== $request->otp || now()->isAfter($user->otp_expires_at)) {
            return response()->json(['status'=>false,'error' => 'Invalid or expired OTP'], 401);
        }
    
        // Generate token using Laravel Sanctum or Passport
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Clear OTP after successful verification
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();
    
        return response()->json([
            'status'=>true,
            'message' => 'Login successful',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

}
