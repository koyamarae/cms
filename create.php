<?session_start();?>

<? include('header.php') ?>
<div class="navbar-nav">
      <a class="nav-item nav-link" href=""><?=$_SESSION["name"]?></a>
      <a class="nav-item nav-link" href="index.php">Home</a>
      <a class="nav-item nav-link  active" href="create.php">Create</a>
      <a class="nav-item nav-link" href="comment.php">Comment</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
</div>
<? include('header_end.php') ?>

<form name="form3" action="create_act.php" method="post" enctype="multipart/form-data">
<form>
    <div class="form-group">
    <input type="hidden" name="name" id="name" value="<?=$_SESSION["name"]?>"><!--著者-->
    <label for="exampleFormControlInput1">New Article</label>
        <div class="card" style="width:device-width; height:10rem;">
        <input type="file" name="img" id="img" accept="image/*" class="form-control-file" id="exampleFormControlFile1"><!--img-->
    </div>
    <input type="text" name="title" id="title" class="form-control" id="exampleFormControlInput1" placeholder="Title"><!--タイトル-->
    <textarea type="text" name="content" id="content" class="form-control" id="exampleFormControlTextarea1" rows="13" placeholder="Text"></textarea><!--本文-->
  </div>
  <button type="submit" class="btn btn-primary">Post</button>
</form>


<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
//jquery読み込み　integrity属性はCDNから取得したファイルが改ざんされていないかブラウザが検証するセキュリティ機能　crossorigin属性は要素が取得するデータに関する CORS リクエストを構成することができる
</script>
<script>
//postボタンクリック
const btn = document.querySlector('button');
btn.addEventListener('Click',event =>{
  var request = $.ajax({
    type:"POST",
    url:"create_act.php",
    datatype:"html",
    data:{
      name: getElementById("name").value,
      img: getElementById("img").value,
      title: getElementById("title").value,
      content: getElementById("content").value
    },
    timeout: 3000
  });
  request.done(function(data){
    getElementById("name").value();
    getElementById("img").value();
    getElementById("title").value();
    getElementById("content").value();
  })
}) 
</script>
-->








<? include('footer.php') ?>