<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasLocalePreference
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;
    use SoftDeletes;

    public $table = 'users';

    public $orderable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'locale',
    ];

    public $filterable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'roles.title',
        'locale',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'locale',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function ensembles()
    {
        return $this->hasMany(Ensemble::class);
    }

    /**
     * Excludes bots and super-admin
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function excludeBots(Venue $venue = null)
    {
        $allusers = User::all()->filter(function($user){
            return ((substr($user->email, -4) != '.bot') && ($user->id > 1));
        })->sortBy('last');

        //high school festival
        $users = $allusers->filter(function($user){
            return $user->useroptionsvenues->count();
        });

        //early exit
        if(! $venue){ return $users;}

        return $users->filter(function($user) use($venue){
           return ($user->getCurrentFirstChoiceVenueAttribute() &&
               ($user->getCurrentFirstChoiceVenueAttribute()->venue_id === $venue->id));
        });
    }

    public function getEnsembleCountAttribute()
    {
        return $this->ensembles->count();
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    public function getCurrentFirstChoiceVenueAttribute()
    {
        return Useroptionsvenues::where('user_id', $this->id)
            ->where('event_id', CurrentEvent::currentEvent()->id)
            ->where('preference', 1)
            ->first() ?? null;
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getLastAttribute()
    {
        $parts = explode(" ", $this->name);

        return $parts[(count($parts) - 1)];
    }

    public function getMobilePhoneAttribute()
    {
        return Phone::where('user_id', $this->id)->where('phonetype_id', Phonetype::MOBILE)->first();
    }

    public function getPaymentBalanceAttribute()
    {
        return ($this->getPaymentDueAttribute() - $this->getPaymentPaidAttribute());
    }

    public function getPaymentDueAttribute()
    {
        $ensemblepayments = [
            0 => [245,210], //non-member => [plaque, certificate]
            1 => [195,160], //member => [plaque, certificate]
        ];

        $sightreadingpayment = 40;

        $ensemblecount =$this->ensembles->count();
        $membership = (! (is_null($this->membership))) ? 1 : 0;
        $plaque = $this->getUserOptionPlaqueAttribute() ? 0 : 1;
        $sightreading = $this->sightreadings()->wherePivot('event_id', CurrentEvent::currentEvent()->id)->get();

        return (($ensemblecount * $ensemblepayments[$membership][$plaque]) + ($sightreading->count() * $sightreadingpayment));
    }

    public function getPaymentPaidAttribute()
    {
        $eventid = CurrentEvent::currentEvent()->id;

        return Payment::where('user_id', $this->id)
            ->where('event_id', $eventid)
            ->sum('amount') ?? 0;
    }

    public function getUserOptionPermissionAttribute() : bool
    {
        return Useroption::where('user_id', $this->id)
            ->where('event_id', CurrentEvent::currentEvent()->id)
            ->where('option_id', Optiontype::PERMISSION)
            ->exists()
            ? Useroption::where('user_id', $this->id)
                ->where('event_id', CurrentEvent::currentEvent()->id)
                ->where('option_id', Optiontype::PERMISSION)
                ->first()
                ->value
            : 0;
    }

    public function getUserOptionPlaqueAttribute() : bool
    {
        return Useroption::where('user_id', $this->id)
            ->where('event_id', CurrentEvent::currentEvent()->id)
            ->where('option_id', Optiontype::PLAQUE)
            ->exists()
            ? Useroption::where('user_id', $this->id)
                ->where('event_id', CurrentEvent::currentEvent()->id)
                ->where('option_id', Optiontype::PLAQUE)
                ->first()
                ->value
            : 0;
    }

    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function school()
    {
        return $this->hasOne(School::class);
    }

    public function sightreadings()
    {
        return $this->belongsToMany(Sightreading::class)
            ->withPivot('event_id');
    }

    public function useroptions()
    {
        return $this->hasMany(Useroption::class)
            ->where('event_id', CurrentEvent::currentEvent()->id);
    }

    public function useroptionsvenues()
    {
        return $this->hasMany(Useroptionsvenues::class)
            ->where('event_id', CurrentEvent::currentEvent()->id);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
