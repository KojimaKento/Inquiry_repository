
<?php
  class Validate {
    public $name;
    public $kana;
    public $tel;
    public $email;
    public $text;
    public $body;

    public function ContactValidation() {
      $errors = array();

      if (empty($this -> name) || 10 < mb_strlen($this -> name)) {
        $errors[] = 'nameエラー';
      }

      if (empty($this -> kana) || 10 < mb_strlen($this -> kana)) {
        $errors[] = 'kanaエラー';
      }

      if (!empty($this -> tel) && !is_numeric($this -> tel)) {
        $errors[] = 'telエラー';
      }

      if (empty($this -> email) || !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/',$this -> email)) {
        $errors[] = 'emailエラー';
      }

      if (!empty($text)) {
        if (empty($this -> text)) {
          $errors[] = 'textエラー';
        }
      }

      if (!empty($body)){
        if (empty($this -> body)) {
          $errors[] = 'bodyエラー';
        }
      }

      return $errors;
    }
  }
?>