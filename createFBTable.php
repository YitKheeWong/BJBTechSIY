<?php
//Open connection
$con= mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("could not connect to mysql");

//Create table
$sql = "CREATE TABLE Feedback (
    
    
    nama varchar(100) primary key,
    Pengguna varchar (100) not null,
    Bilangan int(5) UNSIGNED not null,
    kepuasan_hati varchar(500) not null,
    akname varchar(100) not null,
    Lokasi varchar(100) not null, 
    feedback varchar(500) not null,
    tarikh date not null
    
)";

//Execute query
if($con->query($sql)===TRUE){
    echo "Table Feedback created successfully";
}else {
    echo "Error creating table: ". $con->error;
}

//Close connection
mysqli_close($con);
?>