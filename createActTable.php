
<?php
//Open connection
$con= mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("could not connect to mysql");

//Create table
$sql = "CREATE TABLE Aktiviti (
    Nama varchar(500) primary key,
    Peserta varchar(10),
    Implementasi varchar(7) not null,
    Bilangan int(5) unsigned null, 
    Lokasi varchar(100) not null, 
    Negeri varchar(20) not null,
    Postcode int(5) not null,
    Penganjur varchar(500) not null,
    tarikhPermulaan date not null,
    tarikhTamat date not null,
    masaPermulaan time not null,
    masaTamat time not null,
    Keadaan boolean default 0
)";

//Execute query
if($con->query($sql)===TRUE){
    echo "Table Aktiviti created successfully";
}else {
    echo "Error creating table: ". $con->error;
}

//Close connection
mysqli_close($con);
?>