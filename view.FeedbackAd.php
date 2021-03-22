<?php
session_start();
if($_SESSION['sid'])
{
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Administrator WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $resultFB=mysqli_query($con,"SELECT * FROM Feedback WHERE akname='".$_GET['id']."' ORDER BY ID ASC");
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
            <div class="loginImg"><img  src="image/Bobs.jpg" width="60px"></div>
            <div class="loginBlock">
            <button class="noborderbutton"><a href="profileadmin.php?id=<?php echo $row['ID']; ?>"><b>Welcome <?php echo $row['Fname'];?>!</b></a></button>
            </div>
            <!--js or show the name-->
        </div>    

        <div class="right" style="display: inline-block; margin:0 auto;">
            
        <a href="indexra.php"><button class="ddbtn ">Laman Utama</button></a>
        <div class="dropdown ">
            <button class="ddbtn" >Aktiviti</button>
            <div class="smallmenu">
                <a href="viewActAd.php">Senarai Aktiviti</a>
                <a href="viewPastActAd.php">Senarai Aktiviti Lama</a>
                <a href="viewUnapprovedActAd.php">Permohonan Aktiviti</a>
            </div>
        </div>
        <a href="viewContactUsAd.php"><button class="ddbtn ">Rekod Hubungi Kami</button></a>
        <a href="regad.php"><button class="ddbtn ">Tambah Admin Baru</button></a>
        <a href="logout.php"><button class="ddbtn ">Log Keluar</button></a>
        </div>
    
    <a href="indexra.php"><img class="tit " src="image/Layer 0.png" alt="Logo BJB" style="width:65px;padding: 5px 10px 0px;"></a>
    <div class="search-container">
            <div class="searchbox">
                <form name='searchActivity' method='POST' action='searchAd.php'>
                    <input type="text" name="query" class="searchbox_input" placeholder="Cari..." required>
                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>  </div>
    
    <!--The activity list-->
    <br><br>
    <br><br>
    <table>
        <tr>
            <th>Nama Aktiviti</th>
            <th>Nama Peserta</th>
            <th>Lokasi</th>
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
    <td><a href="view-MoreFeedAd.php?id=<?php echo $rowFB["akname"]; ?>">Semak Maklum Balas</a></td>    
    
    </tr>
    <?php
    $i++;
    }
    ?>

    </table>
    <br><br>
    <p align='center'>
       
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewPastActAd.php'">
    </p>

</body>
    
</html>