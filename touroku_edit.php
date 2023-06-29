<?php

// id受け取り
$id = $_GET['id'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM basic_data1 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

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
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="touroku_input.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">入力画面</a>
              <a href="touroku_read.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">確認画面</a>
              <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">編集画面</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>
        </div>
      </div>
    </div>
  </nav>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">編集画面</h1>
    </div>
  </header>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <form action="touroku_update.php" method="POST">
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
          <button id="search" type="button" class="flex-none rounded-md bg-indigo-500 px-3.3 py-2.3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">住所検索</button><td id="error"></td>
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
          <button type=sunmit class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">登録</button>
        </div>
     </form>
    </div>
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
</body>

</html>