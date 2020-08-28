<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($request->all())) {
            return response()->json(Auth::user(), 200);
        }
    
        throw ValidationException::withMessages([
            'email' => 'The provided credentials is incorrect'
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
    }
}
