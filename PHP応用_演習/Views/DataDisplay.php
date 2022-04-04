<?php
  require_once('../Models/CRUD.php');
  $ContactRead = new CRUD();
  $result = $ContactRead -> Read();
?>

<?php 
  if ($pdo = null) {
  echo "データが表示できません。";
?>
<?php } else { ?>
  <center>
    <table class="table" width="897.75", border="solid 1px black">
      <tr>
        <th>名前</th>
        <th>フリガナ</th>
        <th>電話番号</th>
        <th>メールアドレス</th>
        <th>お問いあわせ内容</th>
        <th></th>
        <th></th>
      </tr>
      <?php
        foreach ($result as $row) {
      ?>
      <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['kana'] ?></td>
        <td><?php echo $row['tel'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['text'] ?></td>
        <td>
          <?php
            echo "<a href=./edit.php?id=" . $row["id"] . ">編集</a>\n";
          ?>
        </td>
        <td>
          <form>
          <input type="submit" class=data_delete value="削除">
          <input type="hidden" name="delete_id" value="<?=$row['id']?>">
          </form>
        </td>
      </tr>
      <?php
        }
      ?>
    </table>
  </center>
<?php } ?>



  <!-- データベース削除機能 -->

<script>
  <?php
    require_once('../Models/CRUD.php');
    $ContactDelete = new CRUD();
    $stt = $ContactDelete -> Delete();
  ?>

  $('.data_delete').click(function () {
    var result = window.confirm("削除しますか？");
    if (result === true) {
      // 「OK」をクリックした際の処理を記述
      <?php 
        $stt;
      ?>
    } else {
      return false
    }
  });
</script>