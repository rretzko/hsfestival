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

    public function getEnsembleCountAttribute()
    {
        return $this->ensembles->count();
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    /**
     * Excludes bots and super-admin
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function excludeBots()
    {
        return User::all()->filter(function($user){
            return ((substr($user->email, -4) != '.bot') && ($user->id > 1));
        })->sortBy('last');
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
            ->where('event_id', Event::currentEvent()->id)
            ->where('preference', 1)
            ->first();
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

    public function getUserOptionPermissionAttribute() : bool
    {
        return Useroption::where('user_id', $this->id)->where('option_id', Optiontype::PERMISSION)->exists()
            ? Useroption::where('user_id', $this->id)->where('option_id', Optiontype::PERMISSION)->first()->value
            : 0;
    }

    public function getUserOptionPlaqueAttribute() : bool
    {
        return Useroption::where('user_id', $this->id)->where('option_id', Optiontype::PLAQUE)->exists()
            ? Useroption::where('user_id', $this->id)->where('option_id', Optiontype::PLAQUE)->first()->value
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function useroptions()
    {
        return $this->hasMany(Useroption::class);
    }

    public function useroptionsvenues()
    {
        return $this->hasMany(Useroptionsvenues::class)
            ->where('event_id', Event::currentEvent()->id);
    }


}
