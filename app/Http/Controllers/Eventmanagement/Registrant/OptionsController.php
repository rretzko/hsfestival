<?php

namespace App\Http\Controllers\Eventmanagement\Registrant;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Option;
use App\Models\User;
use App\Models\Useroption;
use App\Models\Useroptionsvenues;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        $input = $request->validate([
            'venues' => ['required', 'array', 'min:1','max:4'],
            'venues.*' => ['required', 'numeric'],
            'permissions' => ['required','numeric', 'min:0','max:4'],
            'confirmation_1' => ['required','numeric', 'min:1','max:1'],
            'confirmation_2' => ['required','numeric', 'min:1','max:1'],
            'plaque_or_certificate' => ['required','numeric', 'min:0','max:1'],
        ]);

        foreach($input AS $key => $value){

            if(($key === 'venues') && is_array($value)){

                $this->updateVenues($input['venues'], $user);

            }else {

                Useroption::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'option_id' => Option::where('descr', $key)->first()->id,
                    ],
                    [
                        'value' => $value,
                    ],
                );
            }
        }

        return redirect()->route('eventmanagement.registrant.edit',
            [
                'user' => $user,
                'useroptions' => $user->useroptions,
            ])
            ->with('status-options', 'User options updated.');
    }

    private function updateVenues(array $venues, User $user)
    {
        $event_id = Event::currentEvent()->id;

        foreach($venues AS $venue_id => $preference){

            Useroptionsvenues::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'event_id' =>  $event_id,
                    'venue_id' => $venue_id,
                ],
                [
                    'preference' => $preference,
                ],
            );
        }
    }
}
