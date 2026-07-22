<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'price',
        'capacity',
        'created_by',
        'image_path',
    ];



    public function events()
    {
        return $this->hasMany(Event::class, 'created_by');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
