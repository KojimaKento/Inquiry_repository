<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/complete.css">
    <title>完了画面</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

  <body>
    <?php
      if (empty($_SERVER["HTTP_REFERER"])) {
        header('Location: ./contact.php');
      }
    ?>
    <h1>確認画面</h1>
    <div class="complete_text">
      お問合せ内容を送信しました。<br>
      ありがとうございました。<br>
      <a href="index.php">トップへ</a>
    </div>
  </body>

</html>