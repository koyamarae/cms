<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
echo $lid;
echo $lpw;
//echo $lid;

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
//$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //* Hash化する場合はコメントする
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
//* if(password_verify($lpw, $val["lpw"])){
if( password_verify($lpw, $val["lpw"]) ){ //第一引数はユーザーが入力した値、第二引数はハッシュ化されたDBの値 //ハッシュ化したら管理者にも変えられない。
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["author"]      = $val['author'];
  header("Location: index.php");
}else{
  //Login失敗時(Logout経由)
  header("Location: login.php");
}

exit();
