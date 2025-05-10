<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="{{ route('place.login') }}">
    @csrf
    <input type="email" name="email" placeholder="店舗メールアドレス" required>
    <input type="password" name="password" placeholder="パスワード" required>
    <button type="submit">ログイン</button>
</form>
</body>
</html>