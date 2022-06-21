<?php

namespace App\Models;

use Carbon\Carbon;
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
}
