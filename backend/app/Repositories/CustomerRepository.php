<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CustomerRepository implements CustomerRepositoryInterface{

    protected $Customer;

    public function __construct(Customer $Customer)
    {
        $this->Customer = $Customer;
    }

    public function all()
    {
        return new CustomerCollection(
            Customer::with('state')->with('city')->get()
        );
    }

    public function getCustomerById($id){
        return new CustomerResource(
            Customer::where('id', $id)->with('state')->with('city')->firstOrFail()
        );
    }

    public function createCustomer($data)
    {

        /*
        return [
            'title' => $request->input('title'),
            'author_id' => $request->user()->id,
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ];

        $item = $this->model;
        $item->fill($data);
        $item->save();
         return $item;

        $customer = new $this->Customer;

        $customer = $data;
        //$customer->save();
        */

        $customer = new $this->Customer;
        $customer = $data;
        return $this->Customer::create($customer);

        /*
        $customer->name     = $data['name'];
        $customer->email    = $data['email'];
        $customer->phone_number = $data['phone_number'];
        $customer->born_at  = $data['born_at'];
        $customer->state_id = $data['state_id'];
        $customer->city_id  = $data['city_id'];
        dd($customer);
        */
    }

    public function updateCustomer($id, $data){
        return $this->Customer::findOrFail($id)->update($data);
    }

    /**
     * Verifica se o cliente buscado tem plano FREE e é do estado de SP
     */
    public function getCustomerPlanStateInfo($id, $plan_id, $state_id){
        return DB::table('customers AS c')
                    ->select('*')
                    ->leftJoin('customer_plans AS cp', 'cp.customer_id', '=', 'c.id')
                    ->where('c.id', $id)
                    ->where('cp.plan_id', $plan_id)
                    ->where('c.state_id', $state_id)
                    ->count();
    }

    public function deleteCustomer($id){
        return $this->Customer::findOrfail($id)->delete();
    }

}