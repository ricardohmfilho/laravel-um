<?php

namespace App\Repositories\Interfaces;

use App\Models\Customer;

interface CustomerRepositoryInterface
{
    public function all();

    public function getCustomerById($id);

    public function createCustomer($data);

    public function updateCustomer($id, $data);

    public function getCustomerPlanStateInfo($id, $plan_id, $state_id);

    public function deleteCustomer($id);
}