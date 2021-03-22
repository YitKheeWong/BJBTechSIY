<?php 
if (isset($_POST['submit']))
{
    $con=mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database");
    $pid=mysqli_real_escape_string($con, $_REQUEST['id']);
    $pfn=mysqli_real_escape_string($con, $_REQUEST['fname']);
    $pln=mysqli_real_escape_string($con, $_REQUEST['lname']);
    $pem=mysqli_real_escape_string($con, $_REQUEST['email']);
    $pte=mysqli_real_escape_string($con, $_REQUEST['tel']);
    $pcn=mysqli_real_escape_string($con, $_REQUEST['companyName']);
    $pct=mysqli_real_escape_string($con, $_REQUEST['companyTel']);
    $pca=mysqli_real_escape_string($con, $_REQUEST['companyAddress']);
    $ppw=mysqli_real_escape_string($con, $_REQUEST['password']);
    $sql = "INSERT INTO ProgramOrganiser (ID, Fname, Lname, Email, Tel, CompanyName, CompanyTel, CompanyAddress, Password) 
        VALUES ('$pid','$pfn','$pln','$pem','$pte','$pcn','$pct','$pca','$ppw')";

    if (mysqli_query($con,$sql))
    {
        echo "<script> alert(\"Pendaftaran berjaya!\") </script> >";
        header("Location:login.php");
    }
    else{
        echo "<script> alert(\"Pendaftaran gagal! Sila bercuba sebentar lagi.\") </script>";
    }
    mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akaun Penganjur Program Baru</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="left" align="center"><img class="tit"src="image/BJBlogo1.jfif" alt="Logo BJB" style="width:45px"></div>
    <br><br>
    <h1 align="center">Pendaftaran Akaun Penganjur Program</h1>
    <p align="center">Sila isikan borang ini untuk mendaftarkan akaun.</p>
                
    <div style="background-image:url('/image/giphy.gif'); background-repeat: no-repeat;background-position: right; background-size: 30%;">
        <form name="registerForm" method="POST" action="<?php $_PHP_SELF?>">
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
                </div>
                    <pre>***Info Organiser***</pre>
                <div style="background:aliceblue; border-bottom-left-radius:20px; border-bottom-right-radius: 20px;">
                    <hr>
                    <label for="companyName"><b>Nama Organisasi</b></label><br>
                    <input class="r" name="companyName" type="text"><br>
                    <label for="companyTel"><b>Nombor Pejabat Organisasi</b></label><br>
                    <input class="r" name="companyTel" type="tel"><br>
                    <label for="companyAddress"><b>Alamat Pejabat</b></label><br>
                    <textarea class="r" name="companyAddress" cols="22" rows="3"></textarea><br>
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
            <div id="second">
            <p>Register sebagai 
                    <a href="regra.php"> Penghuni</a>
                </p>
                <p title="Already have an account? ">Sudah mempunyai akaun?
                    <a title="Sign in" href="login.php">Log masuk</a>
                </p>
            </div>
        </form>
    </div>
    <br>

</body>
</html>