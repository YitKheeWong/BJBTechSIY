<?php
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $an = $_GET['id'];
    $resultAct = mysqli_query($con,"SELECT * FROM Aktiviti WHERE Nama = '$an'");
    $rowAct = mysqli_fetch_array($resultAct);
    $cnt = $rowAct['Count'];
    
    if(isset($_POST['Submit']))
    {
         $cnt++;
         $fn = $_POST['fname'];
         $ln = $_POST['lname'];
         $e = $_POST['email'];
         $t = $_POST['tel'];
         $ic = $_POST['ic'];
         $ad = $_POST['address'];
         $an = $_GET['id'];
         $stat = "active";
         $sql = "INSERT INTO participant (Fname, Lname, Email, Tel, ICNo, Address, AName, status)
         VALUES ('$fn','$ln','$e','$t','$ic','$ad','$an','$stat')";
         $result = mysqli_query($con,$sql);
         if ($result)
         {
             //update table aktivity
             $resultCnt = mysqli_query($con,"UPDATE Aktiviti SET Count = '$cnt' WHERE NAMA = '$an'");
             header("Location:viewMore.php?id=".$an."&msg=Pendaftaran%20Berjaya!");
             mysqli_close($con);
         }
         else
         {
             echo "<script type=\"text/JavaScript\"> alert(\"Pendaftaran Gagal! Sila bercuba sebentar lagi!\")</script>";
         }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Aktiviti</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<!--Navigation Menu-->
<div class="nv">
    <div class="center-nav">

        <div class="login right">
            <div class="loginImg"><img src="image/guest.png" width="45px"></div>
            <div class="loginBlock"><button class="noborderbutton"><a href="login.php"><b>Log Masuk</b></a></button></div>
        </div>  
        
        <div class="right" style="display: inline-block;margin: 0 auto;">
            <a href="contactus.php"><button class="ddbtn right">Hubungi Kami</button></a>
            <a href="aboutus.php"><button class="ddbtn right">Tentang Kami</button></a>
            <div class="dropdown right">
                <button class="ddbtn" >Aktiviti</button>
                <div class="smallmenu">
                    <a href="viewActivity.php">Senarai Aktiviti</a>
                    <a href="viewPastAct.php">Senarai Aktiviti Lama</a>
                </div>
            </div>
            <a href="index.php"><button class="ddbtn right">Laman Utama</button></a>
        </div>
        <div  style="position: relative;display: inline-block;float: left;">
            <a href="index.php">
                <img class="tit" src="image/Layer 0.png" alt="Logo BJB" style="width:65px;padding: 5px 10px 0px;"></a>    
        </div>
        <div class="search-container">
            <div class="searchbox">
                <form name='searchActivity' method='POST' action='search.php'>
                    <input type="text" name="query" class="searchbox_input" placeholder="Cari..." required>
                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>  


        <!--Register Form-->
    <form name="participationForm" method="POST" action="<?php $_PHP_SELF?>" style="background-image:url('/image/wave1.png'); background-repeat: no-repeat; background-position: top; background-size: 100%;">
        <h1 align="center">Borang Penyertaan Aktiviti</h1>
        <p align="center">Sila isikan borang ini untuk menyertai aktiviti.</p>
            
        <div id="first">
            <!--Promter-->
            <!--Start-->
            <div id="fill" style="background:aliceblue; border-bottom-left-radius:20px; border-bottom-right-radius: 20px;">
                <hr>
                <label autofocus for="fname"><b>Nama Pertama</b></label><br>
                <input class="r" name="fname" type="text" autofocus required><br>
                <label for="lname"><b>Nama Akhir</b></label><br>
                <input class="r" name="lname" type="text" required><br>
                <label for="email"><b>E-mel</b></label><br>
                <input class="r" name="email" type="email" required><br>
                <label for="ic"><b>Nombor Kad Pengenalan</b></label><br>
                <input class="r" name="ic" type="number" required><br>
                <label for="tel"><b>Nombor Telefon</b></label><br>
                <input class="r" name="tel" type="tel" required><br>
                <label for="address"><b>Alamat Rumah</b></label><br>
                <textarea class="r" name="address" cols="22" rows="3" required></textarea>
                
                
            </div>
            <p>Dengan mengisi borang ini, anda bersetujui dengan <a href="" target="">Terma & Syarat</a>.</p>
            <input id="submit" name="Submit" type="submit" value="Hantar" onclick="alert('Menghantar Borang?')">
        </div>
        <div id="second">
            <p>Sebarang pertanyaan boleh menghubungi
                <a href="mailto:ykwong1998@graduate.utm.my">Admin</a>.
            </p>
        </div>
    </form>
</body>
</html>