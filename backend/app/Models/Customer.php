<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name', 'email', 'phone_number', 'born_at', 'city_id', 'state_id', 'is_active'];
}
