<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RestaurantAdminDetails extends Model
{
    protected $fillable = [
        'restaurant_id',
        'location',
        'image_main',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    
}
