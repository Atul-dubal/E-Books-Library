<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AP Coders: E-Library </title>

<link rel="stylesheet" href="./assets/css/footernav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<style>
a{
    text-decoration:none;
    color:black;
    
}
.my-img{
    width:80%;
    height:200px;
    margin: 5px auto;
}
.see-more-img{
   width:80%; 
   height:150px;
   margin:30px auto;
   text-align:center;
   display:flex;
   align-self:center;
   justify-self-content:center;
}
.card{
    height:260px;
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
<li class="nav-item   "><a href="login.php" class="nav-link ">Login</a></li>
<li class="nav-item"><a href="registration.php" class="nav-link">Register</a></li>
<li class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
</ul>

</div>
</div>
</div>



<div id="collapse" class="collapse bg-primary   w-100 lead   menu navbar-collapse">
<ul class=" nav  d-flex flex-column">

<li class="nav-item  text-info "><a href="/" class="nav-link">Home</a></li>
<li class="nav-item  "><a href="" class="nav-link "> Trending</a></li>
<li class="nav-item   "><a href="login.php" class="nav-link ">Login</a></li>
<li class="nav-item"><a href="registration.php" class="nav-link">Registration</a></li>
<li class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
</ul>
        <div class="  social-icons text-center">
          <button class="btn btn-outline-warning"><i class="fa fa-facebook"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-github"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-google"></i></button>
          <button class="btn btn-outline-warning"><i class="fa fa-twitter"></i></button>
        </div>
        
</div>

<!-- Programming section -->
<?php 
include("./Admin/config.php");

$quer="SELECT * FROM `Category`";
$re=mysqli_query($conn,$quer);
while($cat=mysqli_fetch_assoc($re)){

    if($cat["count"]>0){
?>
  <div  class="container-fluid bg-transparent my-5 ">
    <div class="row">
      <h1 id="services" class=" h1 text-center py-3 services-head"><?php echo$cat['Category'];?> EBooks </h1>
<?php 
 
 
 $query="select * from `books`";
 $res=mysqli_query($conn,$query);
 $i =1;
 $j=1;
while($data=mysqli_fetch_assoc($res)){
        if($data["Status"]=="Live"){
    $book_category =explode(",",$data["book_category"]);
    if(in_array($cat["Category"],$book_category)==true){
if($i<=5){
?>

      <div id="web" class="col-6 col-md-2 col-lg-2 services text-center my-2">
  <a href="product.php?id=<?php echo$data['Id']; ?>">        
          <div class="card  ">
              <div class="img-responsive">
          <img  class="card-img-top my-img img text-info " alt="" src="./Admin/uploads/img/<?php echo$data['book_cover_url'];?>"/>
</div>
          <p><?php echo$data['book_name'];?></p>

        </div>
        </a>
        </div>
       
       <?php $i++; }}} } if($i>5){?>

      <div id="web"class="col-6 col-md-2 col-lg-2 services text-center my-2 ">
        <div class="card ">

          <img class="card-img-top see-more-img text-info " alt="" src="https://www.nicepng.com/png/full/501-5015479_learn-more-arrows-right-arrow-icon-gif.png"/>
          
          <p>See More Books</p>

        </div>
      </div>
      <?php }?>
</div></div>


<?php }} ?>
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