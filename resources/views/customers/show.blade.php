<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お客様基本情報</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 m-auto">
    {{-- Head部分 --}}
    <div class="flex space-between p-4 mb-2 mt-2 shadow-lg bg-white w-11/12 m-auto">
        <div class="flex mr-8">
            <img src="{{ asset('images/' . $customer->gender_image) }}" alt="Gender Image" class="h-14 w-14 mr-4">
            <div class="ml-1">
                <p class="text-gray-900">ID:{{ str_pad($customer->id, 5, '0', STR_PAD_LEFT) }}</p>
                <p class="text-gray-600 text-2xl font-bold">{{ $customer->name }}&nbsp;様</p>
            </div>
        </div>
        <div class="flex items-center">
            <div>
                <p class="text-gray-600">{{ $customer->birthdate }}</p>
                <div class="text-gray-700 text-sm">
                    <p>[身長] 173cm</p>
                    <p>[体重] 65kg</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-11/12 mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-4">
        <div class="flex flex-wrap p-10 border-t border-gray-200">
            <div class="w-1/2 px-2 mb-4">
                <table class="w-full text-sm text-left text-gray-500">
                    <tbody class="bg-white divide-y divide-gray-300">
                        <tr class="">
                            <td class="py-4 px-6">ID</td>
                            <td class="py-4 px-6 font-bold">1111</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6">氏名</td>
                            <td class="py-4 px-6 font-bold">{{ $customer->name }}&nbsp;様</td>
                        </tr>
                        <tr class="">
                            <td class="py-4 px-6">性別</td>
                            <td class="py-4 px-6 font-bold">{{ $customer->gender_text }}</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6">生年月日</td>
                            <td class="py-4 px-6 font-bold">1994年7月3日</td>
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
                <div class="h-40 bg-gray-100 p-2">
                    <p>{{ $customer->allergy_info }}</p>
                </div>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">医療履歴</div>
                <div class="h-40 bg-gray-100 p-2">
                    <p>{{ $customer->medical_history }}</p>
                </div>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">薬剤・サプリメント情報</div>
                <div class="h-40 bg-gray-100 p-2">
                    <p>{{ $customer->medication_info }}</p>
                </div>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">肌の悩みと目標</div>
                <div class="h-40 bg-gray-100 p-2">
                    <p>{{ $customer->skin_concerns_goals }}</p>
                </div>
            </div>
            <div class="w-1/2 px-2 mb-4">
                <div class="mb-1">ライフスタイル</div>
                <div class="h-40 bg-gray-100 p-2">
                    <p>{{ $customer->lifestyle }}</p>
                </div>
            </div>
            <a href="/customers">戻る</a>
        </div>
    </div>

</body>

</html>
