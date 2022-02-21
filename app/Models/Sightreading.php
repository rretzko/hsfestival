<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sightreading extends Model
{
    use HasFactory;

    protected $fillable = ['cost', 'name','year_of'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
