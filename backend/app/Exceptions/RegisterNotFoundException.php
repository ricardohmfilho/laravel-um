<?php

namespace App\Exceptions;

use Exception;

class RegisterNotFoundException extends Exception
{
  public function render()
  {
    return ['message' => 'Registro não encontrado'];
  }
}