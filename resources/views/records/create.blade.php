<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お客様来客の登録</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/fullcalendar@5/main.min.css' rel='stylesheet' />
    <script src='https://unpkg.com/fullcalendar@5/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                }
                // その他のカレンダー設定
            });
            calendar.render();
        });
    </script>
</head>

<body>

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
                <p class="text-gray-600">
                    @if ($customer->birthdate)
                        {{ \Carbon\Carbon::parse($customer->birthdate)->format('Y年n月j日') }}（{{ $customer->age }}才）
                    @else
                        ----年--月--日
                    @endif
                </p>
                <div class="text-gray-700 text-sm">
                    <p>[身長] 173cm</p>
                    <p>[体重] 65kg</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {{-- 日付選択機能 --}}
        {{-- <div class="date-selector">
            <input type="date" id="datePicker" onchange="fetchRecordsByDate()">
        </div> --}}
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

    <div class="container flex m-auto">
        <div id='calendar1' class="flex-1"></div>
        <div id='calendar2' class="flex-1"></div>
        <div id='calendar3' class="flex-1"></div>
    </div>

    <div class="text-center">
        <button id="prev" class="p-2 border m-2 font-bold">前へ</button>
        <button id="next" class="p-2 border m-2 font-bold">次へ</button>
    </div>


    <body class="bg-gray-100 ">
        <div class="container flex mx-auto p-4 bg-white shadow-lg">
            {{-- 前回歴 --}}
            <div class="grid gap-4 grid-cols-1 w-full md:w-1/2 px-2">
                <div id="recordsList" class="bg-gray-300">
                    <div class="bg-gray-400 p-4 mb-4">歴</div>
                    @if ($latestRecord)
                        <div class="bg-gray-300 p-2">
                            <div class="form-group">
                                <p class="font-bold">S</p>
                                <p class="h-32 bg-gray-200 p-2">{{ $latestRecord->subjective }}</p>
                            </div>
                        </div>
                        <div class="bg-gray-300 p-2">
                            <div class="form-group">
                                <p class="font-bold">O</p>
                                <p class="h-32 bg-gray-200 p-2">{{ $latestRecord->objective }}</p>
                            </div>
                        </div>
                        <div class="bg-gray-300 p-2">
                            <div class="form-group">
                                <p class="font-bold">A</p>
                                <p class="h-32 bg-gray-200 p-2">{{ $latestRecord->assessment }}</p>
                            </div>
                        </div>
                        <div class="bg-gray-300 p-2">
                            <div class="form-group">
                                <p class="font-bold">P</p>
                                <p class="h-32 bg-gray-200 p-2">{{ $latestRecord->plan }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="grid gap-4 grid-cols-2 p-2">
                        @if ($latestRecord && $latestRecord->image_path)
                            <div>
                                <img src="{{ asset('storage/' . $latestRecord->image_path) }}" alt="Uploaded Image"
                                    style="max-width: 100%;">
                            </div>
                        @else
                            <div class="bg-gray-400 p-4">画像なし</div>
                        @endif
                        {{-- ここに他の画像や内容を表示するコードを追加できます --}}
                    </div>
                </div>
            </div>


            {{-- 今回入力 --}}
            <div class="w-full md:w-1/2 px-2 mb-4">
                <form method="POST" action="{{ route('customers.records.store', $customerId) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="bg-gray-400 p-4 mb-4">入力</div>
                    <div class="grid gap-4 grid-cols-1 mb-4">
                        <div class="bg-gray-300 p-2">
                            <div class="bg-gray-300"></div>
                            <div class="form-group">
                                <label for="subjective bg-gray-300" class="font-bold">S</label>
                                <textarea type="text" class="form-control h-36 bg-white p-2 w-full" name="subjective" id="subjective"></textarea>
                            </div>
                        </div>
                        <div class="bg-gray-300 p-2">
                            <div class="bg-gray-300"></div>
                            <div class="form-group">
                                <label for="objective bg-gray-300" class="font-bold">O</label>
                                <textarea type="text" class="form-control h-36 bg-white p-2 w-full" name="objective" id="objective"></textarea>
                            </div>
                        </div>
                        <div class="bg-gray-300 p-2">
                            <div class="bg-gray-300"></div>
                            <div class="form-group">
                                <label for="assessment bg-gray-300" class="font-bold">A</label>
                                <textarea type="text" class="form-control h-36 bg-white p-2 w-full" name="assessment" id="assessment"></textarea>
                            </div>
                        </div>
                        <div class="bg-gray-300 p-2">
                            <div class="bg-gray-300"></div>
                            <div class="form-group">
                                <label for="plan bg-gray-300" class="font-bold">P</label>
                                <textarea type="text" class="form-control h-36 bg-white p-2 w-full" name="plan" id="plan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-4 grid-cols-2 p-2">
                        {{-- 既存の画像のプレビュー --}}
                        @if ($latestRecord && $latestRecord->image_path)
                            <div>
                                <img src="{{ asset('storage/' . $latestRecord->image_path) }}" alt="Uploaded Image"
                                    style="max-width: 100%;">
                            </div>
                        @else
                            {{-- <div class="bg-gray-400 p-4">画像なし</div> --}}
                        @endif
                        {{-- ドラッグアンドドロップ領域 --}}
                        <div class="drag-drop-area p-4 h-36 bg-white p-2 w-full border" id="dropzone">
                            <p>画像</p>
                            <input type="file" id="image" name="images[]" style="display: none;" multiple>
                        </div>
                    </div>

                    {{-- 画像プレビュー表示 --}}
                    <div id="preview" class="grid gap-4 grid-cols-2 p-2">
                        {{-- ここにドラッグアンドドロップで選択された画像のプレビューが表示されます --}}
                    </div>
                    <!-- 日付入力フィールド -->
                    <div class="form-group">
                        <label for="record_date">来客日</label>
                        <input type="date" class="form-control" name="record_date" id="record_date"
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <button type="submit" class="btn btn-primary bg-gray-400 p-4 mt-4 text-center">記録を保存</button>
                </form>
            </div>
    </body>

</html>
</body>
