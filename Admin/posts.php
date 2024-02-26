<?php
   include("config.php");

session_start();
if($_SESSION["user_status"]=='Admin' || $_SESSION["user_status"]=='Moderator'){
    
    $username=$_SESSION["admin_username"];

if(isset($_POST["status_change"])){
   $bookid =$_POST["bookid"];
  # echo $bookid;
   $status = $_POST["status"];
   if($status=="Live"){
   $query="update  `books` set `Status` ='disable' where `Id` ='$bookid'";
       $res = mysqli_query($conn,$query);
       if($res){
           $category = explode(",",$_POST["categories"]);
           foreach($category as $cat){
           $cat_inc="update `Category` set `count` =`count`-1 where `Category`='$cat'";
           $cat_res=mysqli_query($conn,$cat_inc);
           
           }}
   }
   else{
        $query="update  `books` set `Status` ='Live' where `Id` ='$bookid'";  
            $res = mysqli_query($conn,$query);
            if($res){
                           $category = explode(",",$_POST["categories"]);
                         #echo$_POST["categories"] ;
               #  print_r($category) ;
                   foreach($category as $cat){
           $cat_inc="update `Category` set `count` =`count`+1 where `Category`='$cat'";
                      $cat_res=mysqli_query($conn,$cat_inc);
           }
   }}

    
}




if($_SESSION['user_status']=='Admin'){
$query="select * from `books`";
}else{
    $query="select * from `books` where `published_by`='$username'";
}

$res=mysqli_query($conn,$query);

?>


<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AP Coders : Notifications </title>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


</head>
<style>

body{
background:  linear-gradient(lightyellow,lightblue, lightyellow);

}


.nav  li a,ul li a{
  text-decoration: none;
  color: white;
}
.nav li:hover ,.services-footer ul li:hover{
  background-color: lightcyan;
}
.nav-head{
  background-color: lightblue;
}
.services i,#about i{
  font-size: 150px;
  text-align: center;
  margin: 5px;
}

.services-head:after,.aboutus-head:after,.contact-head:after{
  display: block;
  width: 100px;
 margin: 5px auto;
  content: "";
  height: 3px;
  background-color: red;
}
.card:hover{
  background-color: antiquewhite;
}
.book-img{
   width:50px;
   height:100px;
}
fa{
 font-size:25px;
 color:teal;
}
</style>

<body>
<div class=" bg-primary container-fluid header sticky-top shadow-lg">
<div class="row d-flex align-items-center px-2 " style="height: 80px">

<div class="col-md-6 col-10 ">
<p class="lead p-0 m-0 text-dark text-weight-bolder ms-2 ms-md-5  "> AP Coders</p>
</div>


<div class="col-2 col-md-6 ">
<div class="d-flex justify-content-end mr-3 navbar navbar-expand  d-md-none" data-toggle="collapse" data-target="#collapse">

<div class=" navbar-toggler-icon text-bolder text-dark d-flex text-right"></div>
</div>

<ul class="nav nav-inverse d-none d-md-flex">
<li class="nav-item   "><a href="" class="nav-link">Users</a></li>
<li class="nav-item  "><a href="" class="nav-link "> Posts</a></li>
<li class="nav-item   "><a href="" class="nav-link ">Notification</a></li>
<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
</ul>

</div>
</div>
</div>



<div id="collapse" class="collapse bg-primary w-100  px-4 menu navbar-collapse">
<ul class=" nav  d-flex flex-column">

<li class="nav-item   "><a href="" class="nav-link">Users</a></li>
<li class="nav-item  "><a href="" class="nav-link "> Posts</a></li>
<li class="nav-item   "><a href="" class="nav-link ">Notification</a></li>
<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
</ul>
</div>

<div class="container my-5">
<div class="row">
<div class="col-12  d-flex justify-content-center align-items-center">
<h1 class=" text-center text-dark">All Posts
</h1>
</div>
</div>
</div>
<?php if(mysqli_num_rows($res)>=0){?>
<div class="container-fluid">
   <div class="row" >
       <div class="col-12">
           <div class="table-responsive">
               <table class="table bg-transparent text-center  table-hover table-striped ">
                   <thead class="table-dark">
            <tr>
             <th>SR.No</th>
               <th>Book Photo</th>
                            
             <th>Full Name</th>                <th>Categories</th>  
             <th>Book Pdf</th><th>Author</th> <th>Status</th>               
                            <th>Edit</th> 
                       
            </tr>
        </thead>
                           <tbody>
                               <?php 
                               $i=1;
              while($data=mysqli_fetch_assoc($res)){                 ?>
            <tr>
                <td>
                    <?php echo$i; $i++;?>
                    </td>
                                <td>            <img class="book-img" src="uploads/img/<?php echo$data['book_cover_url'];?>" </p></td>                <td>                    <?php echo$data["book_name"];?></td>                <td>                    <?php echo$data["book_category"];?></td>
                         <td>                    <?php echo$data["book_pdf_url"];?></td> 
                                
                                          <td>                                        <?php echo$data["published_by"];
                                         ?></td>
                                        <td>
              
        <form action="" method="post">  
                        <input hidden type="text" name="bookid" value="<?php echo($data['Id']);?>" />
                               <input hidden type="text" name="status" value="<?php echo($data['Status']);?>"/>
                                                    <input hidden type="text" name="categories" value="<?php echo($data['book_category']);?>"/>          
              <button class="btn btn-outline-dark btn-info" type="submit" name="status_change" >
                  <?php echo($data['Status']);?>
                  
              </button>             
                <input  class="btn d-none" name="status_change" type="submit"/></i>
                    
              <!--  <label for="submit" >
              <i class="fa fa-trash m-1"></i> </label>-->
                </form>
                        </td>
                        
                        
                 <td>
        <input hidden type="text" value="<?php echo$data["Id"];?>" />
             <i  class="fa fa-edit m-1"/>
             
   
                        </td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>
</div >
</div>
</div>
<?php } else{
    ?><p class="my-3 alert alert-danger container text-center">You Don't have any Book</p><?php }?>


  <div class="container-fluid bg-primary py-5  mt-5 fade-up animate__animated animate__fadeInDown">
    <div class="row">
      <div class="col-sm-4 d-flex flex-column px-5 text-center ">
        <h2 class="lead  nav-head text-center d-block p-2">Useful Links </h2>
        <ul class="nav nav-hover lead text-white  d-block">

          <li class="nav-item text-white"><a href="#top" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#services" class="nav-link"> Services</a></li>

          <li class="nav-item"><a href="#about" class="nav-link">About Us</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link">Contact Us</a></li>


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

<?php  }else{
header("Location:index.php");
}?>