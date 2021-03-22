<?php
session_start();
if($_SESSION['sid'])
{
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  
  if(count($_POST)>0){
    mysqli_query($con,"UPDATE Aktiviti set Nama='".$_POST['Nama']."',Peserta='".$_POST['Peserta']."',
    Implementasi='".$_POST['Implementasi']."',Lokasi='".$_POST['Lokasi']."',Negeri='".$_POST['Negeri']."',
    Postcode='".$_POST['Postcode']."',Penganjur='".$_POST['Penganjur']."',
    tarikhPermulaan='".$_POST['tarikhPermulaan']."',tarikhTamat='".$_POST['tarikhTamat']."',
    masaPermulaan='".$_POST['apptMula']."',masaTamat='".$_POST['apptTamat']."'
    WHERE Nama ='".$_POST['Nama']."'");
    
    echo '<script>alert("Aktiviti telah berjaya dikemaskini.")</script>';
    }
    $resultAct = mysqli_query($con,"SELECT * FROM Aktiviti WHERE Nama='".$_GET['id']."' AND Keadaan = '0'");
    $rowAct=mysqli_fetch_array($resultAct);
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
    <title>Kemas Kini Aktiviti</title>
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
    <form name='updateActivity' method='POST' action=''>
    <br><br>
    <div class='row'>
        <div class='column'>
        Nama Aktiviti:
        <input type="hidden" name="Nama" class="txtField" value="<?php echo $rowAct['Nama'];?>">
        <input type="text" disabled name="Nama" value="<?php echo $rowAct['Nama'];?>" onfocus="colorinput(this)">
        <br><br>

        Aktiviti:
        <input type='radio' name='Peserta' <?php if($rowAct['Peserta']=="Penduduk") {echo "checked";}?> value='Penduduk'>Penduduk
        <input type='radio' name='Peserta' <?php if($rowAct['Peserta']=="Orang Awam") {echo "checked";}?> value='Orang Awam'>Orang Awam

        <br><br>
            
        Implementasi Aktiviti:
        <select name='Implementasi' requiered>
            <option value='Terbuka' <?php if($rowAct['Implementasi']=="Terbuka") {echo'selected="selected"';}?>>Terbuka</option>
            <option value='Terhad' <?php if($rowAct['Implementasi']=="Terhad") {echo'selected="selected"';}?>>Terhad</option>
        </select>

        <br><br>

        <?php
        if($rowAct["Implementasi"]=="Terhad"){
            echo "Max peserta:<input type='number' onfocus='colorInput(this)' name='Bilangan' min='1' value='".$rowAct['Bilangan']."' >";
        } 
        ?>

       
        </div>

        <div class='column'>
            Lokasi:<input type='text' name='Lokasi' size='' onfocus='colorInput(this)' value="<?php echo $rowAct['Lokasi']?>" required><br><br>

        Negeri:
        <select name='Negeri' required>
            <option value='Johor' <?php if($rowAct['Negeri']=="Johor") {echo'selected="selected"';}?>>Johor</option>
            <option value='Kedah' <?php if($rowAct['Negeri']=="Kedah") {echo'selected="selected"';}?>>Kedah</option>
            <option value='Kelantan' <?php if($rowAct['Negeri']=="Kelantan") {echo'selected="selected"';}?>>Kelantan</option>
            <option value='Kuala Lumpur' <?php if($rowAct['Negeri']=="Kuala Lumpur") {echo'selected="selected"';}?>>Kuala Lumpur</option>
            <option value='Labuan' <?php if($rowAct['Negeri']=="Labuan") {echo'selected="selected"';}?>>Labuan</option>
            <option value='Melaka' <?php if($rowAct['Negeri']=="Melaka") {echo'selected="selected"';}?>>Melaka</option>
            <option value='Negeri Sembilan' <?php if($rowAct['Negeri']=="Negeri Sembilan") {echo'selected="selected"';}?>>Negeri Sembilan</option>
            <option value='Pahang' <?php if($rowAct['Negeri']=="Pahang") {echo'selected="selected"';}?>>Pahang</option>
            <option value='Penang' <?php if($rowAct['Negeri']=="Penang") {echo'selected="selected"';}?>>Penang</option>
            <option value='Perak' <?php if($rowAct['Negeri']=="Perak") {echo'selected="selected"';}?>>Perak</option>
            <option value='Perlis' <?php if($rowAct['Negeri']=="Perlis") {echo'selected="selected"';}?>>Perlis</option>
            <option value='Putrajaya' <?php if($rowAct['Negeri']=="Putrajaya") {echo'selected="selected"';}?>>Putrajaya</option>
            <option value='Sabah' <?php if($rowAct['Negeri']=="Sabah") {echo'selected="selected"';}?>>Sabah</option>
            <option value='Sarawak' <?php if($rowAct['Negeri']=="Sarawak") {echo'selected="selected"';}?>>Sarawak</option>
            <option value='Selangor' <?php if($rowAct['Negeri']=="Selangor") {echo'selected="selected"';}?>>Selangor</option>
            <option value='Terengganu' <?php if($rowAct['Negeri']=="Terengganu") {echo'selected="selected"';}?>>Terengganu</option>
        </select>
    
        <br><br>
    
        Postcode:
        <input type='text' id='postcode' name='Postcode' onfocus='colorInput(this)' value="<?php echo $rowAct["Postcode"]; ?>" required>   
        
        <br><br>
        
        Penganjur:<input type='text' id='penganjur' name='Penganjur' onfocus='colorInput(this)' value="<?php echo $rowAct["Penganjur"]; ?>" required>
        
        </div>

        <div class='column'>
            Tarikh permulaan:<input type='date' id='tarikh' name='tarikhPermulaan' value="<?php echo $rowAct["tarikhPermulaan"]; ?>"required><br><br>

            Tarikh tamat:<input type='date' id='tarikh' name='tarikhTamat' value="<?php echo $rowAct["tarikhTamat"]; ?>" required><br><br>
        
            Masa permulaan:<input type='time' id='appt' name='apptMula' value="<?php echo $rowAct["masaPermulaan"]; ?>" required><br><br>
        
            Masa tamat:<input type='time' id='appt' name='apptTamat'  value="<?php echo $rowAct["masaTamat"]; ?>" required><br><br>
        
        </div>

        </div>
            
    <p align='center'>
    <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewActOr.php'">
    <input name='submit' type='submit' value='Hantar' class='button'  onclick="alert('Kemas Kini?')">
    </p>
            
    </form>
    
</body>
</html>