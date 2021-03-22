<?php
//Open connection
$conn= mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die ("could not connect to mysql");
$result = mysqli_query($conn,"SELECT * FROM Aktiviti WHERE Nama='".$_GET['id']."'");
$row=mysqli_fetch_array($result);
mysqli_close($conn);
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
    
    <!--The view activity-->
    <p class='right'>Aktiviti->Maklumat lanjut aktiviti</p><br><br>

    <br><br>
    <div class='row'>
        <div class='column'>
        Nama Aktiviti : <?php echo $row['Nama'] ?> <br><br>

        Aktiviti : <?php echo $row['Peserta'] ?>

        <br><br>
            
        Implementasi Aktiviti : <?php echo $row['Implementasi'] ?>

        <br><br>

        <?php
        if ($row['Implementasi']=='Terhad') {
            echo "Max peserta : ".$row['Bilangan'];
        }?>
       
        </div>

        <div class='column'>
            Lokasi : <?php echo $row['Lokasi'] ?><br><br>

        Negeri : <?php echo $row['Negeri'] ?>

        <br><br>
    
        Postcode : <?php echo $row['Postcode'] ?>
        <br><br>
        
        Penganjur : <?php echo $row['Penganjur'] ?>
        
        </div>

        <?php 
        $timeStart=date('h:i A', strtotime($row["masaPermulaan"]));
        $timeEnd=date('h:i A', strtotime($row["masaTamat"]));
        ?>

        <div class='column'>
            Tarikh permulaan : <?php echo $row['tarikhPermulaan'] ?> <br><br>

            Tarikh tamat : <?php echo $row['tarikhTamat'] ?> <br><br>
        
            Masa permulaan : <?php echo $timeStart ?> <br><br>
        
            Masa tamat : <?php echo $timeEnd ?> <br><br>
        
        </div>

    </div>
            
        <p align='center'><input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewPastAct.php'"></p>
        
        
        </form>
    
</body>
</html>