{{-- resources/views/qrcode/show.blade.php --}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>QRコード（SVG）</title>
</head>
<body>
    <h1>QRコード（SVG）</h1>

    <div>
        {!! QrCode::format('svg')->size(200)->generate($data) !!}
    </div>

    <p>埋め込まれたデータ: {{ $data }}</p>
</body>
</html>
