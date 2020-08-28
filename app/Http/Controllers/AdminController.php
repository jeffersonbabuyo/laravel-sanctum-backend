<?php
    
    
namespace App\Http\Controllers;


class AdminController
{

    public function auth(Request $request)
    {
        $authService = new AuthService;

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $authResource = $authService->authenticate($credentials, 'admin');
        $auth = $authResource->getData();

        return new SuccessResponse(['access_token' => $auth['access_token']]);
    }
}