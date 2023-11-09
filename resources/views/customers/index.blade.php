<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お客様一覧</title>
</head>

<body>
    <h1>お客様一覧</h1>
    <ul>
        @foreach ($customers as $customer)
            <!-- // リンク先をidで取得し名前で出力 -->
            <li><a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a></li>
        @endforeach
    </ul>
</body>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto my-6">
        <div class="flex justify-between items-center bg-white p-4 rounded-lg">
            <div class="flex space-x-4">
                <!-- Logo or Branding -->
                <div>
                    <img src="path-to-your-logo.png" alt="EtheMed" class="h-8"> <!-- Replace with your logo -->
                </div>
                <!-- Navigation -->
                <div class="hidden sm:flex items-center space-x-1">
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">データ一覧</a>
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">お客様一覧</a>
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">スケジュール</a>
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">設定</a>
                </div>
            </div>
            <!-- Search -->
            <div class="flex items-center">
                <input class="rounded-lg border-gray-300" type="search" placeholder="検索...">
                <button class="ml-2 text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded-lg">
                    お客様登録
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            ID</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            氏名</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            性別</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            生年月日</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            前回施術日</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            メモ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table Row -->

                    {{-- <ul>
                        <li> --}}
                    @foreach ($customers as $customer)
                        <tr class="hover:bg-grey-lighter clickable-row"
                            data-href='{{ url("/customers/{$customer->id}") }}'>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $customer->id }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $customer->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $customer->gender }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $customer->birthdate }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">2023年4月24日</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <a href="{{ url('/customers', $customer->id) }}"
                                    class="text-blue-500 hover:text-blue-800">詳細</a>
                            </td>
                        </tr>
                    @endforeach
                    {{-- </a>
                        </li>
                    </ul> --}}
                    <!-- Repeat for each table row -->
                    <!-- ... -->
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="flex justify-center">
                <div class="flex rounded-md">
                    {{-- <a href="#" class="py-2 > --}}

                    <script src="{{ asset('js/app.js') }}"></script>
</body>


</html>
