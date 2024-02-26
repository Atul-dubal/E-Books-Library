<?php

session_start();

if(session_destroy()){
    header ("Location: index.php");
}
else{
    echo("<script>alert('Logout Operation Faild');</script>");
}
?>