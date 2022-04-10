<?php
  require_once('../Controllers/ContactController.php');
  $ContactRead = new ContactController();
  $ContactDatas = $ContactRead -> DataDisplay();
?>

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
      foreach ($ContactDatas as $row) {
    ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['kana'] ?></td>
      <td><?php echo $row['tel'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['body'] ?></td>
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





  <!-- データベース削除機能 -->

<script>
  <?php
    require_once('../Controllers/ContactController.php');
    $ContactDelete = new ContactController();
    $DataDelete = $ContactDelete -> DataDisplayDelete();
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