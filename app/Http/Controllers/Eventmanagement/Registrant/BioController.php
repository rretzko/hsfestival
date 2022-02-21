<?php

namespace App\Http\Controllers\Eventmanagement\Registrant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BioController extends Controller
{
    public function update(Request $request, User $user)
    {
        $inputs = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'schoolname' => ['required', 'string'],
        ]);

        $user->update(
            [
                'name' => $inputs['name'],
                'email' => $inputs['email'],
            ]
        );

        $request->session()->flash('status-bio','User bio updated.');

        return redirect()->route('eventmanagement.registrant.edit', ['user' => $user])
            ->with('status-bio', 'User bio updated.');
    }
}
