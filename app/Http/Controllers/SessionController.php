<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function storeRegister(Request $request) {
        $attr = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create($attr);

        Auth::login($user);

        return redirect('/files');
    }

    public function storeLogin(Request $request) {
        $attr = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attr)) {
            throw ValidationException::withMessages([
                'fill_all' => 'This field is required',
                'credentials' => 'Wrong username or password'
            ]);
        };

        request()->session()->regenerate();

        return redirect('/files');
    }

    public function destroy() {
        
        Auth::logout();

        return redirect('/');
    }
}
