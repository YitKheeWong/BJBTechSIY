<?php
  session_start();
  if($_SESSION['sid'])
  {
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $resultAct = $con->query("SELECT * FROM participant WHERE ID='".$_GET['id']."'");
    $rowp = mysqli_fetch_assoc($resultAct);
    $an = $rowp['AName'];
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
    <title>Maklumat Lanjut</title>
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
            <div class="loginImg"><img  src="image/Jesss.jpg" width="60px"></div>
            <div class="loginBlock"><button class="noborderbutton"><a href="profilepo.php?id=<?php echo $row['ID']; ?>"><b>Welcome <?php echo $row['Fname'];?>!</b></a></button></div>
        </div>    
    
            <div class="right" style="display: inline-block; margin:0 auto;">
                
                <a href="indexpo.php"><button class="ddbtn">Laman Utama</button></a>
                <div class="dropdown">
                    <button class="ddbtn" >Aktiviti</button>
                    <div class="smallmenu">
                      <a href="viewActOr.php">Senarai Aktiviti</a>
                      <a href="viewPastActOr.php">Senarai Aktiviti Lama</a>
                    </div>
                </div>
                <a href="aboutuspo.php"><button class="ddbtn ">Tentang Kami</button></a>
                <a href="contactuspo.php"><button class="ddbtn ">Hubungi Kami</button></a>
                <a href="logout.php"><button class="ddbtn ">Log Keluar</button></a>
            </div>
        
        <a href="indexpo.php"><img class="tit " src="image/Layer 0.png" alt="Logo BJB" style="width:65px;padding: 5px 10px 0px;"></a>
        <div class="search-container">
            <div class="searchbox">
                <form name='searchActivity' method='POST' action='searchpo.php'>
                    <input type="text" name="query" class="searchbox_input" placeholder="Cari..." required>
                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div> </div>


    <br><br>
    <div align="center" id="first">
    <pre>***Info Peribadi***</pre>
        <!--Start-->
        <div style="background:aliceblue; border-bottom-left-radius:20px; border-bottom-right-radius: 20px; padding-left:20px">
            <hr>
            Nama Peserta<br>
            <div class="displayProfile"><?php echo $rowp['Fname']. " " .$rowp['Lname'] ?><br></div>
            Emel<br>
            <div class="displayProfile"><?php echo $rowp['Email']?><br></div>
            Nombor Kad Pengenalan<br>
            <div class="displayProfile"><?php echo $rowp['ICNo']?><br></div>
            Nombor Telefon<br>
            <div class="displayProfile"><?php echo $rowp['Tel']?><br></div>
            Alamat Rumah<br>
            <div class="displayProfile"><?php echo $rowp['Address']?><br></div>
            Keadaan Penyertaan<br>
            <div class="displayProfile"><?php echo $rowp['status']?><br></div>
            <br>
        </div>
        </div>
            
    <p align='center'>
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewPastActOr.php?id=<?php echo $_GET['id']?>'">
    </p>
    
</body>
</html>