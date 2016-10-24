<?php  
error_reporting(0);
session_start();
include_once'class/koperasi_class.php';
// instance objek db dan user
$user = new User();
$db = new Database();
// koneksi ke MySQL via method
$db->connectMySQL();
// cek apakah user login atau tidak via method
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $login=$user->cek_login($_POST['user_id'], $_POST['password']);
  if($login) {
     // login sukses, arahkan ke file index.php
    header("location:page.php");
  }
  else {
  // login gagal, beri peringatan dan kembali ke file index.php
 header("location:login.php?r=error");

  }
}
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KOPERASI PINJAMAN</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/source-sans-pro/source-sans-pro.css" rel="stylesheet" type="text/css" />
  <link href="bootstrap/css/custom.css" rel="stylesheet" type="text/css" />
    <script src="bootstrap/js/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
  	<link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css" />  
	<script src="jquery/jquery-ui.js"></script>
 	<link href="images/icon.png" rel="shortcut icon" />
</head>


<body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><font class="logo2">KOPERASI PINJMAN</font></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      
      </div>
    </div>
      <!--BODY
      !-->
    
    <div class="container-fluid">
      <br>
<br>
<p>
  <h3></h3>
<?php if($_GET['r']=='error') { echo'
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span class="glyphicon glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong>&nbsp;Warning&nbsp;</strong>User atau password salah !
</div>'
; } ?>

 <form role="form" action="?op=in" method="post" class="form-horizontal col-md-3">
  <div class="form-group">
    <label for="email">USER ID</label>
    <input type="text" name="user_id" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="pwd">PASSWORD</label>
    <input type="password" class="form-control" name="password" required><br>
    <button type="submit" class="btn btn-info">Masuk</button>
  </div>
  
</form>

  </div>

      <footer>
      <div class="container-fluid">
        <hr>
        <small>Copyright &copy;hendrimamang@gmail.com <?php echo date('Y'); ?></small>
      </footer>
      <hr>
  
    </div>


</body>
</html>
