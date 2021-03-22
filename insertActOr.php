<?php
session_start();
if($_SESSION['sid'])
{  
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM ProgramOrganiser WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

   if(isset($_POST['submit'])) {
        //Escape user inputs for security
        $ActName = mysqli_real_escape_string($con, $_REQUEST['activityName']);
        $Peserta = mysqli_real_escape_string($con, $_REQUEST['Peserta']);
        $Implementasi = mysqli_real_escape_string($con, $_REQUEST['Implementasi']);
        $Bilangan = mysqli_real_escape_string($con, $_REQUEST['Bilangan']);
        $Lokasi = mysqli_real_escape_string($con, $_REQUEST['Lokasi']);
        $Negeri = mysqli_real_escape_string($con, $_REQUEST['Negeri']);
        $Postcode = mysqli_real_escape_string($con, $_REQUEST['Postcode']);
        $Penganjur = mysqli_real_escape_string($con, $_REQUEST['Penganjur']);
        $tarikhPermulaan = mysqli_real_escape_string($con, $_REQUEST['tarikhPermulaan']);
        $tarikhTamat = mysqli_real_escape_string($con, $_REQUEST['tarikhTamat']);
        $masaPermulaan = mysqli_real_escape_string($con, $_REQUEST['apptMula']);
        $masaTamat = mysqli_real_escape_string($con, $_REQUEST['apptTamat']);
    
        $idOr = $_SESSION['sid'];
        $_SESSION['activityName'] = $ActName;

        $sqlAct = "SELECT * FROM Aktiviti WHERE Nama LIKE '$ActName'";
        $resultAct = mysqli_query($con,$sqlAct);
        $numResult = mysqli_num_rows($resultAct);

        if($numResult>0)
        {
        echo '<script>
        alert("Nama aktiviti ini telah digunakan, sila pilih nama lain.")
        window.location.href = "insertActOr.php"
        </script>';
        }
     
        //Attempt insert query execution
        $sql = "INSERT INTO Aktiviti (Nama, Peserta, Implementasi, Bilangan, Lokasi, Negeri, Postcode, Penganjur, tarikhPermulaan, tarikhTamat, masaPermulaan, masaTamat, Keadaan, Count, ID) 
        VALUES ('$ActName', '$Peserta', '$Implementasi','$Bilangan','$Lokasi','$Negeri','$Postcode','$Penganjur','$tarikhPermulaan','$tarikhTamat','$masaPermulaan','$masaTamat','0','0', '$idOr')";
    
        //Execute query
        if(mysqli_query($con, $sql)){
        echo '<script>alert("Aktiviti telah berjaya ditambah.")
        window.location.href = "insertQuestionOr.php"
        </script>';
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
        // Close connection
        mysqli_close($con);}
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
    <title>Laman Utama</title>
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

    
    <p class='right'>Aktiviti->Maklumat aktiviti</p><br><br>

    <form name='insertActivity' method='POST' action='insertActOr.php'>
    <br><br>
    <div class='row'>
        <div class='column'>
        Nama Aktiviti:<input type='text' name='activityName' size='' onfocus='colorInput(this)' required><br><br>

        Aktiviti:
        <input type='radio' name='Peserta' value='Penduduk' required>Penduduk
        <input type='radio' name='Peserta' value='Orang Awam'>Orang Awam

        <br><br>
            
        Implementasi Aktiviti:
        <select name='Implementasi' onchange='yesnoCheck(this);' requiered>
            <option value='Terbuka'>Terbuka</option>
            <option value='Terhad'>Terhad</option>
        </select>

        <script>
        function yesnoCheck(that) {
            if (that.value == "Terhad"){
            document.getElementById("ifYes").style.display = "block";
            } else {
            document.getElementById("ifYes").style.display = "none";
            }
        }
        </script>

        <br><br>

        <div id='ifYes' style="display: none;">
        Max peserta:<input type='number' onfocus='colorInput(this)' name='Bilangan' value='0'><br>
        </div>

       
        </div>

        <div class='column'>
            Lokasi:<input type='text' name='Lokasi' size='' onfocus='colorInput(this)' required><br><br>

        Negeri:
        <select name='Negeri' required>
            <option value='Johor'>Johor</option>
            <option value='Kedah'>Kedah</option>
            <option value='Kelantan'>Kelantan</option>
            <option value='Kuala Lumpur'>Kuala Lumpur</option>
            <option value='Labuan'>Labuan</option>
            <option value='Melaka'>Melaka</option>
            <option value='Negeri Sembilan'>Negeri Sembilan</option>
            <option value='Pahang'>Pahang</option>
            <option value='Penang'>Penang</option>
            <option value='Perak'>Perak</option>
            <option value='Perlis'>Perlis</option>
            <option value='Putrajaya'>Putrajaya</option>
            <option value='Sabah'>Sabah</option>
            <option value='Sarawak'>Sarawak</option>
            <option value='Selangor'>Selangor</option>
            <option value='Terengganu'>Terengganu</option>
        </select>
    
        <br><br>
    
        Postcode:
        <input type='text' id='postcode' name='Postcode' onfocus='colorInput(this)' required>   
        
        <br><br>
        
        Jenis Penganjur:<input type='text' id='penganjur' name='Penganjur' onfocus='colorInput(this)' required>
        
        </div>

        <div class='column'>
            Tarikh permulaan:<input type='date' id='tarikh' name='tarikhPermulaan' required><br><br>

            Tarikh tamat:<input type='date' id='tarikh' name='tarikhTamat' required><br><br>
        
            Masa permulaan:<input type='time' id='appt' name='apptMula' required><br><br>
        
            Masa tamat:<input type='time' id='appt' name='apptTamat' required><br><br>
        
        </div>

        </div>
            
    <p align='center'>
    <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewActOr.php'">
    <input name='submit' type='submit' value='Seterusnya' class='button' onclick="alert('Anda akan langkah ke maklum balas.')">
    </p>
            
    </form>
</body>
</html>