<?php
session_start();
if($_SESSION['sid'])
{
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    
    $resultAct = mysqli_query($con,"SELECT * FROM Aktiviti WHERE Nama='".$_GET['id']."'");
    $rowAct=mysqli_fetch_array($resultAct);
    if (isset($_GET['msg']))
    {
        echo "<script> alert(\"" .$_GET['msg']. "\") </script> ";
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
    <title>Cari</title>
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

    
    <!--The view activity-->
    <p class='right'>Aktiviti->Maklumat lanjut aktiviti</p><br><br>

    <br><br>
    <div class='row'>
        <div class='column'>
        Nama Aktiviti : <?php echo $rowAct['Nama'] ?> <br><br>

        Aktiviti : <?php echo $rowAct['Peserta'] ?>

        <br><br>
            
        Implementasi Aktiviti : <?php echo $rowAct['Implementasi'] ?>

        <br><br>

        <?php
        if ($rowAct['Implementasi']=='Terhad') {
            echo "Max peserta : ".$rowAct['Bilangan'];
        }?>
       
        </div>

        <div class='column'>
        Lokasi : <?php echo $rowAct['Lokasi'] ?><br><br>

        Negeri : <?php echo $rowAct['Negeri'] ?>

        <br><br>
    
        Postcode : <?php echo $rowAct['Postcode'] ?>
        <br><br>
        
        Penganjur : <?php echo $rowAct['Penganjur'] ?>
        
        </div>

        <?php 
        $timeStart=date('h:i A', strtotime($rowAct["masaPermulaan"]));
        $timeEnd=date('h:i A', strtotime($rowAct["masaTamat"]));
        ?>

        <div class='column'>
            Tarikh permulaan : <?php echo $rowAct['tarikhPermulaan'] ?> <br><br>

            Tarikh tamat : <?php echo $rowAct['tarikhTamat'] ?> <br><br>
        
            Masa permulaan : <?php echo $timeStart ?> <br><br>
        
            Masa tamat : <?php echo $timeEnd ?> <br><br>
        
        </div>

    </div>
            
    <p align='center'>
    <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='searchpo.php?page=<?php echo $_GET["page"]; ?>&query=<?php echo $_GET["query"]; ?>'"></p>
    </p>
    
</body>
</html>