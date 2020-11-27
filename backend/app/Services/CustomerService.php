<?php

namespace App\Services;

use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerService {

    const RULE_PLAN_ID_RESTRICT = 1; // Plano Free
    const RULE_STATE_ID_RESTRICT = 2; // Estado de São Paulo

    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function deleteCustomer($id){
        if(!$this->customerRepository->getCustomerPlanStateInfo(
            $id, 
            CustomerService::RULE_PLAN_ID_RESTRICT, 
            CustomerService::RULE_STATE_ID_RESTRICT
        )){
            return $this->customerRepository->deleteCustomer($id);
        } else {
            return false;
        }
    }

}