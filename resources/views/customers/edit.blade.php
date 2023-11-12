<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お客様基本情報更新</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 m-auto">

    <div class="w-11/12 mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-4">
        <h1 class="p-4 font-bold">お客様基本情報編集</h1>
        <div class="flex flex-wrap p-10 border-t border-gray-200">
            <div class="w-1/2 px-2 mb-4">

                <form action="{{ route('customers.update', $customer) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <table class="w-full text-sm text-left text-gray-500">
                        <tbody class="bg-white divide-y divide-gray-300">
                            <tr class="">
                                <td class="py-4 px-6">ID</td>
                                <td class="py-4 px-6 font-bold">-----</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6">氏名</td>
                                <td class="py-4 px-6 font-bold">
                                    <input type="text" name="name" placeholder="氏名を入力" class="form-input"
                                        value="{{ old('name', $customer->name ?? '') }}">
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td class="py-4 px-6">性別</td>
                                <td class="py-4 px-6">
                                    <select name="gender" class="form-select">
                                        <option value="male"
                                            {{ old('gender', $customer->gender ?? '') == 'male' ? 'selected' : '' }}>男
                                        </option>
                                        <option value="female"
                                            {{ old('gender', $customer->gender ?? '') == 'female' ? 'selected' : '' }}>女
                                        </option>
                                    </select>
                                </td>
                            </tr>

                            </tr>
                            <tr>
                                <td class="py-4 px-6">生年月日</td>
                                <td class="py-4 px-6 font-bold">
                                    @if ($customer->birthdate)
                                        {{ \Carbon\Carbon::parse($customer->birthdate)->format('Y年n月j日') }}（{{ $customer->age }}才）
                                    @else
                                        ----年--月--日
                                    @endif
                                </td>
                            </tr>
                            <tr class="">
                                <td class="py-4 px-6">住所</td>
                                <td class="py-4 px-6 font-bold">東京都渋谷区恵比寿1-33-55</td>
                            </tr>
                        </tbody>
                    </table>
            </div>

            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">アレルギー情報</div>
                <textarea class="h-40 bg-gray-100 p-2 w-full" name="allergy_info">{{ old('allergy_info', $customer->allergy_info) }}</textarea>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">医療履歴</div>
                <textarea class="h-40 bg-gray-100 p-2 w-full" name="medical_history">{{ old('medical_history', $customer->medical_history) }}</textarea>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">薬剤・サプリメント情報</div>
                <textarea class="h-40 bg-gray-100 p-2 w-full" name="medication_info">{{ old('medication_info', $customer->medication_info) }}</textarea>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">肌の悩みと目標</div>
                <textarea class="h-40 bg-gray-100 p-2 w-full" name="skin_concerns_goals">{{ old('skin_concerns_goals', $customer->skin_concerns_goals) }}</textarea>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">ライフスタイル</div>
                <textarea class="h-40 bg-gray-100 p-2 w-full" name="lifestyle">{{ old('lifestyle', $customer->lifestyle) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary p-4" value="更新">更新する</button>
            </form>
            <a href="/customers" class="p-4">戻る</a>
        </div>
    </div>

</body>

</html>
