<?php
	
	ob_start();
	session_start();

	$koneksi = new mysqli ("localhost","root","","db_perpustakaan");

if (isset($_SESSION['NIS'])) {

		header("location:user.php");

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
    background-size : 700px 700px;
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
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Masukkan NIS dan Password </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  >
                                            	
                                            </i></span>
                                            <input type="text" name="NIS" class="form-control" 
                                            placeholder="Your NIS " />
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="pass" class="form-control" 
                                             placeholder="Your Password" />
                                        </div>
                                   
                                     <input type="submit" name="login" value="Login" class="btn btn-primary ">
                                     
                                    
                            </div>
                           
                        </div>
                    </div>
                
                
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

	if (isset($_POST['login'])) {

		$NIS = $_POST['NIS'];
		$pass = $_POST['pass'];

		$sql = $koneksi-> query("select * from tb_anggota where NIS='$NIS' and password='$pass' ");

		$data = $sql-> fetch_assoc();

		$ketemu = $sql->num_rows;

		if ($ketemu >=1) {

			session_start();

			if (	$_SESSION['NIS'] = $data['NIS']) {

		
				header("location:user.php");

      }
    } else {

			?>

			 	<script type="text/javascript">
			 		alert("Login Gagal Password dan NIS Salah")
			 	</script>
			<?php
      }
		}
	}	

?>

