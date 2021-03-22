<?php
//Open connection
$con= mysqli_connect("localhost","id13561898_root","/Oxo6py|5]V@3&9#","id13561898_bjbdb") or die("could not connect to mysql");

//Create table
$sql = "CREATE TABLE Question (
    Nama varchar(500) primary key,
    Quantity int(2),
    Q1 varchar(500),
    Q2 varchar(500),
    Q3 varchar(500),
    Q4 varchar(500),
    Q5 varchar(500),
    Q6 varchar(500),
    Q7 varchar(500),
    Q8 varchar(500),
    Q9 varchar(500),
    Q10 varchar(500)
)";

//Execute query
if($con->query($sql)===TRUE){
    echo "Table Question created successfully";
}else {
    echo "Error creating table: ". $con->error;
}

//Close connection
mysqli_close($con);
?>