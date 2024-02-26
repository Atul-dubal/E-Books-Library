<?php 
session_start();
if(isset($_GET["id"]) && isset($_SESSION["username"])){
  
  include("./Admin/config.php" ); 
    $id=$_GET["id"];
    $id = mysqli_real_escape_string($conn,$id);
   
   $query="select * from `books` where `Id` = '$id'";
   $res = mysqli_query($conn,$query);
   $data=mysqli_fetch_assoc($res);
   
?>

<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AP Coders : Admin Dashboard </title>

<link rel="stylesheet" href="./assets/css/footernav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<style>

.card{
   width:75%;
  background: transparent ;
}
img{
    width:75%;
    
}
.my-img{
    min-height:200px;
   
}
@media (min-width:500px){
    .my-img{
    min-height:200px;
   max-height:400px;
}
}
</style>
</head>


<body>

  <div class=" bg-primary container-fluid header  shadow-lg">
<div class="row d-flex align-items-center px-2 " style="height: 80px">

<div class="col-md-6 col-10 ">
<p class="lead p-0 m-0 text-dark text-weight-bolder ms-2 ms-md-5  "> AP Coders</p>
</div>


<div class="col-2 col-md-6 ">
<div class="d-flex justify-content-end mr-3 navbar navbar-expand  d-md-none" data-toggle="collapse" data-target="#collapse">

<div class=" navbar-toggler-icon text-bolder text-dark d-flex text-right"></div>
</div>


<ul class="nav nav-inverse d-none d-md-flex">
<li class="nav-item   "><a href="/" class="nav-link">Home</a></li>
<li class="nav-item  "><a href="" class="nav-link "> Trending</a></li>

<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

</ul>

</div>
</div>
</div>

  <div id="collapse" class="collapse bg-primary   w-100 lead   menu navbar-collapse">
<ul class=" nav  d-flex flex-column">

<li class="nav-item  text-info "><a href="/" class="nav-link">Home</a></li>
<li class="nav-item  "><a href="" class="nav-link "> Trending</a></li>

<li class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

</ul>
        <div class="  social-icons text-center">
          <button class="btn btn-outline-warning"><i class="fa fa-facebook"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-github"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-google"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-twitter"></i></button>
        </div>
        
</div>



<!-- Product section -->

<div class="container bg-transparent border border-none my-4">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center  flex-column" style="width:100vw">
            
                <img src="./Admin/uploads/img/<?php echo $data['book_cover_url'];?>" alt="" class="my-img shadow-lg card-top-img "/>
           <div class="my-1 text-muted">
           <p class="" >Name :<br/> <?php echo$data['book_name']; ?></p>
           <p class=" " > Category : <br/><?php echo$data['book_category']; ?></p>
          <p class="" > Published By :<br/><?php echo$data['published_by']; ?></p>
          
           <a href="./Admin/uploads/pdf/<?php echo$data['book_pdf_url'];?>"class="btn btn-info w-100">Download </a>
          
        </div>
    </div>
    </div>
</div>

<!-- footer section -->

  <div class="container-fluid bg-primary py-5  mt-5 fade-up animate__animated animate__fadeInDown">
    <div class="row">
      <div class="col-sm-4 d-flex flex-column px-5 text-center ">
        <h2 class="lead  nav-head text-center d-block p-2">Useful Links </h2>
        <ul class="nav nav-hover lead text-white  d-block">

          <li class="nav-item text-white"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="" class="nav-link"> Trending Ebooks</a></li>

          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
        
          <li class="nav-item"><a href="registration.php" class="nav-link"> Register</a></li>
          <li class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>

        </ul>
      </div>

      <div class="col-sm-4 d-flex flex-column px-5  text-center services-footer">
        <p class="lead nav-head p-2"> EBook Categories</p>
        <ul class="list-unstyled lead py-2">
 <?php 
$query="select * from `Category` " ;
$res = mysqli_query($conn,$query);
while($data=mysqli_fetch_array($res)){
 
 ?>
  
            <li class="py-2"><a href="#cyber"><?php echo($data["Category"]); ?><span class="badge badge-warning text-info btn btn-outline-warning ms-2"><?php echo($data["count"]);?></span></a></li>


<?php }?>
        </ul>
      </div>
      <div class="col-sm-4 d-flex flex-column px-5 text-center ">
        <p class="lead nav-head p-2">Company Address </p>
        <address class="lead mt-2 pre text-white py-2">
          AP Coders PVT Limited Co.
          Sector 1E , Kalmaboli,
          Navi Mumbai,410218,
          Maharashtra,India.

        </address>
        <div class="  social-icons">
          <button class="btn btn-outline-warning"><i class="fa fa-facebook"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-github"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-google"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-twitter"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class=" container-fluid bg-primary">
    <div class="row">
      <div class="col py-2 d-flex align-item-center justify-content-center ">
        <p class="text-center text-dark">Copyright &copy; All Rights Are Reserved By <b>AP Coders</b> </p>
      </div>
    </div>
  </div>
  
</body>
</html>

<?php
}
else
{
    header("Location: library.php");
}?>
