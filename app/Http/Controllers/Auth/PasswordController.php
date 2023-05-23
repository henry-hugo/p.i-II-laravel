<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = User::where('USUARIO_EMAIL', Auth::user()->USUARIO_EMAIL)->first();
        if ($user && Hash::check($request->current_password, $user->USUARIO_SENHA)) {
            $request->user()->update([
                'USUARIO_SENHA' => Hash::make($request->input('password')),
            ]);
    
            return back()->with('status', 'password-updated');
        }
        return back()->with('status', 'password-notupdated');
    }
}
