<?php
  require_once('../Controllers/ContactController.php');
  $ContactUpdata = new ContactController();
  $UpdateData = $ContactUpdata -> UpdateData();
?>