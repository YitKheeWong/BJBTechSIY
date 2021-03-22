<?php
  session_start();
  if($_SESSION['sid'])
  {
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $resultAct = $con->query("SELECT * FROM participant WHERE AName='".$_GET['id']."' ORDER BY Fname ASC");
    $resultc = mysqli_query($con, "SELECT Count FROM Aktiviti WHERE Nama = '".$_GET['id']."'");
    $rowc = mysqli_fetch_assoc($resultc);
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
    <title>Senarai Peserta </title>
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
    <p>Jumlah peserta(aktif): <?php echo $rowc['Count'];?></p>
    <table>
        <tr>
            <th>Nama Peserta</th>
            <th>Keadaan Penyertaan</th>
            <th>Aksi</th>
        </tr>
        
        <?php
        if ($resultAct->num_rows >0)
        {
            while($rowAct = $resultAct->fetch_assoc())
            {
                echo "<tr><td>" .$rowAct['Fname']. " " . $rowAct['Lname']. "</td>
            <td>" .$rowAct['status']. "</td>
            <td><a href=\"viewParticipantDetailsPo.php?id=" .$rowAct['ID']. "\">Maklumat Lanjut</a></td></tr>";
            }
        }
        ?>
        
    </table>
            
    <p align='center'>
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewMoreOr.php?id=<?php echo $_GET['id']?>'">
    </p>
    
</body>
</html>