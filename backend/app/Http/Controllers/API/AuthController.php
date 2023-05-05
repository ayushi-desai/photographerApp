<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
        // $this->middleware(function($request,$next){
        //     $this->user=Auth::user();
        //     return $next($request);
        // });
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // return response()->json($credentials);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return $this->respondWithToken($token);
    }

    // public function getAuthenticatedUser()
    //         {
                   
    //             try {

    //                 if (! $user = JWTAuth::parseToken()->authenticate()) {
    //                         return response()->json(['user_not_found'], 404);
    //                 }

    //         } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

    //                 return response()->json(['token_expired'], $e->getStatusCode());

    //         } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

    //                 return response()->json(['token_invalid'], $e->getStatusCode());

    //         } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

    //                 return response()->json(['token_absent'], $e->getStatusCode());

    //         }

    //         return response()->json(compact('user'));
    // }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userData()
    {
        // return response()->json(auth()check());
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'userData' => auth()->user()
        ];
    }
    
    // ---------- register ------------
    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'bio' => ['required'],
            'phone' => ['required', 'numeric','min:10'],
            'password' => ['required', 'string', 'min:8'],
            // 'password' => ['required','string' , 'min:8','confirmed'],
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        return $this->login($request);
    }

    
}