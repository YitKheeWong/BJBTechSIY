<?php
session_start();
if($_SESSION['sid'])
{
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM Resident WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  if (isset($_POST['Submit']))
  {
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $e = $_POST['email'];
    $t = $_POST['tel'];
    $ca = $_POST['address'];
    $pw = $_POST['newpw'];
    
    $sql = "UPDATE Resident SET Fname='$fn' ,
    Lname='$ln', Email='$e', Tel='$t', 
    Address='$ca', Password='$pw' 
    WHERE id = '".$_SESSION['sid']."' ";
    if (mysqli_query($con, $sql))
    {
        header("Location:profiler.php");
    }
    else{
        header("Location:profiler.php");
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
    <title>Kemas Kini Profil Penghuni</title>
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
                    <img src="image/Bobs.jpg" alt="Gambar Profil" style="width:50%;height:auto">
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
                
                <label for="address">Alamat Rumah</label><br>
                <textarea name="address" class="r" cols="50" required><?php echo $row['Address'];?> </textarea>
            </fieldset>
            <br>
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