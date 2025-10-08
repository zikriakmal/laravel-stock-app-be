<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockTransactionRequest;
use App\Models\StockTransaction;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class StockTransactionController extends BaseController
{
    public function create(StockTransactionRequest $request): JsonResponse
    {
        $data = $request->validated();
        $stockTransaction = [
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            'transaction_type' => $data['transaction_type'],
            'quantity' => $data['quantity'],
            'reference_no' => $data['reference_no'],
            'notes' => $data['notes'],
            'transaction_date' => Carbon::now()
        ];
        $createStockTransaction = StockTransaction::create($stockTransaction);
        return $this->response(true, 'Stock transaction created', $createStockTransaction);
    }

    public function getAll(): JsonResponse
    {
        $data = StockTransaction::with('user', 'product')->orderBy('updated_at','desc')->get();
        return $this->response(true, 'Stock transaction retrieved', $data);
    }
}
