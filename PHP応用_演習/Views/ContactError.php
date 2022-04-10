<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/contact.css">
    <title>入力画面</title>
  </head>

  <body>
    <h1>エラー確認画面</h1>
      <?php
        require_once '../Controllers/ContactController.php';
      ?>

      <form action="ContactValidate.php" method="POST" name="contact">

        <div class="name">氏名</div>
        <?php if (in_array('nameエラー', $errors)): ?>
          <p style="color: #ff2e5a; text-align: center; font-size: 15px;">
            <?php echo ' * 10文字以内で氏名を記入してください ' ?>
          </p>
        <?php endif ?>
        <input id="name" type="text" name='name' value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); ?>">
        
        <div class="kana">フリガナ</div>
        <?php if (in_array('kanaエラー', $errors)): ?>
          <p style="color: #ff2e5a; text-align: center; font-size: 15px;">
            <?php echo ' * 10文字以内で氏名を記入してください ' ?>
          </p>
        <?php endif ?>
        <input id="kana" type="text" name='kana' value="<?php echo htmlspecialchars($_POST['kana'], ENT_QUOTES, 'UTF-8'); ?>">

        <div class="tel">電話番号</div>
        <?php if (in_array('telエラー', $errors)): ?>
          <p style="color: #ff2e5a; text-align: center; font-size: 15px;">
            <?php echo ' * 正しい電話番号を記入してください ' ?>
          </p>
        <?php endif ?>
        <input id="tel" type="text" name='tel' value="<?php echo htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8'); ?>">

        <div class="mail">メールアドレス</div>
        <?php if (in_array('emailエラー', $errors)): ?>
          <p style="color: #ff2e5a; text-align: center; font-size: 15px;">
            <?php echo ' * 正しいメールアドレスを記入してください ' ?>
          </p>
        <?php endif ?>
        <input id="mail" type="text" name='email' value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); ?>">


        <div class="content">お問合せ内容</div>
        <?php if (in_array('bodyエラー', $errors)): ?>
          <p style="color: #ff2e5a; text-align: center; font-size: 15px;">
            <?php echo ' * お問合せ内容を記入してください ' ?>
          </p>
        <?php endif ?>
        <textarea id="content" name='text'><?php echo nl2br(htmlspecialchars($_POST["text"], ENT_QUOTES, 'UTF-8')); ?></textarea>

        <input id="submit" type="submit" name="btn_confirm" value="確認画面へ">
      </form>
  </body>

</html>