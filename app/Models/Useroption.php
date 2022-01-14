<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useroption extends Model
{
    use HasFactory;

    protected $fillable = ['option_id','user_id','value'];

    public function getValueDescriptionAttribute()
    {
        $option = Option::find($this->option_id);
        return ($this->value === "1")
            ? $option->label_default
            : $option->label_alternate;
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    private function calcValue()
    {
        return $this->value;
    }
}
