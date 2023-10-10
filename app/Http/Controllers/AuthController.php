<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ResponseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('login')
                ->with('error', 'Username And Password Are Wrong.');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}