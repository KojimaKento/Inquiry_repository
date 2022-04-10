<?php
  require_once('../Controllers/ContactController.php');
  $ContactValidation = new ContactController();
  $errors = $ContactValidation -> ContactValidation(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'),
                                                 htmlspecialchars($_POST['kana'], ENT_QUOTES, 'UTF-8'),
                                                 htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8'),
                                                 htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'),
                                                 htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8'));

  if (!(empty($errors))) {
    require_once ('ContactError.php');
  } else {
    require_once ('confirm.php');
  }
?>