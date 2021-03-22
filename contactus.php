<?php
    if (isset($_POST['Submit']))
    {
        $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Connection error");
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $e = $_POST['email'];
        $t = $_POST['tel'];
        $c = $_POST['category'];
        $f = $_POST['contents'];
        $i = "-";
        $sql = "INSERT INTO contactusg (Fname, Lname, Tel, Email, ID, Category, Fikiran) VALUES ('$fn','$ln','$t','$e','$i','$c','$f') ";
        if (mysqli_query($con,$sql))
        {
            echo "<script type=\"text/JavaScript\"> alert(\"Fikiran anda telah berjaya direkod!\") </script>";
        }
        else{
            echo "<script type=\"text/JavaScript\"> alert(\"Proses penghantaran terganggu!\n Sila cuba sebentar lagi!\") </script>";
        }
        mysqli_close($con);
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
<body >
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
                    <input class="r" name="fname" autofocus type="text" required> 
                    <br>
                    <label for="lname"><b>Last Name</b></label> <br> 
                    <input class="r" name="lname" type="text" required> 
                    <br>
                    <label for="email"><b>Emel</b></label> <br> 
                    <input class="r" name="email" type="email" placeholder="xyz@email.com" required> 
                    <br>
                    <label for="tel"><b>Nombor Telefon</b></label><br>
                    <input class="r" type="tel" name="tel" placeholder="012-3456789" pattern="[0-9]{3}-[0-9]{7/8}" required>
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
                <input name="Submit" id="submit" type="Submit" value="Hantar" onclick="alert('Menghantar Borang?')">
            </div>
            
        </form>
    </div>
</body>
</html>