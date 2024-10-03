<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>お問い合わせフォーム（完了画面）</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>以下の内容でお問い合わせを受け付けました。</p>
    <div class="form">
        <table border="1">
            <tr>
                <th>お名前</th>
                <td> <?php echo htmlspecialchars($_POST['name']); ?> </td>    
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td> <?php echo htmlspecialchars($_POST['email']); ?> </td>   
            </tr>   
            <tr>
                <th>お問い合わせ内容</th>
                <td> <?php echo preg_replace('/\n/','<br>', htmlspecialchars($_POST['message']) ); ?> </td>
            </tr>
        </table>
    </div>
</body>
</html>