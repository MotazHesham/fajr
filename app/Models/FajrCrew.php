<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FajrCrew extends Model
{
    use SoftDeletes;

    public $table = 'fajr_crews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function types()
    {
        return $this->belongsToMany(CrewType::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
