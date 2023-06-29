<?php
include('functions.php');
$pdo = connect_to_db();


if (
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['tel']) || $_POST['tel'] === ''||
  !isset($_POST['sex']) || $_POST['sex'] === '' ||
  !isset($_POST['age']) || $_POST['age'] === '' ||
  !isset($_POST['postn']) || $_POST['postn'] === '' ||
  !isset($_POST['address']) || $_POST['address'] === '' ||
  !isset($_POST['bank']) || $_POST['bank'] === '' ||
  !isset($_POST['bankcode']) || $_POST['bankcode'] === '' ||
  !isset($_POST['deadline']) || $_POST['deadline'] === ''
) {
  exit('paramError');
}

$name = $_POST['name'];
$tel = $_POST['tel'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$postn = $_POST['postn'];
$address = $_POST['address'];
$bank = $_POST['bank'];
$bankcode = $_POST['bankcode'];
$deadline = $_POST['deadline'];

$sql = 'INSERT INTO basic_data1(id, name, tel, sex, age, postn, address, bank, bankcode, deadline) VALUES (NULL, :name, :tel, :sex, :age, :postn, :address, :bank, :bankcode, :deadline); ALTER TABLE `basic_data1` MODIFY COLUMN bankcode DECIMAL(4,0) ZEROFILL;';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':postn', $postn, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':bank', $bank, PDO::PARAM_STR);
$stmt->bindValue(':bankcode', $bankcode, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:touroku_input.php");
exit();
