<?php 

include("./config.php");
session_start();
if(!isset($_SESSION["admin_username"])){
if(isset($_POST["submit"])){
  $username= $_POST["username"] ;
  $password =$_POST["password"];
 
# echo ($username.$password) ;
$message="";
$message_type=1;
$newusername = mysqli_real_escape_string($conn,$username);
#echo("<script>alert(".$newusername.")</script>");
$query="select * from `users` where `Status`='Admin' or `Status`='Moderator' and `Username` ='$newusername'";
$res =mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
while($data=mysqli_fetch_assoc($res)){

    if($data["Username"] ==$username){ 
        
        if($data["Password"] ==$password){
            
        $message="Login Successfully";
$message_type=1;
$_SESSION["admin_username"]=$username;
$_SESSION["user_status"] = $data["Status"];
header("Location: dashboard.php");
break;
}
    else{
        $message="Invalid Credentials";
$message_type=0;
}

    }
    else{
        $message="Invalid Credentials";
$message_type=1;
}
}
}

else{
    $message="You Don't have An Admin Permissions";
    $message_type=0;
}
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AP Coders :Admin Login</title>

  <link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


</head>
<style>

body{
    background:  linear-gradient(lightyellow,lightblue, lightyellow);
   
    
}
.card{
    background: transparent ;
    background-size:cover;
    background-repeat:no-repeat;
}
.main {
  min-height:90vh;  
}
</style>

    <body>
  <div class="container-fluid d-flex justify-content-center align-items-center main flex-column">
    <div class="container border border-dark  shadow-lg card p-md-5">
      <div class="row">
        <!-- Sign In -->
        <div class="col-12">
<!--
          <button class="btn btn-light  border border-warning w-100 mym3" value="Login">Continue With Google</button>
-->
          <form class="" action="" method="post">
            <h1 class="h1 text-center my-3 my-md-4">Admin Panel</h1>
                                    <?php
            if($message!="")
            {
            ?>
            <p class=" py-1 alert <?php
            if($message_type==1)
            {
            echo(" alert-success  ");}else{echo(" alert-danger ");}?> text-center"> 
            <?php
            echo$message;
            }?>
            </p>
            
            <div class="form-group my1">
              <lable class="">Username :</lable>
              <input name="username" class="form-control" type="text" placeholder="username/email" />
            </div>
            <div class="form-group my-1">
              <lable class="">Password : </lable>
              <input name="password" class="form-control" type="password" placeholder="Password" />
            </div>
 <!--           <div class="form-group">
              <lable class="">Confirm Password :</lable>
              <input class="form-control" type="password" placeholder="Confirm Password" />
            </div>
-->
            <input name="submit" class="btn btn-info w-100 my-3" type="submit" value="Log In" />
          </form>
<!--
          <p class="text-center ">I Don't Have An Account <a href="registration.php" class="text-decoration-none">Create It</a></p>
  -->      </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
}
else{
    header("Location: dashboard.php");
}
?>