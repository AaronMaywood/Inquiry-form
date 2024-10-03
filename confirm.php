<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>お問い合わせフォーム（確認画面）</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- 1. エラーがあった場合の表示 -->
    <p class="error">入力した値にエラーがありました。</p>
    <form method="post" action="confirm.php">
        <table border="1">
            <tr>
                <th>お名前</th>
                <td>
                    <input type="text" name="name" value="鈴木太郎鈴木太郎鈴木太郎鈴木太郎鈴木太郎鈴木太郎">
                    <span class="error">お名前が長過ぎます。20文字以内でご入力下さい。</span>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input type="text" name="email" value="suzuki">
                    <span class="error">メールアドレスの書式が正しくありません。</span>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <textarea name="message"></textarea>
                    <span class="error">メッセージを入力してください</span>
                </td>
            </tr>
        </table>
        <div class="right">
            <input type="submit" value="送信">
        </div>
    </form>

    <!-- 2. エラーが無かった場合の表示 -->
    <p>以下の内容で正しければ送信ボタンを押して下さい。</p>
    <form method="post" action="send.php">
        <table border="1">
            <tr>
                <th>お名前</th>
                <td>鈴木太郎</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>taro@adjust.ne.jp</td>   
            </tr>   
            <tr>
                <th>お問い合わせ内容</th>
                <td>test<br>
                test<br>
                test
                </td>
            </tr>
        </table>
        <div class="right">
            <input type="submit" value="送信">
        </div>
    </form>
</body>
</html>