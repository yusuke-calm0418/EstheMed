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

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // インスタンスの作成
        $customer = new Customer();

        // 値の用意
        $customer->name = $request->name;
        $customer->gender_image = $request->gender_image;
        $customer->gender = $request->gender;
        $customer->last_treatment_date = $request->last_treatment_date;

        // インスタンスに値を設定して保存
        $customer->save();

        // 登録したらindexに戻る
        return redirect(route("customers.index"));
    }
}
