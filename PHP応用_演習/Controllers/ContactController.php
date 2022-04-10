<?php
  require_once('../Models/Contact.php');
  
  class ContactController {
    private $Contact;

    // コンストラクタ
    public function __construct () {
      $this->Contact = new Contact ();
    }


    // メソッド


    // データの新規登録
    public function CreateData () {
      $this->Contact -> name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
      $this->Contact -> kana = htmlspecialchars($_POST['kana'], ENT_QUOTES, 'UTF-8');
      $this->Contact -> tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');
      $this->Contact -> email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
      $this->Contact -> text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
      $CreateData = $this->Contact -> Create();
      return $CreateData;
    }

    // データを表で表示
    public function DataDisplay () {
      $ContactDatas = $this->Contact -> Read();
      return $ContactDatas;
    }

    // 編集のためのデータのIDを取得
    public function DataEditId () {
      $EditData = $this->Contact -> GetEditId();
      return $EditData;
    }

    // データを更新
    public function UpdateData () {
      $UpdateData = $this->Contact -> Update();
      return $UpdateData;
    }

    // データを削除
    public function DataDisplayDelete () {
      $DataDelete = $this->Contact -> Delete();
      return $DataDelete;
    }

    // バリデーション
    public function ContactValidation ($name, $kana, $tel, $email, $body) {
      $errors = array();

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

      if (empty($body)) {
        $errors[] = 'bodyエラー';
      }

      return $errors;
    }
  }
?>