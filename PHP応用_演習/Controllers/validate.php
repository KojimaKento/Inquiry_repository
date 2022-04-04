
<?php
  function ContactValidation(string $name, $kana, $tel, $email, $text) {
    $errors = array();
    global $errors;

    if (empty($name) || 10 < mb_strlen($name)) {
      $errors[] = 'nameエラー';
    }

    if (empty($kana) || 10 < mb_strlen($kana)) {
      $errors[] = 'kanaエラー';
    }

    if (!empty($tel) && !is_numeric($tel)) {
      $errors[] = 'telエラー';
    }

    if (empty($email) || !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/',$email)) {
      $errors[] = 'emailエラー';
    }

    if (!empty($text)) {
      if (empty($text)) {
        $errors[] = 'textエラー';
      }
    }

    if (!empty($body)){
      if (empty($body)) {
        $errors[] = 'bodyエラー';
      }
    }

    return $errors;
  }
?>