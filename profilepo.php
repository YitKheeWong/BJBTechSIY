<?php
session_start();
if($_SESSION['sid'])
{
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
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
    <title>Profil Penganjur Program</title>
    <link rel="stylesheet" href="style.css" type="text/css">
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

    <!--Upperframe-->
    <div>
        <ul class="upperframe">
            <li class="tit"><span class="uppertitle" >Profil Peribadi</span></li>
            <li class="mb"><button id="up"><a href="updateAccPO.php">KemasKini</a></button></li>
        </ul>
    </div>
    <!--start-->
    <div>
        <fieldset class="clearfix">
            <legend><b>Info Peribadi</b></legend>
            <div class="col">
                <img src="image/Jesss.jpg" alt="Gambar Profil" style="width:50%;height:auto">
            </div>
            <div class="col">
                <label for="fname">Nama Pertama: </label><br>
                <div class="displayProfile"><?php echo $row['Fname'];?></div><br>
                <label for="email">E-mel: </label><br>
                <div class="displayProfile"><a href="mailto:<?php echo $row['Email'];?>" style="color:black;text-decoration: none" ><?php echo $row['Email'];?></a></div><br><br> 
            </div>
            <div class="col">
                <label for="lname">Nama Akhir</label><br>
                <div class="displayProfile"><?php echo $row['Lname'];?></div><br>
                <label for="tel">Nombor Telefon</label><br>
                <div class="displayProfile"><?php echo $row['Tel'];?></div><br>
            </div>
        </fieldset>
        <br>
        <fieldset>
            <legend><b>Info Organisasi</b></legend>
            <div class="three">
                <label for="companyName">Nama Organisasi</label><br><br>
                <label for="companyTel">Nombor Pejabat Organisasi</label><br><br>
                <label for="companyAddress">Alamat Pejabat</label>
            </div>
            <div class="seven">
                <div class="displayProfile"><?php echo $row['CompanyName'];?></div><br>
                <div class="displayProfile"><?php echo $row['CompanyTel'];?></div><br>
                <div class="displayProfile"><?php echo $row['CompanyAddress'];?></div><br>
            </div>
        </fieldset>
</body>
</html>