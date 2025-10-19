<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockTransactionRequest;
use App\Models\StockTransaction;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockTransactionController extends BaseController
{
    public function create(StockTransactionRequest $request): JsonResponse
    {
        $data = $request->validated();
        $stockTransaction = [
            'user_id' => Auth::id(),
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

    public function getAll(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $data = StockTransaction::with('user', 'product')->orderBy('updated_at', 'desc')->paginate($perPage);
        return $this->response(true, 'Stock transaction retrieved', $data);
    }
}
