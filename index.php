<?php
session_start();
require('dbconnect.php');

if (!empty($_POST)) {
    if ($_POST['inquiryTitle'] === '') {
      $error['inquiryTitle'] = 'blank';
    }
    if ($_POST['name'] === '') {
      $error['name'] = 'blank';
    } elseif (is_numeric($_POST['name'])) {
      $error['name'] = 'string';
    }

    if ($_POST['email'] === '') {
      $error['email'] = 'blank';
    } elseif (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $_POST['email'])) {
      $error['email'] = 'email';
    }

    if ($_POST['tel'] === '') {
      $error['tel'] = 'blank';
    } elseif (!preg_match('/^0\d{9,10}$ || ^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/', $_POST['tel'])) {
      $error['tel'] = 'tel';
    }

    if ($_POST['message'] === '') {
      $error['message'] = 'blank';
    } elseif (is_numeric($_POST['message'])) {
      $error['message'] = 'string';
    }

    if (empty($error)) {
      $_SESSION['confirm'] = $_POST;
      header('Location: confirm.php');
      exit();
    }
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
    <a href="#">Header</a>
  </header>
  <div id="container">
    <div class="title">
      <h1>お問い合わせ</h1>
    </div>
    <div class="contact-form">
      <form action="" method="post">
        <dl id="inputItems">
          <div class="inputItem">
            <dt>件名<span class="required">*</span></dt>
            <dd>
              <select name="inquiryTitle">
                <option value="">選択してください</option>
                <option value="ご意見" <?php if ($_POST['inquiryTitle'] == "ご意見") echo 'selected' ?>>ご意見</option>
                <option value="ご感想" <?php if ($_POST['inquiryTitle'] == "ご感想") echo 'selected' ?>>ご感想</option>
                <option value="その他" <?php if ($_POST['inquiryTitle'] == "その他") echo 'selected' ?>>その他</option>
              </select>
            </dd>
            <?php if($error['inquiryTitle'] === 'blank'): ?>
              <p class="error">件名を選択してください</p>
            <?php endif; ?>
          </div>
          <div class="inputItem">
            <dt>名前<span class="required">*</span></dt>
            <dd>
              <input type="text" name="name" value="<?php print(htmlspecialchars($_POST['name'], ENT_QUOTES)); ?>">
            </dd>
            <?php if($error['name'] === 'blank'): ?>
              <p class="error">名前を入力してください</p>
            <?php endif; ?>
            <?php if($error['name'] === 'string'): ?>
              <p class="error">名前は文字列で入力してください</p>
            <?php endif; ?>
          </div>
          <div class="inputItem">
            <dt>メールアドレス<span class="required">*</span></dt>
            <dd>
              <input type="text" name="email" value="<?php print(htmlspecialchars($_POST['email'], ENT_QUOTES)); ?>">
            </dd>
            <?php if($error['email'] === 'blank'): ?>
              <p class="error">メールアドレスを入力してください</p>
            <?php endif; ?>
            <?php if($error['email'] === 'email'): ?>
              <p class="error">メールアドレスの形式が正しくありません</p>
            <?php endif; ?>
          </div>
          <div class="inputItem">
            <dt>電話番号<span class="required">*</span></dt>
            <dd>
              <input type="text" name="tel" value="<?php print(htmlspecialchars($_POST['tel'], ENT_QUOTES)); ?>">
            </dd>
            <?php if($error['tel'] === 'blank'): ?>
              <p class="error">電話番号を入力してください</p>
            <?php endif; ?>
            <?php if($error['tel'] === 'tel'): ?>
              <p class="error">電話番号の形式が正しくありません</p>
            <?php endif; ?>
          </div>
          <div class="inputItem">
            <dt>お問い合わせ内容<span class="required">*</span></dt>
            <dd>
              <textarea name="message" class="message"><?php print(htmlspecialchars($_POST['message'], ENT_QUOTES)); ?></textarea>
            </dd>
            <?php if($error['message'] === 'blank'): ?>
              <p class="error">お問い合わせ内容を入力してください</p>
            <?php endif; ?>
            <?php if($error['message'] === 'string'): ?>
              <p class="error">お問い合わせ内容は文字列で入力してください</p>
            <?php endif; ?>
        </dl>
        <div>
          <button id="inputSubmit">確認画面へ</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>