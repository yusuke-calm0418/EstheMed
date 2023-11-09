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

</html>
