<?php
  require_once(ROOT_PATH. './Models/Db.php');

  class Contact {
    public $name;
    public $kana;
    public $tel;
    public $email;
    public $text;

    public function Create () {
      try {
        $PDO = new Db ();
        $pdo = $PDO -> PDO();

        $sql = "INSERT INTO contacts (name, kana, tel, email, body) 
        VALUES (:name, :kana, :tel, :email, :text)";

        $pdo->beginTransaction();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare($sql);

        $params = array(':name' => $this -> name,
                        ':kana' => $this -> kana,
                        ':tel' => $this -> tel,
                        ':email' => $this -> email,
                        ':text' => $this -> text);

        $res = $stmt->execute($params);

        if( $res ) {
          $pdo->commit();
        }

      } catch(PDOException $e){
        exit('エラー ' . $e->getMessage()) ;
        $pdo->rollBack();
      }
    }


    public function Read () {
      try {
        // データベースへの接続
        $PDO = new Db ();
        $pdo = $PDO -> PDO();

        // テーブルからのデータの取得
        $stt = $pdo->prepare('SELECT * FROM contacts');
        $stt->execute();
        return $result = $stt ;
        // $stt = $pdo->query("SELECT * FROM contacts");
      } catch (Exception $e) {
        echo 'エラーが発生しました。'. $e->getMessage();
      }
    }


    public function GetEditId () {
      try {
        // データベース接続
        $PDO = new Db ();
        $pdo = $PDO -> PDO();

        // データから編集するidを持ってくる
        $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = :id');
        $stmt->execute(array(':id' => $_GET["id"]));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
      }
    }


    public function Update () {
      try {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $kana = $_POST['kana'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $body = $_POST['body'];

        $PDO = new Db ();
        $pdo = $PDO -> PDO();
    
        $stmt = $pdo->prepare('UPDATE contacts SET name = :name, kana = :kana , tel = :tel, email = :email, body = :body WHERE id = :id');
    
        $stmt->bindParam( ':id', $id, PDO::PARAM_INT );
        $stmt->bindParam( ':name', $name, PDO::PARAM_STR );
        $stmt->bindParam( ':kana', $kana, PDO::PARAM_STR );
        $stmt->bindParam( ':tel', $tel, PDO::PARAM_STR );
        $stmt->bindParam( ':email', $email, PDO::PARAM_STR );
        $stmt->bindParam( ':body', $body, PDO::PARAM_STR );

        $stmt->execute();

        header('Location: ./contact.php'); 
        
      } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
      }
    }

    public function Delete() {
      try {
        // データベースへの接続
        $PDO = new Db ();
        $pdo = $PDO -> PDO();
        
        // データの削除
        $stt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
        $stt->bindParam( ':id', $_GET['delete_id'], PDO::PARAM_INT );
        $stt->execute();
        return $stt;
      } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
      }
    }
  }
?>