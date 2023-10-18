<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth()->user();
        if(Hash::check($request->input('current_password'), $user->password)){
            if($request->input('password') == $request->input('password_confirmation')){
                $validated = $request->validateWithBag('updatePassword', [
                    'current_password' => ['required', 'current_password'],
                    'password' => ['required', Password::defaults(), 'confirmed'],
                ]);

                $request->user()->update([
                    'password' => Hash::make($validated['password']),
                ]);

                return back()->with('succes', "Wachtwoord is aangepast");
            }
            else{
                return back()->with('error', "Nieuw wachtwoord komt niet overeen met de bevestiging");
            }

        }
        else{
            return back()->with('error', "Huidig wachtwoord is fout");
        }
    }
}
