<? include('header.php')?>
    <div class="navbar-nav">
      <a class="nav-item nav-link disabled" href="#">Home</a>
      <a class="nav-item nav-link disabled" href="#">Create</a>
      <a class="nav-item nav-link disabled" href="#">Comment</a>
      <a class="nav-item nav-link active" href="login.php">Login <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link disabled" href="#">Logout</a>
    </div>
<? include('header_end.php')?>
<!--ログイン-->
<form name="form1" action="login_act.php" method="post">
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="text" name="lid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"/>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" name="lpw" class="form-control" id="exampleInputPassword1" placeholder="Password"/>
</div>
<button type="submit" class="btn btn-primary">Login</button>
</form>


<!--新規登録-->
<form name="form2" action="register.php" method="post">
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name"/>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Handle Name</label>
<input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Handle Name"/>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="text" name="lid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"/>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" name="lpw" class="form-control" id="exampleInputPassword1" placeholder="Password"/>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>




</body>
</html>