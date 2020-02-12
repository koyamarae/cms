<? session_start(); ?>
<? include('header.php') ?>
    <div class="navbar-nav">
      <a class="nav-item nav-link" href=""><?=$_SESSION["name"]?></a>
      <a class="nav-item nav-link" href="index.php">Home</a>
      <a class="nav-item nav-link" href="create.php">Create</a>
      <a class="nav-item nav-link active" href="comment.php">Comment</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
<? include('header_end.php') ?>




<? include('footer.php') ?>