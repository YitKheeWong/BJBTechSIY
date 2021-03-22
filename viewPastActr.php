<?php
session_start();
if($_SESSION['sid'])
{
  $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");
  $sql = "SELECT * FROM Resident WHERE id = '".$_SESSION['sid']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

  //define how many results you want per page
  $results_per_page = 10;

  //find out the number of results stored in the database
  $resultAct = mysqli_query($con,"SELECT * FROM Aktiviti WHERE tarikhPermulaan < CURDATE() AND Keadaan = '1'" );
  $number_of_results = mysqli_num_rows($resultAct);
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
    <title>Senarai Aktiviti Lepas</title>
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
            <button class="noborderbutton"><a href="profiler.php?id=<?php echo $row['ID']; ?>"><b>Welcome <?php echo $row['Fname'];?>!</b></a></button>
            </div>
            <!--js or show the name-->
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
    
    <!--The activity list-->
    <?php
        //determine number of total pages available
        $number_of_pages = ceil($number_of_results/$results_per_page);

        //determine which page number visitor is curently on
        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }

        //determine the sql LIMIT starting number for the results on the displaying page
        $this_page_first_result = ($page-1)*$results_per_page;

        //retrieve selected results from database and display them on page
        $sqlAct = "SELECT * FROM Aktiviti WHERE tarikhPermulaan < CURDATE() AND Keadaan = '1' LIMIT $this_page_first_result,$results_per_page";
        $resultActP = mysqli_query($con,$sqlAct);
    ?>
    <br>
    <table>
        <tr>
            <th>Aktiviti</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Aksi</th>
            <th>Maklum Balas</th>
        </tr>

    <?php
     date_default_timezone_set("Asia/Kuala_Lumpur");
     echo "Tarikh Hari Ini : ".date("d-m-Y"); 
     echo"<br>";
     echo "Masa : " .date("h:i A");
    $i=0;
    while($rowAct = mysqli_fetch_array($resultActP)) {
    if($i%2==0)
    $classname="even";
    else
    $classname="odd";   
    ?>
    <?php $timeStart=date('h:i A', strtotime($rowAct["masaPermulaan"]));?>

    <tr class="<?php if(isset($classname)) echo $classname;?>">
    <td><?php echo $rowAct["Nama"]; ?></td>
    <td><?php echo $rowAct["tarikhPermulaan"]; ?></td>
    <td><?php echo $timeStart; ?></td>
    <td><a href="viewMorepr.php?id=<?php echo $rowAct["Nama"]; ?>">Maklumat Lanjut</a></td>
    <td><a href="insert-feedbackRe.php?id=<?php echo $rowAct["Nama"]; ?>">Maklum Balas</a></td>    
</tr>
    <?php
    $i++;
    }
    ?>

    </table>

    <div class="page">
    <?php
        //display the links to the pages
        for($page = 1;$page<=$number_of_pages;$page++){
            echo '<a href = "viewPastActr.php?page='.$page.'">'.$page.'</a> ';
        }
        mysqli_close($con);
    ?>
    </div>
    
    <p align='center'>
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='indexr.php'">
    </p>
</body>
</html>