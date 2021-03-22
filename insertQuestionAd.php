<?php
  session_start();
  if($_SESSION['sid'])
  {
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Administrator WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $ActName = $_SESSION['activityName'];

    if(isset($_POST['submitQ'])) {
    
    //Escape user inputs for security
    $Quantity = mysqli_real_escape_string($con, $_REQUEST['quantity']);
    $Q1=mysqli_real_escape_string($con, $_REQUEST['Q1']);
    $Q2=mysqli_real_escape_string($con, $_REQUEST['Q2']);
    $Q3=mysqli_real_escape_string($con, $_REQUEST['Q3']);
    $Q4=mysqli_real_escape_string($con, $_REQUEST['Q4']);
    $Q5=mysqli_real_escape_string($con, $_REQUEST['Q5']);
    $Q6=mysqli_real_escape_string($con, $_REQUEST['Q6']);
    $Q7=mysqli_real_escape_string($con, $_REQUEST['Q7']);
    $Q8=mysqli_real_escape_string($con, $_REQUEST['Q8']);
    $Q9=mysqli_real_escape_string($con, $_REQUEST['Q9']);
    $Q10=mysqli_real_escape_string($con, $_REQUEST['Q10']);

    //Attempt insert query execution
    $sqlQ = "INSERT INTO Question (Nama,Quantity,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10) 
    VALUES ('$ActName','$Quantity','$Q1', '$Q2','$Q3','$Q4','$Q5','$Q6','$Q7','$Q8','$Q9','$Q10')";

    //Execute query
    if(mysqli_query($con, $sqlQ)){
        echo '<script>alert("Soalan maklum balas telah berjaya ditambah.")
        window.location.href = "viewActAd.php"
        </script>';
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    // Close connection
    mysqli_close($con);
    }
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
    <title>Aktiviti Baru</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="activity.css" type="text/css">
    <script src="activity.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>  
</head>
<body>

<!--Navigation Menu-->
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

<div align="center">
    <div class="insertQuantity">
    <br><br>
    <form name="feedbackQuestion"method="POST" action="<?php $_PHP_SELF ?>">
    Sila pilih jumlah soalan yang anda mahu untuk maklum balas.(1-10)
        <select name='quantity' onchange='yesnoCheck(this);' required>
            <option value='0'>0</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
        </select>
    </div>

    <script>
        function yesnoCheck(that) {
            if (that.value != "0"){
                var i;
                for (i = 0; i < that.value; i++) {
                document.getElementById(i).style.display = "block";
                document.getElementById("feedbackQ").style.display = "block";
                }
            }else {
                var j;
                for (j = 0; j < 10; j++) {
                document.getElementById(j).style.display = "none";
                document.getElementById("feedbackQ").style.display = "none";
                }
            }
        }
    </script>

    <p>Sila tetapkan soalan maklum balas untuk <b><?php echo $ActName ?> </b><p>
    <p>(berdasarkan skala penilaian tahap kepuasan-hati dari 1 ke 5)</p>

    <div class="rowFeedback"  id="feedbackQ" style="display: none;">
    <div id='0' style="display: none;">
        No.1 :<br>
        <textarea id="Q1" name="Q1" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='1' style="display: none;">
        No.2 :<br>
        <textarea id="Q2" name="Q2" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='2' style="display: none;">
        No.3 :<br>
        <textarea id="Q3" name="Q3" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='3' style="display: none;">
        No.4 :<br>
        <textarea id="Q4" name="Q4" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='4' style="display: none;">
        No.5 :<br>
        <textarea id="Q5" name="Q5" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='5' style="display: none;">
        No.6 :<br>
        <textarea id="Q6" name="Q6" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='6' style="display: none;">
        No.7 :<br>
        <textarea id="Q7" name="Q7" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='7' style="display: none;">
        No.8 :<br>
        <textarea id="Q8" name="Q8" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='8' style="display: none;">
        No.9 :<br>
        <textarea id="Q9" name="Q9" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    <div id='9' style="display: none;">
        No.10 :<br>
        <textarea id="Q10" name="Q10" rows="3" cols="133" onfocus="colorInput(this)"></textarea>
    </div>

    </div>

    <br><br>

    <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='viewActAd.php'">
    <input name='submitQ' type='submit' value='Hantar' class='button' onclick="alert('Menghantar Borang?')">

    </form>

    <br><br>

</div>
</body>
</html>