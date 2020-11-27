<?php

namespace App\Repositories;

use App\Models\Plan;
use App\Http\Resources\PlanCollection;
use App\Repositories\Interfaces\PlanRepositoryInterface;

class PlanRepository implements PlanRepositoryInterface{

    public function all()
    {
        return new PlanCollection(Plan::all());
    }
}