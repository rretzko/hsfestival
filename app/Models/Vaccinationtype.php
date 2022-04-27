<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinationtype extends Model
{
    use HasFactory;

    protected $fillable = ['descr'];
}
