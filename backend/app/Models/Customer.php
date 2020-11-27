<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name', 
        'email', 
        'phone_number', 
        'born_at', 
        'city_id', 
        'state_id', 
        'is_active'
    ];

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}