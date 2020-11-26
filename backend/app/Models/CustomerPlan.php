<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPlan extends Model
{
    protected $table = 'customer_plans';

    protected $fillable = ['customer_id', 'plan_id'];
}
