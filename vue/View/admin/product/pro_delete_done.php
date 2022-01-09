<?php
  try {
    //  DB接続
    $dsn = 'mysql:dbname=pc_shop; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //商品削除
    $sql = 'UPDATE product SET is_deleted=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = 1;
    $data[] = $_POST['id'];
    $stmt->execute($data);

    $dbh = null;

    header('Location: pro_delete_msg.php');
  } catch (\Exception $e) {
    header('Location: pro_error_msg.php');
    exit();
  }

 ?>