<?php
    $con = mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("Unable to connect to database!");

    //define how many results you want per page
    $results_per_page = 10;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Infomasi</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="activity.css" type="text/css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<!--Navigation Menu-->
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
    
<?php
    $i=0;
    //collect
    if((isset($_POST['search']))||(isset($_GET['page']))) {

        if(!isset($_GET['query'])){
            $search = mysqli_real_escape_string($con, $_POST['query']);
        }else{
            $search = $_GET['query'];
        }

        //find out the number of results stored in the database
        $sqlQ = "SELECT * FROM Aktiviti WHERE Keadaan LIKE '1' AND (Nama LIKE '%$search%' OR Peserta LIKE '%$search%' OR Implementasi LIKE '%$search%' 
        OR Lokasi LIKE '%$search%' OR Negeri LIKE '%$search%' OR Postcode LIKE '%$search%' OR Penganjur LIKE '%$search%' 
        OR tarikhPermulaan LIKE '%$search%')";
        
        $resultQ = mysqli_query($con,$sqlQ);
        $queryResult = mysqli_num_rows($resultQ);

        echo "<div class = 'query'><h1>Terdapat ".$queryResult." keputusan untuk pencarian : ".$search."</h1></div>";
    
        //determine number of total pages available
        $number_of_pages = ceil($queryResult/$results_per_page);

        //determine which page number visitor is curently on
        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }

        //determine the sql LIMIT starting number for the results on the displaying page
        $this_page_first_result = ($page-1)*$results_per_page;

        //retrieve selected results from database and display them on page
        $sqlQP = "SELECT * FROM Aktiviti WHERE Keadaan LIKE '1' AND (Nama LIKE '%$search%' OR Peserta LIKE '%$search%' OR Implementasi LIKE '%$search%' 
        OR Lokasi LIKE '%$search%' OR Negeri LIKE '%$search%' OR Postcode LIKE '%$search%' OR Penganjur LIKE '%$search%' 
        OR tarikhPermulaan LIKE '%$search%') LIMIT $this_page_first_result,$results_per_page ";
        $resultQP = mysqli_query($con,$sqlQP);
    ?>

    <table>
        <tr>
            <th>Bilangan</th>
            <th>Nama</th>
            <th>Tarikh</th>
            <th>Aksi</th>
        </tr>

    <?php
        $j = (($page-1)*$results_per_page)+1;
        if($queryResult>0){
            while($rowQ = mysqli_fetch_assoc($resultQP)){
                if($i%2==0)
                $classname="even";
                else
                $classname="odd";
                ?>
                <tr class="<?php if(isset($classname)) echo $classname;?>">
                <td><?php echo $j; ?></td>
                <td><?php echo $rowQ["Nama"]; ?></td>
                <td><?php echo $rowQ["tarikhPermulaan"]; ?></td>
                <td><a href="viewMoreSearch.php?id=<?php echo $rowQ["Nama"]; ?>&query=<?php echo $search;?>&page=<?php echo $page;?>">Maklumat Lanjut</a></td>
                </tr>
            <?php
            $i++;
            $j++;
            }
            ?></table>

            <div class="page">
            <?php
            //display the links to the pages
            for($page = 1;$page<=$number_of_pages;$page++){
            echo '<a href = "search.php?page='.$page.'&query='.$search.'">'.$page.'</a> ';
            }
            mysqli_close($con);
            }
            ?>
            </div>
            <?php
            }else{
            #empty
            }
            ?>

    </table>
    
    <p align='center'>
        <input name='back' type='button' value='Kembali' class='button' onClick="parent.location='index.php'">
    </p>
</body>
</html>