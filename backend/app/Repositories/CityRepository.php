<?php

namespace App\Repositories;

use App\Models\City;
use App\Http\Resources\CityCollection;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface{

    public function all()
    {
        return new CityCollection(City::all());
    }
}