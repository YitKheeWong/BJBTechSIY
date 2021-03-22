<?php
  session_start();
  if($_SESSION['sid'])
  {
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Administrator WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($_POST['submit']))
    {
        $pid=mysqli_real_escape_string($con, $_REQUEST['id']);
        $pfn=mysqli_real_escape_string($con, $_REQUEST['fname']);
        $pln=mysqli_real_escape_string($con, $_REQUEST['lname']);
        $pem=mysqli_real_escape_string($con, $_REQUEST['email']);
        $pte=mysqli_real_escape_string($con, $_REQUEST['tel']);
        $pad=mysqli_real_escape_string($con, $_REQUEST['address']);
        $ppw=mysqli_real_escape_string($con, $_REQUEST['password']);
        $sql = "INSERT INTO Administrator (ID, Fname, Lname, Email, Tel, address, Password) 
        VALUES ('$pid','$pfn','$pln','$pem','$pte','$pad','$ppw')";
        
        if (mysqli_query($con,$sql))
        {
            echo "<script> alert(\"Pendaftaran berjaya!\") </script>";
            #header("Location:login.php");
        }
        else{
            echo "<script> alert(\"Pendaftaran gagal! Sila bercuba sebentar lagi.\") </script>";
        }
        mysqli_close($con);
        }
  }
  else{
    header("Location:index.php");
  }
  
?>
<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akaun Pentadbir Baru</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <!--Navigation Menu-->
    <div class="nv">
    <div class="center-nav">
        <div class="login right">
            <div class="loginImg"><img  src="image/Bobs.jpg" width="60px"></div>
            <div class="loginBlock">
            <button class="noborderbutton"><a href="profileadmin.php?id=<?php echo $row['ID']; ?>"><b>Welcome <?php echo $row['Fname'];?>!</b></a></button>
            </div>
        </div>    

        <div class="right" style="display: inline-block; margin:0 auto;">
            
        <a href="indexra.php"><button class="ddbtn ">Laman Utama</button></a>
        <div class="dropdown ">
            <button class="ddbtn" >Aktiviti</button>
            <div class="smallmenu">
                <a href="viewActAd.php">Senarai Aktiviti</a>
                <a href="viewPastActAd.php">Senarai Aktiviti Lama</a>
                <a href="viewUnapprovedActAd.php">Permohonan Aktiviti</a>
            </div>
        </div>
        <a href="viewContactUsAd.php"><button class="ddbtn ">Rekod Hubungi Kami</button></a>
        <a href="regad.php"><button class="ddbtn ">Tambah Pentadbir Baru</button></a>
        <a href="logout.php"><button class="ddbtn ">Log Keluar</button></a>
        </div>
    
    <a href="indexra.php"><img class="tit " src="image/Layer 0.png" alt="Logo BJB" style="width:65px;padding: 5px 10px 0px;"></a>
    <div class="search-container">
            <div class="searchbox">
                <form name='searchActivity' method='POST' action='searchAd.php'>
                    <input type="text" name="query" class="searchbox_input" placeholder="Cari..." required>
                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>  </div>
    
    <br><br>
    <h1 align="center">Pendaftaran Akaun Admin</h1>
    <p align="center">Sila isikan borang ini untuk mendaftarkan akaun.</p>
                
    <div style="background-image:url('/image/giphy.gif'); background-repeat: no-repeat;background-position: right; background-size: 30%;">
        <form name="registerForm" method="POST" action="<?php $_POST_SELF?>">
            <div id="first" >
                <!--Promter-->
                <pre>***Info Peribadi***</pre>
                <!--Start-->
                <div style="background:aliceblue; border-bottom-left-radius:20px; border-bottom-right-radius: 20px;">
                    <hr>
                    <label for="fname"><b>Nama Pertama</b></label><br>
                    <input class="r" name="fname" type="text"><br>
                    <label for="lname"><b>Nama Akhir</b></label><br>
                    <input class="r" name="lname" type="text"><br>
                    <label for="email"><b>Emel</b></label> <br> 
                    <input required class="r" name="email" autofocus type="email" placeholder="xyz@email.com"> 
                    <br>
                    <label for="tel"><b>Nombor Telefon</b></label><br>
                    <input class="r" name="tel" type="tel"><br>
                    <br>
                    <label for="address"><b>Alamat Rumah</b></label><br>
                    <textarea class="r" name="address" cols="22" rows="3"></textarea><br>
                </div>
                <pre>***Keselamantan Akaun***</pre>
                <div style="background:aliceblue; border-bottom-left-radius:20px; border-bottom-right-radius: 20px;">
                <hr>
                    <label for="id"><b>Akaun ID</b></label><br>
                    <input class="r" name="id" type="text"><br>
                    <label for="password"><b>Kata Laluan</b></label><br>
                    <input required class="r" type="password" name="password">
                    <br>
                    <label for="passwordc"><b>Ulangan Kata Laluan</b></label><br>
                    <input required class="r" type="password" name="passwordc">
                </div>
                <p title="By creating an account, you agree to our Terms& Condition">Dengan pendaftaran akaun ini, anda bersetujui dengan <a href="" target="">Terma & Syarat</a>.</p>
                <input id="submit" type="Submit" value="Daftar" name = "submit">
            </div>
        </form>
    </div>
    <br>

</body>
</html>