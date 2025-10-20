<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ProductCategoryController extends BaseController
{
    public function create(ProductCategoryRequest $request): JsonResponse
    {
        $productCategory = [
            'name' => $request['name']
        ];
        $createProductCategory = ProductCategory::create($productCategory);
        return $this->response(true, 'Product category created', $createProductCategory);
    }

    public function getAll(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $productCategories = ProductCategory::orderBy('updated_at', 'desc')->paginate($perPage);
        return $this->response(true, 'Product categories retrieved', $productCategories);
    }

    public function show(string $productCategoryId): JsonResponse
    {
        $productCategory = ProductCategory::find($productCategoryId);
        if (!$productCategory) {
            return $this->response(false, 'Product category not found', null, ['id' => 'Not found'], 404);
        }
        return $this->response(true, 'Product category retrieved', $productCategory);
    }

    public function destroy(string $productCategoryId): JsonResponse
    {
        $productCategory = ProductCategory::find($productCategoryId);
        if (!$productCategory) {
            return $this->response(false, 'Product category not found', null, ['id' => 'Not found'], 404);
        }
        $productCategory->delete();
        return $this->response(true, 'Product category deleted', $productCategory);
    }

    public function update(string $productCategoryId, ProductCategoryRequest $request): JsonResponse
    {
        $productCategory = ProductCategory::find($productCategoryId);
        if (!$productCategory) {
            return $this->response(false, 'Product category not found', null, ['id' => 'Not found'], 404);
        }
        $productCategory->name = $request['name'];
        $productCategory->save();
        return $this->response(true, 'Product category updated', $productCategory);
    }
}
