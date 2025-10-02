<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function create(): JsonResponse
    {
        return $this->response(true, 'Customer created');
    }

    public function getAll(): JsonResponse
    {
        return $this->response(true, 'Customers retrieved');
    }

    public function show(): JsonResponse
    {
        return $this->response(true, 'Customer retrieved');
    }

    public function update():JsonResponse
    {
        return $this->response(true, 'Customer updated');
    }

    public function destroy():JsonResponse
    {
        return $this->response(true, 'Customer deleted');
    }
}
