<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useroption extends Model
{
    use HasFactory;

    protected $fillable = ['option_id','user_id','value'];
}
