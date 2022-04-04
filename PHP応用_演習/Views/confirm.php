<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/confirm.css">
    <title>確認画面</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

  <body>
    <?php
      if (empty($_SERVER["HTTP_REFERER"])) {
        header('Location: ./contact.php');
      }
    ?>
    <h1>確認画面</h1>
    <form action="complete.php" method="POST" name="contact">

      <div class="name">氏名</div>
      <input id="name" type="text" name='name' value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); ?>">

      <div class="kana">フリガナ</div>
      <input id="kana" type="text" name='kana' value="<?php echo htmlspecialchars($_POST['kana'], ENT_QUOTES, 'UTF-8'); ?>">

      <div class="tel">電話番号</div>
      <input id="tel" type="text" name='tel' value="<?php echo htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8'); ?>">

      <div class="mail">メールアドレス</div>
      <input id="mail" type="text" name='email' value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); ?>">

      <div class="content">お問合せ内容</div>
      <div class="border" style="width: 210px; border: solid 1px; margin: 0 auto; border-radius: 4px; padding: 2px;">
        <?php 
          echo nl2br(htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8'));
        ?>
      </div>

      <div style="margin: auto; margin-top: 20px;">
        <input id="submit" type="submit" name="btn_confirm" value="完了画面へ">
        <input value="戻る" onclick="history.back();" type="button">
      </div>
    </form>
  </body>

</html>


<?php
  require_once('../Models/CRUD.php');

  $ContactInsert = new CRUD ();
  $ContactInsert->name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
  $ContactInsert->kana = htmlspecialchars($_POST['kana'], ENT_QUOTES, 'UTF-8');
  $ContactInsert->tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');
  $ContactInsert->email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $ContactInsert->text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
  $ContactInsert->Create();
?>
