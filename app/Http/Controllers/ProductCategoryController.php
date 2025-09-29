<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function create(Request $request):JsonResponse
    {
        $requestData =  $request->all();
        $productCategory = [
            'name'=>$requestData['name']
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

    public function update(string $productCategoryId, Request $request):JsonResponse
    {
        $productCategory = ProductCategory::findOrFail($productCategoryId);
        $requestData = $request->all();
        $productCategory->name = $requestData['name'];
        $productCategory->save();
        return response()->json($productCategory);
    }
}
