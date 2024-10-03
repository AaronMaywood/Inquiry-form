<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>お問い合わせフォーム（確認画面）</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//------------------------------------------------------------------------------
// エラーチェック
//------------------------------------------------------------------------------
$err = null;    // この行は書かなくても動くが、初期状態はエラーが何もないことを表している

// 必須項目チェック
if( $_POST['name'] === '' ){
    $err['name'][] = 'お名前を入力してください';
}
if( $_POST['email'] === '' ){
    $err['email'][] = 'メールアドレスを入力してください';
}

if( $_POST['message'] === '' ){
    $err['message'][] = 'メッセージを入力してください';
}

// 文字数長さチェック
if( mb_strlen( $_POST['name'] ) > 20 ){
    $err['name'][] = 'お名前が長過ぎます。20文字以内でご入力下さい。';
}
if( mb_strlen( $_POST['email'] ) > 50 ){
    $err['email'][] = 'メールアドレスが長過ぎます。20文字以内でご入力下さい。';
}
if( mb_strlen( $_POST['message'] ) > 100 ){
    $err['message'][] = 'メッセージが長過ぎます。100文字以内でご入力下さい。';
}

// フォーマット、値チェック
// http://php.net/manual/ja/function.preg-match.php
// preg_match() は、pattern が指定した subject にマッチした場合に 1 を返します。 マッチしなかった場合は 0、エラーが発生した場合は FALSE を返します。 
if( ! preg_match( '/^.+@.+$/', $_POST['email'] ) ){
    $err['email'][] = 'メールアドレスの書式が正しくありません。';
}

// 何かしらエラーがあった場合にtrue になるフラグ
$has_error = isset($err);

// 複数あるエラーのうち最初のエラーメッセージを優先する
function echo_error( $error_info, $key ){
    if( array_key_exists( $key, $error_info ) ) {
        echo $error_info[ $key ][0];
    }
}
?>
<?php if( $has_error ) { ?>
    <p class="error">入力した値にエラーがありました。</p>
    <form method="post" action="confirm.php">
        <table border="1">
            <tr>
                <th>お名前</th>
                <td>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                    <span class="error"><?php echo_error($err, 'name'); ?></span>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?>">
                    <span class="error"><?php echo_error( $err, 'email'); ?></span>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <textarea name="message"><?php echo htmlspecialchars($_POST['message']) ?></textarea>
                    <span class="error"><?php echo_error( $err, 'message' ); ?></span>
                </td>
            </tr>
        </table>
        <div class="right">
            <input type="submit" value="送信">
        </div>
    </form>
    </body>
    </html>
<?php
}else{
?>
    <p>以下の内容で正しければ送信ボタンを押して下さい。</p>
    <form method="post" action="send.php">
        <?php
        foreach( $_POST as $key => $value ){
            $value = htmlspecialchars($value);
            echo "<input type='hidden' name='{$key}' value='{$value}'>";
        }
        ?>
        <table border="1">
            <tr>
                <th>お名前</th>
                <td><?php echo htmlspecialchars($_POST['name']); ?></td>    
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?php echo htmlspecialchars($_POST['email']); ?></td>   
            </tr>   
            <tr>
                <th>お問い合わせ内容</th>
                <td><?php echo preg_replace('/\n/', '<br>', htmlspecialchars($_POST['message']) ); ?></td>
            </tr>
        </table>
        <div class="right">
            <input type="submit" value="送信">
        </div>
    </form>
</body>
</html>
<?php
}
?>