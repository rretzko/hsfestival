<?php

namespace App\Http\Controllers\Eventmanagement\Registrant;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class BioController extends Controller
{
    public function update(Request $request, User $user)
    {
        $inputs = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'school_id' => ['required', 'numeric'],
            'schoolname' => ['required', 'string'],
        ]);

        $user->update(
            [
                'name' => $inputs['name'],
                'email' => $inputs['email'],
            ]
        );

        $school = School::find($inputs['school_id']);
        $school->update(['name' => $inputs['schoolname']]);

        $request->session()->flash('status-bio','User bio updated.');

        return redirect()->route('eventmanagement.registrant.edit', ['user' => $user])
            ->with('status-bio', 'User bio updated.');
    }
}
