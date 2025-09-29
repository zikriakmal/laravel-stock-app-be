<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;

class ProductCategoryController extends Controller
{
    public function create(ProductCategoryRequest $request): JsonResponse
    {
        $productCategory = [
            'name' => $request['name']
        ];
        $createProductCategory = ProductCategory::create($productCategory);
        return response()->json($createProductCategory);
    }

    public function getAll(): JsonResponse
    {
        $productCategories = ProductCategory::All();
        return response()->json($productCategories);
    }

    public function show(string $productCategoryId): JsonResponse
    {
        $productCategory = ProductCategory::findOrFail($productCategoryId);
        return response()->json($productCategory);
    }

    public function destroy(string $productCategoryId): JsonResponse
    {
        $productCategory = ProductCategory::findOrFail($productCategoryId);
        $productCategory->delete();
        return response()->json($productCategory);
    }

    public function update(string $productCategoryId, ProductCategoryRequest $request): JsonResponse
    {
        $productCategory = ProductCategory::findOrFail($productCategoryId);
        $productCategory->name = $request['name'];
        $productCategory->save();
        return response()->json($productCategory);
    }
}
