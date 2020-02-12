<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$img   = $_POST["img"];
$title  = $_POST["title"];
$content = $_POST["content"];

// img 
//var_dump($_FILES["img"]);
if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
  $file_name = $_FILES["img"]["name"];//06.jpg入っている
  $tmp_path = $_FILES["img"]["tmp_name"];//一時保存先のパスを取得

  $extension = pathinfo($file_name, PATHINFO_EXTENSION);//拡張子を取得する
  $file_name = date("YmdHis").md5(session_id()).'.'.$extension;//ユニークな


  // アップロード処理
  $file_dir_path = "upload/".$file_name;
  if ( is_uploaded_file( $tmp_path )){
          if(move_uploaded_file( $tmp_path, $file_dir_path )){
              chmod( $file_dir_path,0644 );
          }else{
              echo "Error: ファイル移動失敗";
            }
      }
}else{
  echo "アップロード失敗";
}


//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(name,title,content,file_dir_path,indate)VALUES(:name,:title,:content,:file_dir_path,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':file_dir_path', $file_dir_path, PDO::PARAM_LOB);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>