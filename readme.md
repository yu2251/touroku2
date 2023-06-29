# プロダクトのタイトル
  個人情報登録フォーム（お絵描き機能付き）

# 概要（どんなものか，どうやって使うか，など）
  名前、電話番号、住所等を入力し登録でき、削除から編集までできます。
  
# 工夫した点，こだわった点
  ・講義で紹介されていたtailwindcssを使用してデザインの面を
    少し改善させました。
  ・お絵描き機能を入れたかったのでJavaScriptライブラリのFabric.jsを使用しました。
    ボタンを押すことで、２種類の図を挿入でき、削除もできます。
    canvas内で自由に図の大きさ向き位置も変更できます。
  ・またXAMPPにエラーが出て機能しなくなるかもと想定してその都度
    バックアップをとって万が一に備えました。
    （案の定、課題提出日にXAMPPが機能しなくなりましたが、
      納期通り提出できそうです）

# 苦戦した点，もう少し実装したかった点
  ・canvasでお絵描きした画像のデータも保存させ、他のデータと同様、
    保存した絵の状態から編集できるようにしたかったです。
    上手く図形の形、canvas内での位置情報を取得できませんでした。

# 参考URL
  ・tailwindcss
  https://tailwindcss.com/
  ・Fabric.js の使い方メモ
  https://zenn.dev/megeton/articles/aaad434c8533b6
  ・Error: MySQL shutdown unexpectedlyの解決方法
	https://office54.net/iot/app/xampp-mysql-error
　・XAMPP終了時に、「Exception EAccessViolation in module xampp-control.exe at 0025B2AE.」とエラーが表示された時の対策（備忘録）
	https://jet-blog.com/xampp_error_0025b2ae/




