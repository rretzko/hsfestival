<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repertoire extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'repertoires';

    public $orderable = [
        'id',
        'event.name',
        'ensemble.name',
        'title',
        'subtitle',
        'duration',
        'movements',
        'composer',
        'arranger',
        'lyricist',
        'choreographer',
        'comments',
    ];

    public $filterable = [
        'id',
        'event.name',
        'ensemble.name',
        'title',
        'subtitle',
        'duration',
        'movements',
        'composer',
        'arranger',
        'lyricist',
        'choreographer',
        'comments',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_id',
        'ensemble_id',
        'title',
        'subtitle',
        'duration',
        'movements',
        'composer',
        'arranger',
        'lyricist',
        'choreographer',
        'comments',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ensemble()
    {
        return $this->belongsTo(Ensemble::class);
    }

    /**
     * Return <br /> separated string of artist values
     */
    public function getArtistsBlockAttribute()
    {
        $artists = [];

        $artists[] = $this->composer;

        if(strlen($this->arranger)){ $artists[] = 'arr. '.$this->arranger;}

        if(strlen($this->lyricist)){ $artists[] = 'lyr. '.$this->lyricist;}

        if(strlen($this->choreographer)){ $artists[] = 'choreo. '.$this->choreographer;}

        return implode('<br />',$artists);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
