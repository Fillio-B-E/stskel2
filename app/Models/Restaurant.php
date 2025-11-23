<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name'];

    public function adminDetails()
    {
        return $this->hasOne(RestaurantAdminDetails::class, 'restaurant_id');
    }
}
