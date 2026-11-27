<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    private const FALLBACK_IMAGE_URL = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80';

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

    public function remainingPlaces()
    {
        $registrationCount = array_key_exists('registrations_count', $this->attributes)
            ? $this->attributes['registrations_count']
            : $this->registrations()->count();

        return $this->capacity - $registrationCount;
    }

    public function getImageUrlAttribute(): string
    {
        $imagePath = $this->image_path;

        if (
            is_string($imagePath)
            && preg_match('/\A(?:data:image\/[a-z0-9.+-]+;base64,|https?:\/\/)/i', $imagePath) === 1
        ) {
            return $imagePath;
        }

        return self::FALLBACK_IMAGE_URL;
    }
}
