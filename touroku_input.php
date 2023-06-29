<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入力画面</title>
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
              <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">入力画面</a>
              <a href="touroku_read.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">確認画面</a>
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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">入力画面</h1>
    </div>
  </header>

  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
  <form action="touroku_create.php" method="POST">
  <div class="">
      <div>
        名前: <input type="text" name="name" class="w-80 bg-white shadow rounded">
      </div>
      <div>
        TEL: <input type="number" maxlength="7" name="tel" class="w-80 bg-white shadow rounded">
      </div>
      <div>
        性別: <select name="sex" class="w-20 bg-white shadow rounded">
                <option value="man">男性</option>
                <option value="woman">女性</option>
              </select>
      </div>
      <div>
        年齢: <input type="number" maxlength="3" name="age" size="3" class="w-20 bg-white shadow rounded">
      </div>
      <div>
        郵便番号: <input id="input" class="zipcode w-80 bg-white shadow rounded" type="number" maxlength="10" name="postn" class="w-50 bg-white shadow rounded">
        <button id="search" type="button" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">住所検索</button><td id="error"></td>
      </div>
      <div>
        住所: <input id='address1' type="text" name="address" size="30" class="w-80 bg-white shadow rounded">
      </div>
      <div>
        銀行名: <input type="text" name="bank" autocomplete="new-password" list="bankList" class="w-80 bg-white shadow rounded">
        <datalist id="bankList" size="5">
        <?php foreach ($bankNames as $bankName) { ?>
          <option value="<?php echo $bankName; ?>">
        <?php } ?>
        </datalist>銀行
      </div>
      <div>
        銀行コード: <input type="number" maxlength="4" name="bankcode" class="w-80 bg-white shadow rounded">
      </div>
      <div>
        登録日: <input type="date" name="deadline" class="w-80 bg-white shadow rounded">
      </div>
      <!-- <section> -->
        <h1>図</h1>
        <nav>
            <button id="clear_btn" type="button" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">クリアー</button>
            <button id="black-box" type="button" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">黒色ボックス</button>
            <button id="white-box" type="button" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">白色ボックス</button>
        </nav>
        <canvas id="drowarea" width="500" height="500" style="border: 1px solid blue;"></canvas>
      <!-- </section> -->
    <button type="submit" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">登録</button>
    </div>
  </form>
  </div>
  <script>
    const canvas = document.getElementById("drowarea");
    const ctx = canvas.getContext("2d");

    let canvas_mouse_event = false;
    let oldX = 0;
    let oldY = 0;
    let bold_line = 3;
    let color = "#cccccc";

    canvas.addEventListener("mousedown", function (e) {
        oldY = e.offsetY;
        oldX = e.offsetX;
        canvas_mouse_event = true;
    });

    canvas.addEventListener("mousemove", function (e) {
        if (canvas_mouse_event == true) {
            const px = e.offsetX;
            const py = e.offsetY;
            ctx.strokeStyle = color;
            ctx.lineWidth = bold_line;
            ctx.lineJoin = "round";
            ctx.lineCap = "round";
            ctx.beginPath();
            ctx.moveTo(oldX, oldY);
            ctx.lineTo(px, py);
            ctx.stroke();
            oldX = px;
            oldY = py;

            color = document.getElementById('color').value;
            bold_line = document.getElementById('bold').value;
        }
    });

    canvas.addEventListener("mouseup", function () {
        canvas_mouse_event = false;
    });

    canvas.addEventListener("mouseout", function () {
        canvas_mouse_event = false;
    });

    const clearButton = document.getElementById("clear_btn");
    clearButton.addEventListener("click", function () {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    });

    let fabricCanvas = new fabric.Canvas('drowarea');
    let blackBox = null;
    let whiteBox = null;

    const blackBoxButton = document.getElementById("black-box");
    blackBoxButton.addEventListener("click", function () {
        if (blackBox) {
            fabricCanvas.remove(blackBox);
            blackBox = null;
        } else {
            blackBox = new fabric.Rect({
                left: 150, top: 100, width: 120, height: 80, stroke: "black", strokeWidth: 3.0, fill: 'black'
            });
            fabricCanvas.add(blackBox);
        }
    });

    const whiteBoxButton = document.getElementById("white-box");
    whiteBoxButton.addEventListener("click", function () {
        if (whiteBox) {
            fabricCanvas.remove(whiteBox);
            whiteBox = null;
        } else {
            whiteBox = new fabric.Rect({
                left: 80, top: 80, width: 120, height: 80, stroke: "black", strokeWidth: 3.0, fill: 'white'
            });
            fabricCanvas.add(whiteBox);
        }
    });
  </script>
</body>

</html>
