<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kereta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $rules = [
            'username' => 'required|exists:master_kereta,username',
            'password' => 'required|min:3'
        ];

        $messages = [
            'username.required' => 'username tidak boleh kosong',
            'username.username' => 'username tidak valid',
            'username.exists' => 'username tidak terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 3 karakter'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $response = $validator->messages();
            $response = [
                'validation' => true,
                'message' => [
                    'username' => $response->first('username') != '' ? $response->first('username') : null,
                    'password' => $response->first('password') != '' ? $response->first('password') : null
                ],
            ];
            return ResponseController::customResponse(false, 'Login gagal',  $response);
        }

        $user = Kereta::where('username', $request->username)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                $response = [
                    'profile'=> $user,
                    'token' => $token,
                ];
                return ResponseController::customResponse(true, 'Login berhasil', $response);
            } else {
                $response = [
                    'validation' => true,
                    'message' => [
                        'username' => null,
                        'password' => 'Password salah'
                    ],
                ];
                return ResponseController::customResponse(false, 'Login gagal', $response);
            }
        }
    }
}
