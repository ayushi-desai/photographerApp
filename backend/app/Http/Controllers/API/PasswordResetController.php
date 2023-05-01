<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\User;
use App\Mail\SignUp;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function passwordReset(Request $request){
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => "We can't find a user with that e-mail address."
            ], 404);
        }
        $exits = PasswordReset::where('email',$request->email)->first();
        if($exits){
            $passwordReset = $exits;
            $passwordReset->save(['token'=>Str::random(10)]);
        }else {
            $passwordReset = PasswordReset::Create(
                [
                    'email' => $user->email,
                    'token' => Str::random(10)
                ]
            );
        }
        //dd($passwordReset);

        if ($user && $passwordReset)
            // $user->notify(
            //     new PasswordResetRequest($passwordReset->token)
            // );
        Mail::to($user->email)->send(new SignUp($passwordReset->token));
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    public function emailFind($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        if (Carbon::parse($passwordReset->created_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
        return response()->json($passwordReset);
    }
    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function resetConfirm(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address."
            ], 404);
        $user->password = bcrypt($request->password);
        $user->save();

        // $user->notify(new PasswordResetSuccess($passwordReset));
        // return response()->json($user);
        return response()->json([
            'message' => 'The Password has been Reset.'
        ]);
    }
}
