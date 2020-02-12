<?php


//POST値
$name = $_POST["name"];
$author = $_POST["author"];
$lid = $_POST["lid"];
$lpw = password_hash($_POST["lpw"], PASSWORD_DEFAULT);

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(name,author,lid,lpw)VALUES(:name,:author,:lid,:lpw)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
  }else{
    redirect("login.php");
  }
?>