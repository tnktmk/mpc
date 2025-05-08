<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>QRコード読み取り</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
</head>
<body>
    <h1>QRコードをスキャンしてください</h1>

    <div id="reader" style="width: 300px;"></div>
    <p id="result"></p>

    <script>
        function onScanSuccess(decodedText) {
            document.getElementById('result').innerText = `読み取り成功: ${decodedText}`;

            // 読み取った内容（例: トークン）をLaravelに渡す
            window.location.href = `/token/check/${encodeURIComponent(decodedText)}`;
        }

        const html5QrCode = new Html5Qrcode("reader");

        Html5Qrcode.getCameras().then(cameras => {
            if (cameras.length) {
                html5QrCode.start(
                    { facingMode: "environment" }, // 背面カメラ指定
                    {
                        fps: 10,
                        qrbox: { width: 250, height: 250 }
                    },
                    onScanSuccess
                );
            }
        }).catch(err => {
            console.error("カメラ取得エラー:", err);
        });
    </script>
</body>
</html>
