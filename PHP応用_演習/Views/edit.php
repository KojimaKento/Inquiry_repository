<?php
  require_once('../Models/CRUD.php');
  $ContactEdit = new CRUD();
  $result = $ContactEdit -> GetEditId ();
?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/contact.css">
    <title>更新画面</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <h1>更新画面</h1>

    <form action="EditValidate.php" method="POST" name="contact">
    <input type="hidden" name="id" value="<?php if (!empty($result['id'])) echo(htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'));?>">

    <div class="name">氏名</div>
    <input id="name" type="text" name='name' value="<?php echo htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8'); ?>">

    <div class="kana">フリガナ</div>
    <input id="kana" type="text" name='kana' value="<?php echo htmlspecialchars($result['kana'], ENT_QUOTES, 'UTF-8'); ?>">

    <div class="tel">電話番号</div>
    <input id="tel" type="text" name='tel' value="<?php echo htmlspecialchars($result['tel'], ENT_QUOTES, 'UTF-8'); ?>">

    <div class="mail">メールアドレス</div>
    <input id="mail" type="text" name='email' value="<?php echo htmlspecialchars($result['email'], ENT_QUOTES, 'UTF-8'); ?>">

    <div class="content">お問合せ内容</div>
    <textarea id="content" name='body'><?php if (!empty($result['text'])) echo htmlspecialchars($result['text'], ENT_QUOTES, 'UTF-8'); ?></textarea>

    <input id="submit" type="submit" name="btn_confirm" value="入力画面へ">
    <input type="hidden" name="edit_id" value="<?=$result['id']?>">

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
</html>