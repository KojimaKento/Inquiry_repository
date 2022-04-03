<?php
  require_once ('../Controllers/validate.php');

  $ContactValidate = new Validate ();
  $ContactValidate->name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
  $ContactValidate->kana = htmlspecialchars($_POST['kana'], ENT_QUOTES, 'UTF-8');
  $ContactValidate->tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');
  $ContactValidate->email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $ContactValidate->text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
  $errors = $ContactValidate->ContactValidation();

  if (!(empty($errors))) {
    require_once ('ContactError.php');
  } else {
    require_once ('confirm.php');
  }
?>