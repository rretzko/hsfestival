<?php

namespace App\Http\Controllers\Eventmanagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordresetController extends Controller
{
    public function index()
    {
        //return view('eventmanagement.passwordreset.index', ['registrants' => User::all()->sortBy('last')]);
        return view('eventmanagement.passwordreset.index', ['users' => User::allExcludeBots()]);
    }

    public function update(Request $request)
    {
        $inputs = $request->validate([
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'password' => ['required', 'string', 'min:8','max:24'],
            'password-confirmation' => ['required', 'string', 'min:8','max:24'],
        ]);

        if($inputs['password'] !== $inputs['password-confirmation']) {

            echo 'password mismatch: ' . $inputs['password'] . ' !== ' . $inputs['password-confirmation'];
            exit();
        }

        $user = User::find($inputs['user_id']);

        $user->update([
            'password' => Hash::make($inputs['password'])
        ]);

        return redirect()->route('eventmanagement.index');
    }
}
