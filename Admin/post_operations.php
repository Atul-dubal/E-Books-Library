<?php
include("config.php");
if(isset($_POST["submit"])){
   $bookid =$_POST["bookid"];
   $status = $_POST["status"];
   if($status=="Live"){
   $query="update  `books` set `Status` ='disable' where `Id` ='$bookid'";
   }
   else{
        $query="update  `books` set `Status` ='Live' where `Id` ='$bookid'";  
   }
    $res = mysqli_query($conn,$query);
    
}
?>