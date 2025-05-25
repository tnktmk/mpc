{{-- resources/views/qrcode/show.blade.php --}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>QRコード（SVG）</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1>QRコード（SVG）</h1>

    <div>
        {!! QrCode::format('svg')->size(200)->generate($data) !!}
    </div>

    <p>埋め込まれたデータ: {{ $data }}</p>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = @json($data); // $data = UUIDトークン
        if (window.Echo) {
            console.log('Echo ready');
            window.Echo.private(`test.${token}`)
            // window.Echo.private('test.{{ $data }}')
                .listen('.SendResult', (e) => {
                    alert('受信しました');
                    console.log('受信したイベント:', e.token);
                });
        } else {
            console.error('Echo is undefined');
        }
    });
</script>
</body>
</html>
