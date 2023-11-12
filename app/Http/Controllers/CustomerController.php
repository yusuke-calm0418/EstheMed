<?php

namespace App\Http\Controllers;

// Customerクラスを読み込む
use App\Models\Customer;

use Carbon\Carbon;

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
        $birthdate = null;
        if ($request->filled(['birth_year', 'birth_month', 'birth_day'])) {
            $birthdate = Carbon::createFromDate(
                $request->birth_year,
                $request->birth_month,
                $request->birth_day
            )->toDateString();
        }

        // インスタンスの作成
        $customer = new Customer();

        // 値の用意
        $customer->name = $request->name;
        $customer->gender_image = $request->gender_image;
        $customer->gender = $request->gender;
        $customer->birthdate = $request->birthdate;
        $customer->allergy_info = $request->allergy_info;
        $customer->medical_history = $request->medical_history;
        $customer->medication_info = $request->medication_info;
        $customer->skin_concerns_goals = $request->skin_concerns_goals;
        $customer->lifestyle = $request->lifestyle;

        // インスタンスに値を設定して保存
        $customer->save();

        // 登録したらindexに戻る
        return redirect(route("customers.index"));
        // return redirect()->back()->with('message', '顧客が正常に登録されました');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        // ここはidで探して持ってくる以外はstoreと同じ
        $customer = Customer::find($id);

        // 値の用意
        $customer->name = $request->name;
        $customer->gender_image = $request->gender_image;
        $customer->gender = $request->gender;
        $customer->birthdate = $request->birthdate;
        $customer->allergy_info = $request->allergy_info;
        $customer->medical_history = $request->medical_history;
        $customer->medication_info = $request->medication_info;
        $customer->skin_concerns_goals = $request->skin_concerns_goals;
        $customer->lifestyle = $request->lifestyle;
        // 保存
        $customer->save();
        // 登録したらindexに戻る
        return redirect(route("customers.index"));
        
    }
}
