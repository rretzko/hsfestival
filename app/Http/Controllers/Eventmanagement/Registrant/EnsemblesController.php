<?php

namespace App\Http\Controllers\Eventmanagement\Registrant;

use App\Http\Controllers\Controller;
use App\Models\Ensemble;
use App\Models\User;
use Illuminate\Http\Request;

class EnsemblesController extends Controller
{
    public function update(Request $request, User $user, Ensemble $ensemble)
    {
        $inputs = $request->validate(
            [
                'name' => ['required','string','min:4', 'max:120'],
                'ensembletype_id' => ['required','numeric','min:1'],
                'conductor' => ['required', 'string', 'min:4','max:60'],
                'auditioned' => ['nullable', 'numeric', 'min:1','max:1'],
            ]
        );

        $ensemble->update(
            [
                'name' => $inputs['name'],
                'ensembletype_id' => $inputs['ensembletype_id'],
                'conductor' => $inputs['conductor'],
                'auditioned' => (array_key_exists('auditioned', $inputs) ? $inputs['auditioned'] : 0),
            ]
        );

        return redirect()->route('eventmanagement.registrant.edit',
            [
                'user' => $user,
                'useroptions' => $user->useroptions,
            ])
            ->with('status-ensembles-'.$ensemble->id, 'User ensemble updated.');
    }
}
