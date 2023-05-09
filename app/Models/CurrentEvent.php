<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CurrentEvent extends Model
{

    public static function adjudicators(): Collection
    {
        $eventId = CurrentEvent::currentEvent()->id;

        return Adjudicator::where('event_id', $eventId)
            ->orderBy('last')
            ->get();
    }

    public static function currentEvent() : Event
    {
        return Event::where('event_type', 'hsf')
            ->orderByDesc('year_of')
            ->first();
    }

    public static function ensembles(): Collection
    {
        $eventId = CurrentEvent::currentEvent()->id;

        return Ensemble::with('school')
            ->where('event_id', $eventId)
            ->orderBy('name')
            ->get();
    }

    public static function isRegistrationOpen() : bool
    {
        return (Carbon::now() < CurrentEvent::currentEvent()->web_registration_closed);
    }

    /**
     * @return Collection
     */
    public static function schools(): Collection
    {
        $eventId = CurrentEvent::currentEvent()->id;

        $schoolIds = Ensemble::where('event_id', $eventId)->pluck('school_id')->toArray();
        $uniques = array_unique($schoolIds);

        return School::find($uniques)->sortBy('name');
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
    public static function users(Venue $venue=null): Collection
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
