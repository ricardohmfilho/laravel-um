<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name', 'ibge_code', 'state_id'];

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    }
}
