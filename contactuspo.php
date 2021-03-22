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
        $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb")or die("Connection error");
        $id = $_SESSION['sid'];
        $f = $_POST['contents'];
        $fn = $row['Fname'];
        $ln = $row['Lname'];
        $em = $row['Email'];
        $te = $row['Tel'];
        $c = $_POST['category'];
        $sql = "INSERT INTO contactusg (Fname, Lname, Email, Tel, ID, Category,  Fikiran) 
        VALUES ('$fn','$ln','$em','$te','$id','$c', '$f') ";
        if (mysqli_query($con,$sql))
        {
            echo "<script type=\"text/JavaScript\"> alert(\"Fikiran anda telah berjaya direkod!\") </script>";
        }
        else{
            echo "<script type=\"text/JavaScript\"> alert(\"Proses penghantaran terganggu!\n Sila cuba sebentar lagi!\") </script>";
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
    <title>Hubungi Kami</title>
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

        <form name="contactme" method="POST" action="<?php $_PHP_SELF ?>">
            <div id="first" >
                <!--Promter-->
                <h1>Hubungi Kami</h1>
                <p><small>Hantar <a href="mailto:yitkhee1701@yahoo.com?Subject=BJB%20Hubungi%20Kami">emel</a>  kepada kami<br>
                    <i>atau</i><br>
                    Sila isikan borang ini untuk berkongsi fikiran anda dengan kami.</small></p>
                <hr>
                <!--Start-->
                <div id="fill">
                    <label for="fname"><b>First Name</b></label> <br> 
                    <input required class="r" name="fname" autofocus type="text" required value="<?php echo $row['Fname'];?>"> 
                    <br>
                    <label for="lname"><b>Last Name</b></label> <br> 
                    <input required class="r" name="lname" type="text" required  value="<?php echo $row['Lname'];?>"> 
                    <br>
                    <label for="email"><b>Emel</b></label> <br> 
                    <input required class="r" name="email" type="email"  value="<?php echo $row['Email'];?>" required> 
                    <br>
                    <label for="tel"><b>Nombor Telefon</b></label><br>
                    <input required class="r" type="tel" name="tel"  value="<?php echo $row['Tel'];?>" pattern="[0-9]{3}-[0-9]{7/8}" required>
                    <br>
                    <label for="category"><b>Jenis Persoalan</b></label>
                    <br>
                    <select class="r" name="category" required>
                        <option value="Perkhidmatan">Perkhidmatan</option>
                        <option value="Sistem">Sistem</option>
                        <option value="Umum">Umum</option>
                    </select>
                    <br>
                    <label for="contents"><b>Konten</b></label><br>
                    <textarea required class="r" name="contents" cols="40" rows="3" placeholder="Fikiran anda...."></textarea>

                </div>
                <p><small>Dengan penghantaran borang ini, anda bersetujui dengan <a href="" target="">Terma & Syarat</a>.</small></p>
                <input id="submit" type="Submit" name="Submit" value="Hantar" onclick="alert('Menghantar Borang?')">
            </div>
            
        </form>
    </div>
</body>
</html>