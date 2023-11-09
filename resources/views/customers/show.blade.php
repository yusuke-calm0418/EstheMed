<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>患者基本情報</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="w-11/12 mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-4">
        <div class="flex space-between p-4">
            <div class="flex">
                <div class="rounded-full bg-pink-200 h-12 w-12 flex items-center justify-center">
                    <span class="text-xl text-pink-600">{{ $customer->gender }}</span>
                </div>
                <div class="ml-3">
                    <p class="text-gray-900">ID:{{ $customer->id }}</p>
                    <p class="text-gray-600">{{ $customer->name }}</p>
                </div>
            </div>
            <div class="flex items-center">
                <div>
                    <span class="text-gray-600 text-sm">生年月日29才</span>
                    <div class="text-gray-700">
                        <p>[身長] 173cm</p>
                        <p>[体重] 65kg</p>
                    </div>
                </div>
                <div class="text-gray-700">
                    <p>患者プロフィール</p>
                </div>
            </div>
        </div>
        {{-- <div class="flex justify-between px-4 py-2 bg-gray-200">

        </div> --}}
        <div class="px-4 py-2">
            <h1 class="text-gray-900 font-bold text-xl">山田 花子</h1>
            <p class="py-1 text-gray-600">女</p>
            <p class="py-1 text-gray-600">生年月日 1994年7月3日</p>
            <p class="py-1 text-gray-600">東京都渋谷区神宮前1-3-35-55</p>
        </div>
        <div class="flex p-4 border-t border-gray-200">
            <div class="w-1/2">
                <div class="mb-2">アレルギー情報</div>
                <div class="h-24 bg-gray-100"></div>
            </div>
            <div class="w-1/2 pl-2">
                <div class="mb-2">前回の施術歴</div>
                <div class="h-24 bg-gray-100"></div>
            </div>
        </div>
        <div class="px-4 py-2 border-t border-gray-200">
            <div class="mb-2">医療履歴</div>
            <div class="h-24 bg-gray-100"></div>
        </div>
        <div class="px-4 py-2 border-t border-gray-200">
            <div class="mb-2">ライフスタイル</div>
            <div class="h-24 bg-gray-100"></div>
        </div>
        <a href="/customers">戻る</a>
    </div>

</body>

</html>
