<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Services\CustomerService;
use App\Http\Requests\CustomerRequest;
use App\Exceptions\RegisterNotFoundException;
use Exception;

class CustomerController extends Controller
{
	private $customerRepository;
	private $customerService;

    public function __construct(CustomerRepositoryInterface $customerRepository, CustomerService $customerService)
    {
		$this->customerRepository = $customerRepository;
		$this->customerService = $customerService;
    }

    public function index()
    {
        return $this->customerRepository->all();
    }

    public function show($id)
    {
        try {
            return $this->customerRepository->getCustomerById($id);
		} catch (Exception $e) {
			throw new RegisterNotFoundException($e);
		}
    }

    public function store(CustomerRequest $request)
	{
		try {
			if ($request->validator->fails()) {
				return response()->json(['message' => $request->validator->errors()->first()], 400);
			}
			$this->customerRepository->createCustomer($request->all());
			return response()->json(['message' => 'Registro criado com sucesso!'], 201);
		} catch (Exception $e) {
			return response()->json(['message' => $e->getMessage()], 400);
		}
    }

    public function update(CustomerRequest $request, $id)
	{
		try {
			if ($request->validator->fails()) {
				return response()->json(['message' => $request->validator->errors()->first()], 400);
			}
			$this->customerRepository->updateCustomer($id, $request->all());
			return response()->json(['message' => 'Registro atualizado com sucesso!'], 201);
		} catch(RegisterNotFoundException $e){
			//dd($e->getMessage());
			//throw new RegisterNotFoundException($e);
			return response()->json(['message' => $e->getMessage()], 400);
		}
	}

    public function destroy($id)
	{
		try {
			$affected_rows  = $this->customerService->deleteCustomer($id);

			if ($affected_rows) {
				return response()->json(['message' => 'Registro excluído com sucesso!'], 201);
			} else {
				return response()->json(['message' => 'Registro não excluído, verifique os dados informados.'], 400);
			}
		} catch (Exception $e) {
			return response()->json(['message' => $e->getMessage()], 400);
		}
	}
}
