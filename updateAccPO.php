<?php
session_start();
if($_SESSION['sid'])
{
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  if (isset($_POST['Submit']))
  {
      $fn = $_POST['fname'];
      $ln = $_POST['lname'];
      $e = $_POST['email'];
      $t = $_POST['tel'];
      $cn = $_POST['companyName'];
      $ct = $_POST['companyTel'];
      $ca = $_POST['companyAddress'];
      $pw = $_POST['newpw'];
      
      $sql = "UPDATE ProgramOrganiser SET Fname='$fn' ,
      Lname='$ln', Email='$e', Tel='$t', CompanyName='$cn', 
      CompanyTel='$ct', CompanyAddress='$ca', Password='$pw' WHERE id = '".$_SESSION['sid']."' ";
      if (mysqli_query($con, $sql))
      {
            header("Location:profilepo.php");
      }
      else{
            header("Location:profilepo.php");
      }
  }
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
    <title>Kemas Kini Profil Pengajur Program</title>
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

     <!--UpdateForm-->
    <form name="UpdateAcc" method="POST" action="<?php $_PHP_SELF?>">
    <!--Upperframe-->
    <div>
        <ul class="upperframe">
            <li class="tit"><span class="uppertitle" >Profil Peribadi</span></li>
            <li class="mb"><input id="up" type="submit" value="Simpan" name="Submit" onclick="alert('Kemas kini?')"></li>
        </ul>
    </div>

    <div>
        <fieldset class="clearfix">
            <legend><b>Info Peribadi</b></legend>
            <div class="col">
                <img src="image/Jesss.jpg" alt="Gambar Profil" style="width:50%;height:auto">
                <br>
                <input type="file" id="file" name="profilepic" >
            </div>
            <div class="col">
                <label for="fname">Nama Pertama</label><br>
                <input class="r" name="fname" type="text" value="<?php echo $row['Fname'];?>" required><br><br>
                <label for="email">E-mel</label><br>
                <input class="r" name="email" type="email" value="<?php echo $row['Email'];?>" required><br><br> 
            </div>
            <div class="col">
                <label for="lname">Nama Akhir</label><br>
                <input class="r" name="lname" type="text" value="<?php echo $row['Lname'];?>" required><br><br>
                <label for="tel">Nombor Telefon</label><br>
                <input class="r" name="tel" type="tel" value="<?php echo $row['Tel'];?>" required><br><br>
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
                <input class="r" name="companyName" type="text" value="<?php echo $row['CompanyName'];?>" required><br>
                <input class="r" name="companyTel" type="tel" value="<?php echo $row['CompanyTel'];?>" required><br>
                <textarea class="r" name="companyAddress" cols="22" rows="3" required><?php echo $row['CompanyAddress'];?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend><b>Kata Laluan</b></legend>
            <div class="three">
                <div style="margin-bottom: 5px;"><label for="oldpw" >Kata Laluan Lama</label><br></div>
                <div style="margin-bottom: 5px;"><label for="newpw">Kata Laluan Baru</label><br></div>
                <div style="margin-bottom: 5px;"><label for="rpw">Ulangan Kata Laluan Baru</label><br></div>  
            </div>
            <div class="seven">
                <input class="r" name="oldpw" type="password" style="margin:0;"><br>
                <input class="r" name="newpw" type="password" style="margin:0;"><br>
                <input class="r" name="rpw" type="password" style="margin:0;">
            </div>
        </fieldset>
    </div>
    </form>
</body>
</html>