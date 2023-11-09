<?php

namespace App\Http\Controllers;

// Customerクラスを読み込む
use App\Models\Customer;


use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $customers = Customer::all();
        // customersディレクトリーの中のindexページを指定し、memosの連想配列を代入
        return view('customers.index', ['customers' => $customers]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show', ['customer' => $customer]);
    }
}
