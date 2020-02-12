<?php
session_start();
include("funcs.php");
logincheck();
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table ORDER BY indate DESC ");//日付昇順
$status = $stmt->execute();
//jsonに格納
//$json[]=$status;


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){//全件繰り返しにより、見た目は降順(新着順)に並ぶ
      $view .= '<div class="card" style="width:device-width;">
            <td><img src="'.$result["file_dir_path"].'" class="card-img-top" alt="..."></td>
              <div class="card-body">
                <h5 class="card-title"><td>'.$result["title"].'</td></h5>
                <h6>'.$result["indate"].'</h6>
                <h6>'.$result["name"].'</h6>
                <p><td>'.$result["content"].'</td></p>
                <a href="#" class="btn btn-primary">more</a>
              </div>
            </div>';
    }
  }
?>





<? include('header.php')?>
    <div class="navbar-nav"> 
      <a class="nav-item nav-link" href=""><?=$_SESSION["name"]?></a>
      <a class="nav-item nav-link  active" href="index.php">Home</a>
      <a class="nav-item nav-link" href="create.php">Create</a>
      <a class="nav-item nav-link" href="comment.php">Comment</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
<? include('header_end.php')?>
<!--子記事-->
<?=$view;?>
<? include('footer.php')?>