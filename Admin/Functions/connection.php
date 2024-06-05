<?php
$server="localhost";
$user="root";
$psw="";
$dbname="spark_ride";
$conn=mysqli_connect($server,$user,$psw,$dbname);
if(!$conn){
    echo"Connection Unsuccessful";
}
?>