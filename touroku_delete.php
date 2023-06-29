<?php
// データ受け取り
$id = $_GET['id'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

// SQL実行
$sql = 'DELETE FROM basic_data1 WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:touroku_read.php");
exit();