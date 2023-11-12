<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Customer;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // public function index()
    // {
    //     return redirect()->route('customers.index');
    // }


    // 一覧表示
    public function index($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $records = $customer->records;

        return redirect()->route('customers.index');
    }

    // 作成フォーム表示
    public function create($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        // 顧客IDに基づいて最新の記録を取得
        $latestRecord = Record::where('customer_id', $customerId)->latest()->first();

        // 最新の記録と顧客IDをビューに渡す
        return view('records.create', [
            'customerId' => $customerId,
            'latestRecord' => $latestRecord,
            'customer' => $customer, // この行を追加
        ]);
    }


    // データ保存
    public function store(Request $request, $customerId)
    {
        $validatedData = $request->validate([
            'subjective' => 'required', // 他のバリデーションルール
            'objective' => 'required',
            'assessment' => 'required',
            'plan' => 'required',
            'record_date' => 'required|date',
            'image' => 'nullable|image|max:2048', // 画像のバリデーション（必要に応じて）
        ]);

        $record = new Record($validatedData);
        $record->customer_id = $customerId;

        // 画像の処理（必要に応じて）
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $record->image_path = $request->file('image')->store('images', 'public');
        }

        // 日付ごとの取得
        $record->record_date = $validatedData['record_date'];

        $record->save();

        // return redirect()->route('customers.records.index', $customerId);
        return redirect()->back()->with('message', '顧客が正常に登録されました');
    }


    // 個別表示
    public function show($customerId, $id)
    {
        $record = Record::findOrFail($id);

        return view('records.show', compact('record'));
    }

    // 編集フォーム表示
    public function edit($customerId, $id)
    {
        $record = Record::findOrFail($id);

        return view('records.edit', compact('record'));
    }

    // データ更新
    public function update(Request $request, $customerId, $id)
    {
        $validatedData = $request->validate([
            // バリデーションルール
        ]);

        $record = Record::findOrFail($id);
        $record->update($validatedData);

        return redirect()->route('customers.records.show', ['customerId' => $customerId, 'id' => $id]);
    }

    // データ削除
    public function destroy($customerId, $id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return redirect()->route('customers.records.index', $customerId);
    }

    // 特定の日付に対して、記録を取得する
    public function fetchByDate(Request $request)
    {
        $date = $request->query('date');
        $records = Record::where('record_date', $date)->get();

        return response()->json($records);
    }

    // カレンダーアプリの実装
    public function getRecordsByDateRange($customerId, $start, $end)
    {
        $records = Record::where('customer_id', $customerId)
            ->whereBetween('record_date', [$start, $end])
            ->get();
        return response()->json($records);
    }
}
