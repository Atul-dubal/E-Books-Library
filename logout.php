<?php

session_start();

if(session_destroy()){
    header ("Location: login.php");
}
else{
    echo("<script>alert('Logout Operation Faild');</script>");
}
?>