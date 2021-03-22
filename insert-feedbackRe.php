<?php
session_start();
if($_SESSION['sid'])
{
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Resident WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $resultAct = mysqli_query($con,"SELECT * FROM Aktiviti WHERE Nama='".$_GET['id']."'");
    $rowAct = mysqli_fetch_array($resultAct);
    $resultQ = mysqli_query($con,"SELECT * FROM Question WHERE Nama ='".$_GET['id']."'");
    $rowQ = mysqli_fetch_array($resultQ);

    if(isset($_POST['submit'])){
    $actName=$rowAct['Nama'];
    $Lokasi=$rowAct['Lokasi'];
    $name=mysqli_real_escape_string($con, $_REQUEST['nama']);
    $k1=mysqli_real_escape_string($con, $_REQUEST['k1']);
    $k2=mysqli_real_escape_string($con, $_REQUEST['k2']);
    $k3=mysqli_real_escape_string($con, $_REQUEST['k3']);
    $k4=mysqli_real_escape_string($con, $_REQUEST['k4']);
    $k5=mysqli_real_escape_string($con, $_REQUEST['k5']);
    $k6=mysqli_real_escape_string($con, $_REQUEST['k6']);
    $k7=mysqli_real_escape_string($con, $_REQUEST['k7']);
    $k8=mysqli_real_escape_string($con, $_REQUEST['k8']);
    $k9=mysqli_real_escape_string($con, $_REQUEST['k9']);
    $k10=mysqli_real_escape_string($con, $_REQUEST['k10']);
    $feedback=mysqli_real_escape_string($con, $_REQUEST['feedback']);

    //Attempt insert query execution
    $sql = "INSERT INTO Feedback(akname,Lokasi,nama,k1,k2,k3,k4,k5,k6,k7,k8,k9,k10,feedback)
    VALUES ('$actName', '$Lokasi','$name','$k1','$k2','$k3','$k4','$k5','$k6','$k7','$k8','$k9','$k10','$feedback')";
    
    //Execute query
    if(mysqli_query($con, $sql)){
    echo '<script>alert("Maklum balas anda telah berjaya ditambah.")</script>';
    } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    }
// Close connection
mysqli_close($con);}
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head><title>Penambahan Maklum Balas</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="activity.css" type="text/css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    </head>
    
    <body class="bg">
    <!--Navigation Menu-->
    <div class="nv">
         <div class="center-nav">
        <div class="login right">
            <div class="loginImg"><img  src="image/Bobs.jpg" width="60px"></div>
            <div class="loginBlock">
            <button class="noborderbutton"><a href="profiler.php?id=<?php echo $row['ID']; ?>"><b>Welcome <?php echo $row['Fname'];?>!</b></a></button>
            </div>
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
     <!---insert feedback --> 
        <br>
        <div class=query align="center">
            <h1><?php echo "Nama aktiviti: ".$rowAct['Nama'].", Lokasi: ".$rowAct['Lokasi'] ?></h1>
        </div>
        <form name="feedback"method="POST" action="<?php $_PHP_SELF ?>">
        <br>
        <div class="rowFeedback">
            Nama Penduduk: <input type="text" name="nama" value="<?php echo $row['Fname']. " " .$row['Lname'] ?>">
        </div>
        <br>
        <div class="rowFeedback">

        <input type="hidden" name="k1" value=" ">

            <?php if($rowQ['Quantity']>=1)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q1'].'</p>
                <input type="radio" name="k1" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k1" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k1" value="Neutral">Neutral
                <input type="radio" name="k1" value="memuaskan">Memuaskan
                <input type="radio" name="k1" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k2" value=" ">

            <?php if($rowQ['Quantity']>=2)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q2'].'</p>
                <input type="radio" name="k2" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k2" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k2" value="Neutral">Neutral
                <input type="radio" name="k2" value="memuaskan">Memuaskan
                <input type="radio" name="k2" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k3" value=" ">

            <?php if($rowQ['Quantity']>=3)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q3'].'</p>
                <input type="radio" name="k3" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k3" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k3" value="Neutral">Neutral
                <input type="radio" name="k3" value="memuaskan">Memuaskan
                <input type="radio" name="k3" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k4" value=" ">

            <?php if($rowQ['Quantity']>=4)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q4'].'</p>
                <input type="radio" name="k4" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k4" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k4" value="Neutral">Neutral
                <input type="radio" name="k4" value="memuaskan">Memuaskan
                <input type="radio" name="k4" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k5" value=" ">

            <?php if($rowQ['Quantity']>=5)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q5'].'</p>
                <input type="radio" name="k5" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k5" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k5" value="Neutral">Neutral
                <input type="radio" name="k5" value="memuaskan">Memuaskan
                <input type="radio" name="k5" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k6" value=" ">

            <?php if($rowQ['Quantity']>=6)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q6'].'</p>
                <input type="radio" name="k6" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k6" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k6" value="Neutral">Neutral
                <input type="radio" name="k6" value="memuaskan">Memuaskan
                <input type="radio" name="k6" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k7" value=" ">

            <?php if($rowQ['Quantity']>=7)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q7'].'</p>
                <input type="radio" name="k7" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k7" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k7" value="Neutral">Neutral
                <input type="radio" name="k7" value="memuaskan">Memuaskan
                <input type="radio" name="k7" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k8" value=" ">

            <?php if($rowQ['Quantity']>=8)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q8'].'</p>
                <input type="radio" name="k8" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k8" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k8" value="Neutral">Neutral
                <input type="radio" name="k8" value="memuaskan">Memuaskan
                <input type="radio" name="k8" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k9" value=" ">

            <?php if($rowQ['Quantity']>=9)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q9'].'</p>
                <input type="radio" name="k9" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k9" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k9" value="Neutral">Neutral
                <input type="radio" name="k9" value="memuaskan">Memuaskan
                <input type="radio" name="k9" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

        <input type="hidden" name="k10" value=" ">

            <?php if($rowQ['Quantity']>=10)
                {
                echo'<p class="feedbackQ">'.$rowQ['Q10'].'</p>
                <input type="radio" name="k10" value="Sangat tidak memuaskan" required>Sangat tidak memuaskan
                <input type="radio" name="k10" value="Tidak memuaskan">Tidak memuaskan
                <input type="radio" name="k10" value="Neutral">Neutral
                <input type="radio" name="k10" value="memuaskan">Memuaskan
                <input type="radio" name="k10" value="Sangat memuaskan">Sangat memuaskan';
                }
            ?>

            </div>
            <br>
            <div class="rowFeedback">
                Maklum Balas<br>
                <textarea id="feedback" name="feedback" rows="6" cols="133"onfocus="colorInput(this)"required></textarea>
            </div>

    <p align='center'>
    <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewPastActr.php'">
    <input name='submit' type='submit' value='Hantar' class='button' onclick="alert('Menghantar Borang?')">
    </p>

        </form>
    </body>
    
</html>