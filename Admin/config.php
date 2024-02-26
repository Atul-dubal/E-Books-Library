<?php

$host ="localhost";
$username="id20422959_apcoders";
$password="Atuldubal@2206";
$db_name="id20422959_apcoders";


$conn = mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
   echo("Server Error"); 
}
?>