<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>患者情報フォーム</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex items-center space-x-4 mb-4">
            <div class="flex-shrink-0 bg-pink-200 p-2 rounded-full">
                <!-- Icon or Image -->
                <span class="text-xl text-pink-600">👤</span>
            </div>
            <div class="space-y-1">
                <div class="text-sm text-gray-600">ID:------</div>
                <div class="text-sm text-gray-600">-- -- --</div>
            </div>
            <div class="ml-auto space-y-1">
                <div class="text-sm text-gray-600">生年月日: ----年--月--日 (--歳)</div>
                <div class="flex space-x-2">
                    <div class="text-sm text-gray-600">[身長] --cm</div>
                    <div class="text-sm text-gray-600">[体重] --kg</div>
                </div>
            </div>
        </div>

        <!-- Form Starts Here -->
        <form>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">氏名</label>
                <input type="text" id="name" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- Other input fields would go here, following the same pattern -->
            <!-- ... -->
            
            <div class="flex space-x-4 mb-4">
                <!-- Form sections like 生活習慣, 治療記録, etc. -->
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="px-10 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">登録</button>
            </div>
        </form>
    </div>
</body>
</html>
