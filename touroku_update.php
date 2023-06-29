<?php
include("functions.php");
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


$pdo = connect_to_db();

$sql = 'UPDATE basic_data1 SET name=:name, tel=:tel, sex=:sex, age=:age, postn=:postn, address=:address, bank=:bank, bankcode=:bankcode, deadline=:deadline, updated_at=now() WHERE id=:id';

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
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:touroku_read.php');
exit();

// $sql = 'SELECT * FROM todo_table WHERE id=:id';
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// try {
//   $status = $stmt->execute();
// } catch (PDOException $e) {
//   echo json_encode(["sql error" => "{$e->getMessage()}"]);
//   exit();
// }

// $record = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
</head>

<body>
// 以下HTML部分
<form action="touroku_update.php" method="POST">
<fieldset>
      <legend>編集画面</legend>
      <a href="touroku_read.php">確認画面</a>
      <div>
        名前: <input type="text" name="name" value="<?= $record['name'] ?>">
      </div>
      <div>
        TEL:  <input type="number" name="tel" value="<?= $record['tel'] ?>">
      </div>
      <div>
        性別: <select name="sex" value="<?= $record['sex'] ?>">
                <option value="man">男性</option>
                <option value="woman">女性</option>
              </select>
      </div>
      <div>
        年齢: <input type="number" maxlength="3" name="age" size="3" value="<?= $record['age'] ?>">
      </div>
      <div>
        郵便番号: <input id="input" class="zipcode" type="number" maxlength="10" name="postn"  value="<?= $record['postn'] ?>">
        <button id="search" type="button">住所検索</button><td id="error"></td>
      </div>
      <div>
        住所: <input id='address1' type="text" name="address" size="30"  value="<?= $record['address'] ?>">
      </div>
      <div>
        銀行名: <input type="text" name="bank" autocomplete="new-password" list="bankList" value="<?= $record['bank'] ?>">
        <datalist id="bankList" size="5">
        <?php foreach ($bankNames as $bankName) { ?>
          <option value="<?php echo $bankName; ?>">
        <?php } ?>
        </datalist>銀行
      </div>
      <div>
        銀行コード: <input type="number" maxlength="4" name="bankcode" value="<?= $record['bankcode'] ?>">
      </div>
      <div>
        登録日: <input type="date" name="deadline" value="<?= $record['deadline'] ?>">
      </div>
      <div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
    </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
   let api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';

// 郵便番号から住所自動入力
   $('#search').on('click', function () {
        var input = $('#input');
        var param = input.val().replace("-", ""); //入力された郵便番号から「-」を削除
        let requestUrl = api + param;
        axios
            .get(requestUrl)
            .then(function (response) {
                // リクエスト成功時の処理（responseに結果が入っている）
                // 郵便APIからデータ取得
                console.log(response.data.results);
                const address = response.data.results[0].address1 + response.data.results[0].address2 + response.data.results[0].address3
                // 住所を表示
                $('#address1').val(address);
            })
            .catch(function (error) {
                // リクエスト失敗時の処理（errorにエラー内容が入っている）
                console.log(error);
            })
            .finally(function () {
            });
    });
</script>
</form>


