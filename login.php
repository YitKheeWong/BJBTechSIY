<?php
    session_start();
    if (isset($msg))
    {
        echo $msg;
    }
    //if submit
    if (isset($_POST['submit']))
    {
        $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb")or die("Connection error");
        if( $_POST['role']=="admin")
        {
            $dbname = "Administrator";
        }
        if ( $_POST['role']=="po")
        {
            $dbname = "ProgramOrganiser";
        }
        if ($_POST['role']=="resident")
        {
            $dbname = "Resident";
        }
        if($_POST['role']=="none"){
            echo "<script> 
            alert('Sila pilih peranan anda')
            window.location.href = 'login.php'
            </script> ";
        }
        $sql = "SELECT * FROM $dbname WHERE ID = '".$_POST['id']."' AND PASSWORD = '".$_POST['password']."'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if (is_array($row))
        {
            $_SESSION['sid'] = $_POST['id'];
            $_SESSION['spw'] = $_POST['password'];
            $_SESSION['srole'] = $dbname;
        }
        else{
            $message = "Invalid username or password!";
        }
        if (isset($_SESSION['sid']))
        {
            if( $_POST['role']=="admin")
            {
                header("Location:indexra.php");
            }
            if ( $_POST['role']=="po")
            {
                header("Location:indexpo.php");
            }
            if ($_POST['role']=="resident")
            {
                header("Location:indexr.php");
            }
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BJB Log Masuk</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" id="rotateimg180" src="image/wave.svg">
	<div class="container">
		<div class="img">
			<img src="image/BJBlogo.jpg">
		</div>
		<div class="login-content">
            <form name="ResidentNAdminLoginForm" method="POST" action="<?php $_PHP_SELF?>">
                <div class="phpmsg"><?php if (isset($msg)){ echo $mgs;}?></div>
				<img src="image/proPic.svg">
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-angle-double-right"></i>
					</div>
					<div class="div">
						<select name="role" required>
                        <option value="none" selected>Sila pilih peranan anda</option>
						<option value="admin">Pentadbir</option>
                        <option value="po">Penganjur Program</option>
                        <option value="resident">Penduduk</option>
					</select>
					</div>
				</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>ID</h5>
           		   		<input type="text" name="id" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Kata Laluan</h5>
           		    	<input type="password" name="password" class="input" required>
            	   </div>
            	</div>
				<input type="Submit" name="submit" class="btn" value="Log Masuk">
				<p>
					Tiada akaun? Daftar di <a href="registerForm.php">sini</a>
					<pre>Atau</pre>
					Log masuk sebagai <a href="index.php">Pelawat</a>!
				</p>
			</form>
        </div>
    </div>
    <script type="text/javascript" src="login.js"></script>
</body>
</html>