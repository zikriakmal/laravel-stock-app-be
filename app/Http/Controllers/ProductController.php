<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends BaseController
{
    public function create(ProductRequest $request): JsonResponse
    {
        $product = [
            'name' =>$request['name'],
            'code' =>$request['code'],
            'price' => $request['price'],
            'product_category_id' => $request['product_category_id']
        ];
        $createProduct = Product::create($product);
        return $this->response(true, 'Product created', $createProduct);
    }
        public function getAll(): JsonResponse
        {
            $products = Product::with(['productCategory:id,name'])->get();
            return $this->response(true, 'Products retrieved', $products);
        }
    public function show(string $id): JsonResponse
    {
        $product = Product::find($id);
        if (!$product) {
            return $this->response(false, 'Product not found', null, ['id' => 'Not found'], 404);
        }
        return $this->response(true, 'Product retrieved', $product);
    }
    public function update(string $id, ProductUpdateRequest $request): JsonResponse
    {
        $product = Product::find($id);
        if (!$product) {
            return $this->response(false, 'Product not found', null, ['id' => 'Not found'], 404);
        }
        $data = $request->validated();
        $product->update($data);
        $product = Product::with(['productCategory:id,name'])->find($id);
        return $this->response(true, 'Product updated', $product);
    }
    public function destroy(string $id): JsonResponse
    {
        $product = Product::find($id);
        if (!$product) {
            return $this->response(false, 'Product not found', null, ['id' => 'Not found'], 404);
        }
        $product->delete();
        return $this->response(true, 'Product deleted', $product);
    }
}
