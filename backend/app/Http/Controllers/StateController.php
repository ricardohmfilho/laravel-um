<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\StateRepositoryInterface;

class StateController extends Controller
{
    private $stateRepository;

    public function __construct(StateRepositoryInterface $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function index()
    {
        return $this->stateRepository->all();
    }
}
