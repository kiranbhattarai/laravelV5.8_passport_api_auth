<?php

namespace App\Http\Controllers;

use App\Classes\MyClasses;
use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use Validator;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $httpResponse = new MyClasses();
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return (new UserResource(['message' => 'Validation Error', 'details' => $validator->errors(), 'status' => $httpResponse->httpResponse(400)]))->response()->setStatusCode(400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('kiranbhattarai.me')->accessToken;

        return (new UserResource(['message' => 'Account Created', 'access_token' => $token, 'status' => $httpResponse->httpResponse(201)]))->response()->setStatusCode(201);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $httpResponse = new MyClasses();
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('kiranbhattarai.me')->accessToken;
            return (new UserResource(['message' => 'successfull login', 'access_token' => $token, 'status' => $httpResponse->httpResponse(200)]))->response()->setStatusCode(200);
        } else {
            return (new UserResource(['message' => 'Invalid email or password', 'status' => $httpResponse->httpResponse(401)]))->response()->setStatusCode(401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
