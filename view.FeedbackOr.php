<?php
session_start();
if($_SESSION['sid'])
{
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $poid=$_SESSION['sid'];
    /*$resultn = mysqli_query($conn,"SELECT * FROM Aktiviti WHERE  ID='$poid'" );*/
    $resultAct = mysqli_query($con,"SELECT * FROM Aktiviti WHERE ID = '".$_SESSION['sid']."' ");
    $resultFB=mysqli_query($con,"SELECT * FROM Feedback WHERE akname='".$_GET['id']."' ");
    //$rowFB=mysqli_fetch_array($resultFB);
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
    <title>Senarai Maklum Balas</title>
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
            <!--js or show the name-->
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

    
    <!--The activity list-->
    <br><br>
    <br><br>
    <table>
        <tr>
            <th>Nama Aktiviti</th>
            <th>Nama Peserta</th>
            <th>Tahap Kepuasan hati</th>
            <th>Aksi</th>
        </tr>

    <?php
    $i=0;
    while($rowFB= mysqli_fetch_array($resultFB)) {
    if($i%2==0)
    $classname="even";
    else
    $classname="odd";   
    ?>
    

    <tr class="<?php if(isset($classname)) echo $classname;?>">
    <td><?php echo $rowFB["akname"]; ?></td>
    <td><?php echo $rowFB["nama"]; ?></td>
    <td><?php echo $rowFB["Lokasi"]; ?></td>
    <td class="center"><a href="view-MoreFeedOr.php?id=<?php echo $rowFB["ID"]; ?>">Semak Maklum Balas</a></td>    
    
    </tr>
    <?php
    $i++;
    }
    ?>

    </table>
    <br><br>
    <p align='center'>
       
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewPastActOr.php'">
    </p>
    
</body>
</html>