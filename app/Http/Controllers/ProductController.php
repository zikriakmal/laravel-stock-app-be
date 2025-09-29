<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(): JsonResponse
    {
        return response()->json();
    }
    public function getAll(): JsonResponse
    {
        $products = Product::All();

        return response()->json($products);
    }
    public function show(string $id): JsonResponse
    {
        return response()->json();
    }
    public function update(string $id, Request $request): JsonResponse
    {
        return response()->json();
    }
    public function destroy(string $id): JsonResponse
    {
        return response()->json();
    }
}
