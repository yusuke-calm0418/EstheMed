// お客様情報登録画面_Calendarで日付選択する
function fetchRecordsByDate() {
    var selectedDate = document.getElementById('datePicker').value;
    var recordsListDiv = document.getElementById('recordsList');

    fetch('/records-fetch-route?date=' + selectedDate)
        .then(response => response.json())
        .then(data => {
            recordsListDiv.innerHTML = ''; // 既存の内容をクリア
            data.forEach(record => {
                let recordHtml = `
                    <div class="record">
                        <p><strong>主観的所見:</strong> ${record.subjective}</p>
                        <p><strong>客観的所見:</strong> ${record.objective}</p>
                        <p><strong>評価:</strong> ${record.assessment}</p>
                        <p><strong>計画:</strong> ${record.plan}</p>
                        ${record.image_path ? `<img src="/storage/${record.image_path}" alt="Record Image" style="max-width:100%;">` : ''}
                    </div>
                `;
                recordsListDiv.innerHTML += recordHtml;
            });
        })
        .catch(error => {
            console.error('Error:', error);
            recordsListDiv.innerHTML = 'エラーが発生しました。'; // エラーメッセージの表示
        });
}

document.addEventListener('DOMContentLoaded', function() {
    // 行全体にクリックイベントを設定
    const rows = document.querySelectorAll('.clickable-row');
    rows.forEach(row => {
        row.addEventListener('click', function() {
            window.location.href = this.dataset.href;
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var dropzone = document.getElementById('dropzone');
    var fileInput = document.getElementById('image');
    var preview = document.getElementById('preview');

    // ドロップゾーンのイベント設定
    dropzone.addEventListener('click', function() {
        fileInput.click();
    });

    dropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        this.classList.add('drag-over');
    });

    dropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        this.classList.remove('drag-over');
    });

    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        this.classList.remove('drag-over');

        var files = e.dataTransfer.files;
        handleFiles(files);
    });

    fileInput.addEventListener('change', function() {
        var files = this.files;
        handleFiles(files);
    });

    // 画像ファイルの処理
    function handleFiles(files) {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
});

// カレンダーの実装
document.addEventListener('DOMContentLoaded', function() {

    var pathArray = window.location.pathname.split('/');
    var customerId = pathArray[2]; // URLが /customers/5/records/create 形式のため
    
    var calendars = [];
    var date = new Date();
    var month = date.getMonth();
    var year = date.getFullYear();

    for (var i = 0; i < 3; i++) {
        var calendarEl = document.getElementById('calendar' + (i + 1));
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: new Date(year, month - (2 - i), 1),
            locale: 'ja', 
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            dayCellContent: function(e) {
                e.dayNumberText = e.dayNumberText.replace('日', '');
            },
                events: function(fetchInfo, successCallback, failureCallback) {
                fetch(`/api/${customerId}/records/${fetchInfo.startStr}/${fetchInfo.endStr}`)
                    .then(response => response.json())
                    .then(records => {
                        var events = records.map(record => {
                            return {
                                title: '◯',
                                start: record.record_date,
                                color: 'blue'
                            };
                        });
                        successCallback(events);
                    })
                    .catch(error => failureCallback(error));
            },
            // その他のオプション
                dateClick: function(info) {
                    var date = new Date(info.dateStr);
                    var year = date.getFullYear();
                    var month = date.getMonth() + 1; // JavaScriptの月は0から始まるため、1を足す
                    var clickedDate = info.dateStr; // YYYY-MM-DD 形式の日付
                    console.log("Clicked date: ", clickedDate);
                    fetch(`/api/${customerId}/records/${clickedDate}/${clickedDate}`)
                        .then(response => response.json())
                        .then(records => {
                            displayRecords(records);
                    })
                        .catch(error => console.error('Error:', error));
                    }
        });
        calendar.render();
        calendars.push(calendar);
                }

// 前へボタン
    document.getElementById('prev').addEventListener('click', function() {
        calendars.forEach(function(calendar) {
            var currentDate = calendar.getDate();
            calendar.gotoDate(new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1));
        });
    });
// 次へボタン
    document.getElementById('next').addEventListener('click', function() {
        calendars.forEach(function(calendar) {
            var currentDate = calendar.getDate();
            calendar.gotoDate(new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1));
        });
    });
});

function displayRecords(records) {
// IDがrecordsListのHTML要素を取得し、recordsListDivという変数に格納します。この要素は、記録を表示するためのコンテナとして機能します。
    var recordsListDiv = document.getElementById('recordsList');
    recordsListDiv.innerHTML = ''; // 既存の内容をクリア

    records.forEach(record => {
        let recordHtml = `
            <div class="record">
                <p><strong>主観的所見:</strong> ${record.subjective || 'なし'}</p>
                <p><strong>客観的所見:</strong> ${record.objective || 'なし'}</p>
                <p><strong>評価:</strong> ${record.assessment || 'なし'}</p>
                <p><strong>計画:</strong> ${record.plan || 'なし'}</p>
                ${record.image_path ? `<img src="/storage/${record.image_path}" alt="Record Image" style="max-width:100%;">` : '<p>画像なし</p>'}
            </div>
        `;
        recordsListDiv.innerHTML += recordHtml;
    });
}


