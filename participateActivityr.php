<?php
session_start();
if($_SESSION['sid'])
{
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM Resident WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  
    $an = $_GET['id'];
  //update cnt
    $resultAct = mysqli_query($con,"SELECT * FROM Aktiviti WHERE Nama = '$an'");
    $rowAct = mysqli_fetch_array($resultAct);
    $cnt = $rowAct['Count'];
    $cnt++;
    
  if(isset($_POST['Submit']))
    {
         $fn = $_POST['fname'];
         $ln = $_POST['lname'];
         $e = $_POST['email'];
         $t = $_POST['tel'];
         $ic = $_POST['ic'];
         $ad = $_POST['address'];
         $stat = "active";
         $sql = "INSERT INTO participant (Fname, Lname, Email, Tel, ICNo, Address, AName, status)
         VALUES ('$fn','$ln','$e','$t','$ic','$ad','$an','$stat')";
         $resultIn = mysqli_query($con,$sql);
         if ($resultIn)
         {
             //update table aktivity
             $resultCnt = mysqli_query($con,"UPDATE Aktiviti SET Count = '$cnt' WHERE NAMA = '$an'");
             header("Location:viewMorer.php?id=".$an."&msg=Pendaftaran%20Berjaya!");
             mysqli_close($con);
         }
         else
         {
             echo "<script type=\"text/JavaScript\"> alert(\"Pendaftaran Gagal! Sila bercuba sebentar lagi!\")</script>";
         }
        
    }
}
else{
  header("Location:index.php");
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
            <div class="loginImg"><img  src="image/Bobs.jpg" width="60px"></div>
            <div class="loginBlock">
            <button class="noborderbutton"><a href="profiler.php?id=<?php echo $row['ID']; ?>"><b>Welcome <?php echo $row['Fname'];?>!</b></a></button>
            </div>
            <!--js or show the name-->
        </div>  
        
            <div class="right" style="display: inline-block; margin:0 auto;">
                
                <a href="indexr.php"><button class="ddbtn ">Laman Utama</button></a>
                <div class="dropdown ">
                    <button class="ddbtn" >Aktiviti</button>
                    <div class="smallmenu">
                        <a href="viewActivityr.php">Senarai Aktiviti</a>
                        <a href="viewPastActr.php">Senarai Aktiviti Lama</a>
                    </div>
                </div>
                <a href="aboutusr.php"><button class="ddbtn ">Tentang Kami</button></a>
                <a href="contactusr.php"><button class="ddbtn ">Hubungi Kami</button></a>
                <a href="logout.php"><button class="ddbtn ">Log Keluar</button></a>
            </div>
        
        <a href="indexr.php"><img class="tit " src="image/Layer 0.png" alt="Logo BJB" style="width:65px;padding: 5px 10px 0px;"></a>
        <div class="search-container">
            <div class="searchbox">
                <form name='searchActivity' method='POST' action='searchr.php'>
                    <input type="text" name="query" class="searchbox_input" placeholder="Cari..." required>
                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div> </div>
    
    
        <!--Register Form-->
    <form name="participationForm" method="POST" action="<?php $_PHP_SELF?>">
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