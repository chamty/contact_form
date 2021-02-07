<?php
session_start();
require('dbconnect.php');

if (!isset($_SESSION['confirm'])) {
  header('Location: index.php');
  exit();
}

if (!empty($_POST)) {
  $statement = $db->prepare('INSERT INTO contact SET title=?, name=?, email=?, tel=?, message=?');
  echo $statement->execute(array(
    $_SESSION['confirm']['inquiryTitle'],
    $_SESSION['confirm']['name'],
    $_SESSION['confirm']['email'],
    $_SESSION['confirm']['tel'],
    $_SESSION['confirm']['message'],
  ));

  // エラーチェック用
  // $arr = $statement->errorInfo();
  // print_r($arr);
  // exit();

  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  // $to = $_SESSION['confirm']['email'];
  // $title = $_SESSION['confirm']['inquiryTitle'];
  // $content = $_SESSION['confirm']['message'];
  // if(mb_send_mail($to, $title, $content)){
  //   echo "メールを送信しました";
  // } else {
  //   echo "メールの送信に失敗しました";
  // };

  $to = 'ak.cha07.mt@gmail.com';
  $title = 'test';
  $content = 'hogehogehoge';
  $header = 'From: ak.cha07.mt@gmail';
  mb_send_mail($to, $title, $content, $header);
  if(mb_send_mail($to, $title, $content, $header)){
    echo "メールを送信しました";
  } else {
    echo "メールの送信に失敗しました";
  };

  unset($_SESSION['confirm']);

  header('Location: complete.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
  </header>
  <div id="container">
    <div class="title">
      <h1>確認ページ</h1>
    </div>
    <div class="contact-form">
      <form action="" method="post">
        <input type="hidden" name="action" value="submit">
        <dl id="inputItems">
          <div class="inputItem">
            <dt>件名</dt>
            <dd>
              <?php print(htmlspecialchars($_SESSION['confirm']['inquiryTitle'], ENT_QUOTES)); ?>
            </dd>
          </div>
          <div class="inputItem">
            <dt>名前</dt>
            <dd>
              <?php print(htmlspecialchars($_SESSION['confirm']['name'], ENT_QUOTES)); ?>
            </dd>
          </div>
          <div class="inputItem">
            <dt>メールアドレス</dt>
            <dd>
            <?php print(htmlspecialchars($_SESSION['confirm']['email'], ENT_QUOTES)); ?>
            </dd>
          </div>
          <div class="inputItem">
            <dt>電話番号</dt>
            <dd>
            <?php print(htmlspecialchars($_SESSION['confirm']['tel'], ENT_QUOTES)); ?>
            </dd>
          </div>
          <div class="inputItem">
            <dt>お問い合わせ内容</dt>
            <dd>
            <?php print(htmlspecialchars($_SESSION['confirm']['message'], ENT_QUOTES)); ?>
            </dd>
        </dl>
        <div>
        <div><a href="index.php?action=rewrite">&laquo;&nbsp;修正</a> | <input type="submit" id="inputSubmit" value="送信"></div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>