<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kereta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $rules = [
            'nip' => 'required|exists:users,nip',
            'password' => 'required|min:3'
        ];

        $messages = [
            'nip.required' => 'NIP tidak boleh kosong',
            'nip.nip' => 'NIP tidak valid',
            'nip.exists' => 'NIP tidak terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 3 karakter'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $response = $validator->messages();
            $response = [
                'validation' => true,
                'message' => [
                    'nip' => $response->first('nip') != '' ? $response->first('nip') : null,
                    'password' => $response->first('password') != '' ? $response->first('password') : null
                ],
            ];
            return ResponseController::customResponse(false, 'Login gagal',  $response);
        }

        $user = User::where('nip', $request->nip)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                $user->train = Kereta::first();
                $response = [
                    'profile' => $user,
                    'token' => $token,
                ];
                return ResponseController::customResponse(true, 'Login berhasil', $response);
            } else {
                $response = [
                    'validation' => true,
                    'message' => [
                        'nip' => null,
                        'password' => 'Password salah'
                    ],
                ];
                return ResponseController::customResponse(false, 'Login gagal', $response);
            }
        }
    }

    public function autoLogin(Request $request)
    {
        $decrypt = $this->decrypt($request->nip);

        $user = User::where('nip', $decrypt)->first();
        if ($user) {
            $token = $user->createToken('auth_token')->plainTextToken;
            $user->train = Kereta::first();
            $response = [
                'profile' => $user,
                'token' => $token,
            ];
            return ResponseController::customResponse(true, 'Login berhasil', $response);
        }
    }
}
