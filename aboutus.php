<?php
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Aktiviti WHERE tarikhPermulaan < CURDATE() AND Keadaan = '1'";
    $result = mysqli_query($con, $sql);
    $cnt = 0;
    while($row = mysqli_fetch_array($result)) {
        $cnt++;}
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Tentang Kami</title>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body >
<div class="nv">
    <div class="center-nav">

        <div class="login right">
            <div class="loginImg"><img src="image/guest.png" width="45px"></div>
            <div class="loginBlock"><button class="noborderbutton"><a href="login.php"><b>Log Masuk</b></a></button></div>
        </div>  
        
        <div class="right" style="display: inline-block;margin: 0 auto;">
            <a href="contactus.php"><button class="ddbtn right">Hubungi Kami</button></a>
            <a href="aboutus.php"><button class="ddbtn right">Tentang Kami</button></a>
            <div class="dropdown right">
                <button class="ddbtn" >Aktiviti</button>
                <div class="smallmenu">
                    <a href="viewActivity.php">Senarai Aktiviti</a>
                    <a href="viewPastAct.php">Senarai Aktiviti Lama</a>
                </div>
            </div>
            <a href="index.php"><button class="ddbtn right">Laman Utama</button></a>
        </div>
        <div  style="position: relative;display: inline-block;float: left;">
            <a href="index.php">
                <img class="tit" src="image/Layer 0.png" alt="Logo BJB" style="width:65px;padding: 5px 10px 0px;"></a>    
        </div>
        <div class="search-container">
            <div class="searchbox">
                <form name='searchActivity' method='POST' action='search.php'>
                    <input type="text" name="query" class="searchbox_input" placeholder="Cari..." required>
                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>  


        <p class="shadow">Kita telah berjaya menganjurkan <strong><span id = value><?php echo $cnt ?></span></strong> aktiviti!!!<br>
        .<br>
        .</p>
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
            </div>
            </div>
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