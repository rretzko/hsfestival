<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sightreading extends Model
{
    use HasFactory;

    protected $fillable = ['cost', 'name','year_of'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('event_id');
    }

    public function eventOrders($event)
    {
        $a = [];

        $indexes = DB::table('sightreading_user')
            ->where('event_id', $event->id)
            ->orderBy('sightreading_id')
            ->get();

        foreach($indexes as $index){

            $user = User::find($index->user_id);

            $a[] = [
              'name' => $user->name,
              'sightreading' => Sightreading::find($index->sightreading_id)->name,
              'school' => $user->school->name,
              'school_address_block' => $user->school->addressBlock,
            ];
        }

        return $a;

    }
}
