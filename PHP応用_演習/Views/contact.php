<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <title>入力画面</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <h1>入力画面</h1>
      <form action="ContactValidate.php" method="POST" name="contact">

      <div class="name">氏名</div>
      <input id="name" type="text" name='name' value="<?php if( !empty($_POST['name']) ){ echo $_POST['name']; } ?>">

      <div class="kana">フリガナ</div>
      <input id="kana" type="text" name='kana' value="<?php if( !empty($_POST['kana']) ){ echo $_POST['kana']; } ?>">

      <div class="tel">電話番号</div>
      <input id="tel" type="text" name='tel' value="<?php if( !empty($_POST['tel']) ){ echo $_POST['tel']; } ?>">

      <div class="mail">メールアドレス</div>
      <input id="mail" type="text" name='email' value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>">

      <div class="content">お問合せ内容</div>
      <textarea id="content" name='text' <?php if( !empty($_POST['text']) ){ echo $_POST['text']; } ?>></textarea>

      <input id="submit" type="submit" name="btn_confirm" value="確認画面へ">

      </form>
  </body>

  <script>
    $(function(){
      $('#submit').on('click', function(){
        if ($('#name').val() === '') {
          alert('名前を10文字以内で入力してください。');
          $('#name').focus();
          return false;
        }
        if ($('#kana').val() === '') {
          alert('フリガナを10文字以内で入力してください。');
          $('#kana').focus();
          return false;
        }
        if ($('#mail').val() === '') {
          alert('メールアドレスを入力してください。');
          $('#mail').focus();
          return false;
        }
        if ($('#content').val() === '') {
          alert('お問合せ内容を入力してください。');
          $('#content').focus();
          return false;
        }
      });
    });
  </script>


<!-- データベースをブラウザ上に表示 -->

  <?php
  require_once(ROOT_PATH. './Views/DataDisplay.php');
  ?>
</html>
