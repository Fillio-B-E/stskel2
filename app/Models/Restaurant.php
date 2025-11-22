<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relationship:
     * One Restaurant → One RestaurantAdminDetail
     */
    public function details()
    {
        return $this->hasOne(RestaurantAdminDetails::class);
    }

    /**
     * Automatically create restaurant_admin_details
     * whenever a restaurant is created.
     */
    // protected static function booted()
    // {
    //     static::created(function ($restaurant) {
    //         if (!$restaurant->details) {
    //             $restaurant->details()->create([
    //                 'location' => 'Unknown',
    //                 'image_main' => 'images/default.png',
    //             ]);
    //         }
    //     });
    // }

    public function getMainImageAttribute()
    {
        return 'R' . $this->id . '.png';
    }
}
