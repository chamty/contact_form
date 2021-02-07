# アプリ名
お問い合わせフォーム

## 開発環境
Windows / MAMP / PHP

## 実装に費やした時間
約15時間

## 実装中に問題となったこと・工夫したところ
・ページ遷移後に白紙で表示される  
　→誤字  
・送信ページへの遷移が不可  
　→input hiddenを記載していなかった  
・データベースに反映されない  
　→INT型のカラムに文字型の値を入れようとしていた（errorInfoでエラー原因を特定）  
・Linuxサーバー構築 ※実装途中  
　→エラーが多発（ubuntuのlocalhostを使用できるところまで完了）  
・メール送信 ※実装途中  
　→エラーが多発  

## 改善点・やりたいこと
　・Linuxサーバー構築  
　・メール送信  
　・Laravel ver.の作成  

## どのような動作テストを行ったか
・正しく画面遷移するか  
・画面遷移先で入力値が表示されるか  
・各項目エラーメッセージが表示されるか  
・正しく入力した際にエラーメッセージが非表示になるか  
・エラーが発生しても入力済みの値は保持されるか  
・修正ボタンで前画面に戻った際に値が保持されるか  
・データベースに保存されるか  

## 主な参考資料または参考サイト
・以前作成したアプリ - https://github.com/chamty/bbs_php  
・PHP+MySQL（MariaDB） Webサーバーサイドプログラミング入門 - https://www.udemy.com/course/php7basic/learn/lecture/18121731  
・Windows10にUbuntu 18.04 LTSをインストールする - https://netwiz.jp/how-to-install-ubuntu-18-04-lts-on-windows10/  
・Ubuntu 18.04にLAMP環境をインストールする - https://qiita.com/yoshiharu-semachi/items/  5f38ce17780ef83b5110  
・PHPでメール送信するための方法 - https://techplay.jp/column/550  


