<?php 
if (isset($_POST['submit']))
{
    $con=mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database");


    $pid=mysqli_real_escape_string($con, $_REQUEST['id']);
    $pfn=mysqli_real_escape_string($con, $_REQUEST['fname']);
    $pln=mysqli_real_escape_string($con, $_REQUEST['lname']);
    $pem=mysqli_real_escape_string($con, $_REQUEST['email']);
    $pte=mysqli_real_escape_string($con, $_REQUEST['tel']);
    $pad=mysqli_real_escape_string($con, $_REQUEST['address']);
    $ppw=mysqli_real_escape_string($con, $_REQUEST['password']);
    $sql = "INSERT INTO Resident (ID, Fname, Lname, Email, Tel, address, Password) 
    VALUES ('$pid','$pfn','$pln','$pem','$pte','$pad','$ppw')";

    if (mysqli_query($con,$sql))
    {
        echo "<script> alert(\"Pendaftaran berjaya!\") </script>";
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
    <title>Pendaftaran Akaun Penduduk Baru</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="left" align="center"><img class="tit"src="image/BJBlogo1.jfif" alt="Logo BJB" style="width:45px"></div>
    <br><br>
    <h1 align="center">Pendaftaran Akaun Pengduduk</h1>
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
            <div id="second">
                <p>Register sebagai 
                    <a href="registerForm.php">Pengurus Program</a>
                </p>
                <p >Sudah mempunyai akaun?
                    <a href="login.php">Log masuk</a>
                </p>
            </div>
        </form>
    </div>
    <br>

</body>
</html>