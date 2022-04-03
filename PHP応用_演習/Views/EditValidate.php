<?php
  require_once '../Controllers/validate.php';

  $EditValidate = new Validate ();
  $EditValidate->id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
  $EditValidate->name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
  $EditValidate->kana = htmlspecialchars($_POST['kana'], ENT_QUOTES, 'UTF-8');
  $EditValidate->tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');
  $EditValidate->email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
  $EditValidate->body = htmlspecialchars($_POST['body'], ENT_QUOTES, 'UTF-8');
  $errors = $EditValidate->ContactValidation();

  if (!(empty($errors))) {
    require_once 'EditError.php';
  } else {
    require_once 'UpdateData.php';
  }
?>