<?php
session_start();
if($_SESSION['sid'])
{
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Administrator WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $resultFB = mysqli_query($con,"SELECT * FROM Feedback WHERE akname='".$_GET['id']."'");
    $rowFB=mysqli_fetch_array($resultFB);
    $resultQ = mysqli_query($con,"SELECT * FROM Question WHERE Nama ='".$_GET['id']."'");
    $rowQ = mysqli_fetch_array($resultQ);
    //delete all participant for selected activity
    if (isset($_POST['del']))
    {
        $find = $_POST['fi'];
        $resultd = mysqli_query($con, "DELETE FROM Feedback WHERE ID= '$find'");
        if ($resultd)
        {
            header("Location:view.FeedbackAd.php?id=".$_POST['fa']."&msg=Rekod%20maklum%20balas%20ini%20telah%20berjaya%20dihapus!");
            
        }else{
            echo "<script> alert(\"Proses penghapusan gagal! Sila cuba sebentar lagi!\") </script>";
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
        <a href="regad.php"><button class="ddbtn ">Tambah Pentadbir Baru</button></a>
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
    
    <br>

    <form name="feedback"method="POST" action="<?php $_PHP_SELF ?>">
    <input type="text" name="fi" value="<?php echo $rowFB['ID'] ?>" hidden >
    
    <input type="text" name="fa" value="<?php echo $rowFB['akname'] ?>" hidden >
    <div class="rowFeedback">
        <b>Nama aktiviti:</b> <?php echo $rowFB['akname'] ?>
        <br><br>
        <b>Lokasi:</b> <?php echo $rowFB['Lokasi'] ?>
     </div> 
     <br>
     <div class="rowFeedback">
        <b>Nama Penduduk:</b> <?php echo $rowFB['nama']?>
    </div>
    <br>
    
    <div class="rowFeedback">
        <?php if($rowQ['Quantity']>=1)
                {
                echo '<p class="feedbackQ">'.$rowQ['Q1'].'</p>';
                echo $rowFB['k1'];
                }
        ?>

        <?php if($rowQ['Quantity']>=2)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q2'].'</p>';
                echo $rowFB['k2'];
                }
        ?>
        
        <?php if($rowQ['Quantity']>=3)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q3'].'</p>';
                echo $rowFB['k3'];
                }
        ?>

        <?php if($rowQ['Quantity']>=4)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q4'].'</p>';
                echo $rowFB['k4'];
                }
        ?>

        <?php if($rowQ['Quantity']>=5)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q5'].'</p>';
                echo $rowFB['k5'];
                }
        ?>

        <?php if($rowQ['Quantity']>=6)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q6'].'</p>';
                echo $rowFB['k6'];
                }
        ?>

        <?php if($rowQ['Quantity']>=7)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q7'].'</p>';
                echo $rowFB['k7'];
                }
        ?>

        <?php if($rowQ['Quantity']>=8)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q8'].'</p>';
                echo $rowFB['k8'];
                }
        ?>

        <?php if($rowQ['Quantity']>=9)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q9'].'</p>';
                echo $rowFB['k9'];
                }
        ?>

        <?php if($rowQ['Quantity']=10)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q10'].'</p>';
                echo $rowFB['k10'];
                }
        ?>
    </div>
    <br>
    <div class="rowFeedback">
        Maklum Balas:<br>
        <?php echo $rowFB['feedback']?>
    </div>

    <p align='center'>
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='view.FeedbackAd.php?id=<?php echo $rowFB['akname'] ?>'">
        <input name='del' type='submit' value='Delete' class='button'>
    </p>

    </form>
    
</body>
    
</html>