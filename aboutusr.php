<?php
session_start();
if($_SESSION['sid'])
{
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM Resident WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  
  $sqls = "SELECT * FROM Aktiviti WHERE tarikhPermulaan < CURDATE() AND Keadaan = '1'";
    $results = mysqli_query($con, $sqls);
    $cnt = 0;
    while($rows = mysqli_fetch_array($results)) {
        $cnt++;}
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
    <title>Tentang Kami</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
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
    
    <p class="shadow">Kita telah berjaya menganjurkan <strong><span id="value"><?php echo $cnt?></span></strong> aktiviti!!!</p>
    
    <script>
            function animateValue(obj, start = 0, end = null, duration = 2000) {
            if (obj) {
        
                // save starting text for later (and as a fallback text if JS not running and/or google)
                var textStarting = obj.innerHTML;
        
                // remove non-numeric from starting text if not specified
                end = end || parseInt(textStarting.replace(/\D/g, ""));
        
                var range = end - start;
        
                // no timer shorter than 50ms (not really visible any way)
                var minTimer = 50;
        
                // calc step time to show all interediate values
                var stepTime = Math.abs(Math.floor(duration / range));
        
                // never go below minTimer
                stepTime = Math.max(stepTime, minTimer);
        
                // get current time and calculate desired end time
                var startTime = new Date().getTime();
                var endTime = startTime + duration;
                var timer;
        
                function run() {
                    var now = new Date().getTime();
                    var remaining = Math.max((endTime - now) / duration, 0);
                    var value = Math.round(end - (remaining * range));
                    // replace numeric digits only in the original string
                    obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
                    if (value == end) {
                        clearInterval(timer);
                    }
                }
        
                timer = setInterval(run, stepTime);
                run();
            }
        }
        
        animateValue(document.getElementById('value'));
        </script>
    
    <div class="responsiveImg">
        <div class="gallery">
            <img src="image/activity1.png" alt="photoBJB1" >
        <div class="desc">
            Description.
        </div></div>
    </div>
    <div class="responsiveImg">
        <div class="gallery">
            <img src="image/activity1.png" alt="photoBJB1" >
        <div class="desc">
            Description.
        </div></div>
    </div>
    <div class="responsiveImg">
        <div class="gallery">
            <img src="image/unnamed.jpg" alt="photoBJB1" >
        <div class="desc">
            Description.
        </div></div>
    </div>
    <div class="responsiveImg">
        <div class="gallery">
            <img src="image/activity2.jfif" alt="photoBJB1" >
        <div class="desc">
            Description.
        </div></div>
    </div>
    <div class="responsiveImg">
        <div class="gallery">
            <img src="/image/activity2.jfif" alt="photoBJB1" >
        <div class="desc">
            Description.
        </div></div>
    </div>
</body>
</html>