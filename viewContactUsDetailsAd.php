<?php
  session_start();
  if($_SESSION['sid'])
  {
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Administrator WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    //get fikiran info
    $resultp = $con->query("SELECT * FROM contactusg WHERE CID ='".$_GET['id']."'");
    $rowp = mysqli_fetch_assoc($resultp);
    //close connection
    mysqli_close($con);
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
    <title>Maklumat Lanjut </title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="activity.css" type="text/css">
    <script src="activity.js"></script> 
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
    <div align="center" id="first">
    <pre>***Infomasi Lanjut***</pre>
        <!--Start-->
        <div style="background:aliceblue; border-bottom-left-radius:20px; border-bottom-right-radius: 20px; padding-left:20px">
            <hr>
            <b>Nama</b><br>
            <div class="displayProfile"><?php echo $rowp['Fname']. " " .$rowp['Lname'] ?><br></div>
            <b>ID Pengguna</b><br>
            <div class="displayProfile"><?php echo $rowp['ID']?><br></div>
            <b>Emel</b><br>
            <div class="displayProfile"><?php echo $rowp['Email']?><br></div>
            <b>Nombor Telefon</b><br>
            <div class="displayProfile"><?php echo $rowp['Tel']?><br></div>
            <b>Jenis Persoalan</b><br>
            <div class="displayProfile"><?php echo $rowp['Category']?><br></div>
            <b>Fikiran</b><br>
            <div class="displayProfile"><?php echo $rowp['Fikiran']?><br></div>
            <br>
        </div>
        </div>
        
            
    <p align='center'>
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewContactUsAd.php'">
    </p>
</body>
</html>