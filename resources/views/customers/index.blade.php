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
        <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-lg">
            <div class="flex space-x-4">
                <!-- Logo or Branding -->
                <div>
                    <img src="{{ asset('images/ethemed_logo.png') }}" alt="EtheMed" class="h-8">
                    <!-- Replace with your logo -->
                </div>
                <!-- Navigation -->
                <div class="hidden sm:flex items-center space-x-1">
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">お客様一覧</a>
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">予約一覧</a>
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">スケジュール</a>
                    <a href="#" class="text-gray-500 px-3 py-2 rounded-md text-sm font-medium">設定</a>
                </div>
            </div>
            <!-- Search -->
            <div class="flex items-center">
                <input class="rounded-lg border-gray-300" type="search" placeholder="検索...">
                <button class="ml-2 text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded-lg"
                    onclick='location.href="{{ route('customers.create') }}"'>
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
                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ str_pad($customer->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="py-4 px-6 border-b border-grey-light text-xl flex items-center">
                                <img src="{{ asset('images/' . $customer->gender_image) }}" alt="Gender Image"
                                    class="h-14 w-14 mr-4"> <!-- 画像のサイズをh-12 w-12 (48px)に設定 -->
                                <span>{{ $customer->name }}&nbsp;様</span>
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $customer->gender_text }}</td>
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
