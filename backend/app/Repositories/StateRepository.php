<?php

namespace App\Repositories;

use App\Models\State;
use App\Http\Resources\StateCollection;
use App\Repositories\Interfaces\StateRepositoryInterface;

class StateRepository implements StateRepositoryInterface{

    public function all()
    {
        return new StateCollection(State::all());
    }
}