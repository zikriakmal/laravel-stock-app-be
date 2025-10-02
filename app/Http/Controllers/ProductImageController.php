<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class ProductImageController extends BaseController
{
    public function insertImage(): JsonResponse
    {
        return $this->response(true, 'Product image inserted');
    }
}
