<?php

namespace App\Models;

use Carbon\Carbon;
use FontLib\TrueType\Collection;
use Illuminate\Database\Eloquent\Model;

class CurrentEvent extends Model
{

    public static function currentEvent() : Event
    {
        return Event::where('event_type', 'hsf')
            ->orderByDesc('year_of')
            ->first();
    }

    public static function isRegistrationOpen() : bool
    {
        return (Carbon::now() < CurrentEvent::currentEvent()->web_registration_closed);
    }

    public static function venues(): Collection
    {
        return self->hasMany(Venue::class)
            ->where('event_id', self::$id);
    }

    /**
     * Return collection of users who have options in the current event sorted by last name
     * @return User|User[]|\LaravelIdea\Helper\App\Models\_IH_User_C|null
     */
    public static function users(Venue $venue=null): \Illuminate\Support\Collection
    {
        $optionIds = Option::where('event_id', CurrentEvent::currentEvent()->id)
            ->pluck('id')
            ->toArray();

        $userIds = Useroption::whereIn('option_id', $optionIds)
            ->distinct()
            ->pluck('user_id')
            ->toArray();

        $users = User::find($userIds)->sortBy('last');

        return ($venue)
            ? $users->filter(function($user) use($venue){
                return Useroptionsvenues::query()
                ->where('user_id', $user->id)
                ->where('venue_id', $venue->id)
                ->where('preference',1)
                ->first();
            })
            : $users;

        return  $users;
    }
}
