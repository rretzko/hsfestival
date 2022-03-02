<?php

namespace App\Http\Controllers\Eventmanagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::excludeBots();

        return view('eventmanagement.loginas.index', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inputs = $request->validate([
            'user_id' => ['required', 'numeric', 'exists:users,id'],
        ]);

        Auth::login(User::find($inputs['user_id']));

        return redirect()->route('user.home');
    }

}
