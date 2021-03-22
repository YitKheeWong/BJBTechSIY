<?php
  session_start();
  if($_SESSION['sid'])
  {
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
    $sql = "SELECT * FROM Administrator WHERE id = '".$_SESSION['sid']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    
    //dashboard info
    //contactus count and chart
    $resultD = mysqli_query($con, "SELECT * FROM contactusg");    
    $cu=0;    $cs = 0;    $csy = 0;
    $contu = mysqli_num_rows($resultD);
    while ($rowD = mysqli_fetch_array($resultD)){
        if($rowD['Category'] == "Umum") $cu++;
        if($rowD['Category'] == "Perkhidmatan") $cs++;
        if($rowD['Category'] == "Sistem") $csy++;
    }
    
    //aktiviti count and chart
    $resultA = mysqli_query($con, "SELECT * FROM Aktiviti");
    $Johor = 0;    $Kedah = 0;    $Kelantan = 0;    $Kuala_Lumpur = 0;    $Labuan = 0;
    $Melaka = 0;    $Negeri_Sembilan = 0;    $Pahang = 0;    $Penang = 0;    $Perak = 0;    $Perlis = 0;
    $Putrajaya = 0;    $Sabah = 0;    $Sarawak = 0;    $Selangor = 0;    $Terengganu = 0;
    $mn = mysqli_num_rows($resultA);
    while ($rowA = mysqli_fetch_array($resultA)){
        if($rowA['Negeri'] == "Johor") $Johor++;
        if($rowA['Negeri'] == "Kedah") $Kedah++;
        if($rowA['Negeri'] == "Kelantan") $Kelantan++;
        if($rowA['Negeri'] == "Kuala Lumpur") $Kuala_Lumpur++;
        if($rowA['Negeri'] == "Labuan") $Labuan++;
        if($rowA['Negeri'] == "Melaka") $Melaka++;
        if($rowA['Negeri'] == "Negeri Sembilan") $Negeri_Sembilan++;
        if($rowA['Negeri'] == "Pahang") $Pahang++;
        if($rowA['Negeri'] == "Penang") $Penang++;
        if($rowA['Negeri'] == "Perak") $Perak++;
        if($rowA['Negeri'] == "Perlis") $Perlis++;
        if($rowA['Negeri'] == "Putrajaya") $Putrajaya++;
        if($rowA['Negeri'] == "Sabah") $Sabah++;
        if($rowA['Negeri'] == "Sarawak") $Sarawak++;
        if($rowA['Negeri'] == "Selangor") $Selangor++;
        if($rowA['Negeri'] == "Terengganu") $Terengganu++;
    }
    
    //participant count and chart
    $resultP = mysqli_query($con, "SELECT * FROM participant");
    $grp1 = 0;    $grp2 = 0;    $grp3 = 0;    $grp4 = 0;
    $part = mysqli_num_rows($resultP);
    while ($rowP = mysqli_fetch_array($resultP)){
        if($rowP['ICNo'] > 900000000000) $grp2++;//21~30++age
        else {
            if($rowP['ICNo'] > 800000000000) $grp1++;//31~40age
            else{
                if($rowP['ICNo'] > 100000000000) $grp4++;//1~10
                else $grp3++;//11~20
            }
        }
    }
    
    //feedback count and chart
    $resultF = mysqli_query($con, "SELECT * FROM Feedback");
    $feed = mysqli_num_rows($resultF);
    $yesf = $feed;
    $nof = $part - $yesf;
    
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
    <title>Laman Utama</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="indexrajs.js"></script>
</head>
<body style="background-color:lightblue;">
    <!--Navigation Menu-->
    <div class="nv">
    <div class="center-nav">
        <div class="login right">
            <div class="loginImg"><img  src="image/Bobs.jpg" width="60px"></div>
            <div class="loginBlock">
            <button class="noborderbutton"><a href="profileadmin.php?id=<?php echo $row['ID']; ?>"><b>Welcome <?php echo $row['Fname'];?>!</b></a></button>
            </div>
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
    </div>  
  </div>
<br><br><br>
<div class="query">
    <h1><tab>**JUMLAH**</h1>
</div>
        <div class="row" style="background-color:lightcyan">
            <div class="col3 center">
                <div id="actnum">
                <b>Pendaftaran<br> Aktiviti</b><br>
                    <?php echo $mn;?>
                </div>
            </div>
            <script>
                //activity
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
                
                animateValue(document.getElementById('actnum'));
            </script>
            
            <div class="col7 center">
                <div id= "actchart">
                    <script>
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                
                    // Draw the chart and set the chart values
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Kelangsungan Aktiviti Di Seluruh Malaysia', 'Bilangan Mingguan'],
                    ['Johor', <?php echo $Johor ?>],
                    ['Kedah', <?php echo $Kedah ?>],
                    ['Kelantan', <?php echo $Kelantan ?>],
                    ['Kuala Lumpur',  <?php echo $Kuala_Lumpur ?>],
                    ['Labuan', <?php echo $Labuan ?>],
                    ['Melaka', <?php echo $Melaka ?>],
                    ['Negeri Sembilan',  <?php echo $Negeri_Sembilan ?>],
                    ['Pahang', <?php echo $Pahang ?>],
                    ['Penang', <?php echo $Penang ?>],
                    ['Perak',  <?php echo $Perak ?>],
                    ['Perlis', <?php echo $Perlis ?>],
                    ['Putrajaya', <?php echo $Putrajaya ?>],
                    ['Sabah',  <?php echo $Sabah ?>],
                    ['Sarawak', <?php echo $Sarawak ?>],
                    ['Selangor', <?php echo $Selangor ?>],
                    ['Terengganu',  <?php echo $Terengganu ?>]
                    ]);
                
                    // Optional; add a title and set the width and height of the chart
                    var options = {'title':'Kelangsungan Aktiviti Di Seluruh Malaysia', 'width':450, 'height':250};
                
                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('actchart'));
                    chart.draw(data, options);
                    }
                    </script>
                </div>
            </div>
        
            <div class="center col3">
                <div id="contnum">
                    <b>Persoalan <br>Diterima</b><br>
                    <?php echo $contu;?>
                </div>
            </div>    
            <script>
                //contact us
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
            
            animateValue(document.getElementById('contnum'));
            </script>
            
            <div class="col7 center">
                <div id= "conchart">
                    <script>
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                
                    // Draw the chart and set the chart values
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Jenis Persoalan', 'Bilangan Mingguan'],
                    ['Sistem', <?php echo $cs ?>],
                    ['Perkhidmatan', <?php echo $csy ?>],
                    ['Umum',  <?php echo $cu ?>]
                    ]);
                
                    // Optional; add a title and set the width and height of the chart
                    var options = {'title':'Jenis Persoalan', 'width':450, 'height':250};
                
                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('conchart'));
                    chart.draw(data, options);
                    }
                    </script>
                </div>
            </div>
        </div>
        <div class="row" style="background-color:lightcyan">
            <div class="center col3">
                <div id="parnum">
                    <b>Peserta <br>Aktivti</b><br>
                    <?php echo $part;?>
                </div>
            </div>
                <script>
                    //participant
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
                    
                    animateValue(document.getElementById('parnum'));
                </script>
                <!--chart-->
            <div class="col7 center">
                <div id= "parchart">
                    <script>
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                
                    // Draw the chart and set the chart values
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Umur Peserta', 'Bilangan Mingguan'],
                    ['31~40 years old', <?php echo $grp1 ?>],
                    ['21~30 years old', <?php echo $grp2 ?>],
                    ['11~20 years old', <?php echo $grp3 ?>],
                    ['1~10 years old',  <?php echo $grp4 ?>]
                    ]);
                
                    // Optional; add a title and set the width and height of the chart
                    var options = {'title':'Umur Para Peserta', 'width':450, 'height':250};
                
                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('parchart'));
                    chart.draw(data, options);
                    }
                    </script>
                </div>
            </div>
            
            <div class="center col3">
                <div id="fbnum">
                    <b>Maklum <br>Balas</b><br>
                    <?php echo $feed;?>
                </div>
            </div>    
                <script>
                    //feedback
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
                    
                    animateValue(document.getElementById('fbnum'));
                </script>
            <div class="col7 center">
                <div id= "fbchart">
                    <script>
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                
                    // Draw the chart and set the chart values
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Peratusan Peserta yang Memberi Maklum Balas', 'Bilangan Mingguan'],
                    ['memberi maklum balas', <?php echo $yesf ?>],
                    ['tidak memberi maklum balas', <?php echo $nof ?>]
                    ]);
                
                    // Optional; add a title and set the width and height of the chart
                    var options = {'title':'Peratusan Peserta yang Memberi Maklum Balas', 'width':450, 'height':250};
                
                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('fbchart'));
                    chart.draw(data, options);
                    }
                    </script>
                </div>
            </div>
        </div><!--end of row-->
</body>
</html>