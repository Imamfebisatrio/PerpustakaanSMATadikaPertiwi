<?php
	
	ob_start();
	session_start();

	$koneksi = new mysqli ("localhost","root","","db_perpustakaan");

if (isset($_SESSION['admin'])||isset($_SESSION['user'])) {

		header("location:index.php");

	}else{

?>
		
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 <style type="text/css">
   body {
    background-image: url('assets/img/Logosekolah.png');
    background-size : 300px 300px;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center
   }
   h2 {
    color: #000
   }
 </style>

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>Perpustakaan SMA Tadika Pertiwi</h2>
               
              
                 <br />
            </div>
        </div>
        <div class="row text-center">
            <a href="login_user.php" class="btn btn-primary">User</a>
            <a href="login_admin.php" class="btn btn-primary">Admin</a>
        
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>



<?php
	}	

?>

