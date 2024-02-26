<?php 
session_start();

if(isset($_SESSION["admin_username"]) && $_SESSION["user_status"] != "User"){


   include("config.php");
   
   if(isset($_POST["add_category"])){
      $category_message="";
  $msg_type=1;
    $category = $_POST["category"];
    
    $query="insert into `Category` (`Category`) values('$category')";
    
    $res=mysqli_query($conn,$query);
    
    if($res){
        $category_message="Category Added";
        $msg_type=1;
    }else{
        $category_message="Category Not Added".mysqli_error($conn);
        $msg_type=0;
    }
}
else if(isset($_POST["submit"])){
       include("config.php");
    $post_message="";
    $postmsg_type=1;
    
    $ebook_name=$_POST["bookname"];
   
    //PDF PHOTOS 
    $categories = implode(",",$_POST["categories"]);
   
   $pdffile =$_FILES["pdfimg"];
   $pdfimg_name = $pdffile["name"];
   $tmp_path=$pdffile["tmp_name"];
   $fileExt = explode('.',$pdfimg_name);
   $fileActualExt = strtolower(end($fileExt));
  
    //PDF File 
   $bookpdf = $_FILES["bookpdf"];
   $bookpdf_name=$bookpdf["name"]; 
   $bookpdf_tmp_path= $bookpdf["tmp_name"];
   
      $fileExt = explode('.',$bookpdf_name);
   $pdfActualExt = strtolower(end($fileExt));
   
   
  $img_destination = "uploads/img/".$ebook_name.".".$fileActualExt;
  $pdf_destination = "uploads/pdf/".$ebook_name.".".$pdfActualExt;
  $pdfname=$ebook_name.".".$pdfActualExt;
  $rid = rand();
  $id =md5($rid);
 if(move_uploaded_file($bookpdf_tmp_path,$pdf_destination)){
     
  
   if( move_uploaded_file($tmp_path,$img_destination) ){
       $author=$_SESSION["admin_username"];
       $query="INSERT INTO `books`(`Id`,`book_cover_url`,`book_name`,`book_category`,`book_pdf_url`,`published_by`) VALUES('$id','$ebook_name.$fileActualExt','$ebook_name','$categories','$pdfname','$author')";
       $res=mysqli_query($conn,$query);
       if($res){
        foreach($_POST['categories'] as $cat){
           $cat_inc="update `Category` set `count` =`count`+1 where `Category`='$cat'";
           $cat_res=mysqli_query($conn,$cat_inc);
           if($cat_res){
              echo("Uploaded" );
           }
           else{
                         echo("Server Error : 500".mysqli_error($conn)); 
           }
        }
      
       }
       else{
           echo("Server Error : 500".mysqli_error($conn));
       }
  }
  else{
      echo("Not Uploaded");
  }
 }
  else{
      echo("PDF Not Upload ");
  }
   
}
else{
}
?>

<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AP Coders : Admin Dashboard </title>

<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.custom-file label{
   text-align:center; 
}
.fa-upload{
   font-size:80px;
   text-align:center;
}
#output{
   display:none; 
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
.carousel{
  border: 2px solid black;
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

<!-- Add Category-->
<div class="container">
<form action="" method="post">
<p class="my-3 alert <?php if($msg_type==1){echo('alert-success');}else{echo('alert-dander');}?>"><?php echo $category_message ?></p>

<div class="form-group my-3">
            <label class="sr-only form-label">Add Category</label>
       
       
            <input placeholder="Add Category" type="text" name="category" class="form-control ">
          </div>
    
<input type="submit" name="add_category" class="btn btn-primary m-3" value="Add Category"/>
</form>
</div>


<!-- Add Post Section -->

<form action="" method="post" enctype="multipart/form-data">
    
  <div id="contact" class="container-fluid bg-white my-5  contact ">
    <div class="container shadow-lg p-">
      <div class="row py-4">
        <h1 class="h1 contact-head text-center my-5">Add Post</h1>
        <div class="col-md-6">
                
      <div class="text-center d-flex justify-content-center flex-column ">
     <img style="margin:0px auto" class="text-center my-3" id="output" src="" width="150" height="200" >
          
  <input accept="image/*" type="file" id="bookpdf" name="pdfimg" onchange="inputchange(this)" class="d-none"/>
   
    <label for="bookpdf" class="custom-file-label text-center"><i class="fa fa-upload"></i> </label>
</div>  

          <div class="form-group my-3">
            <label class="sr-only form-label">Book Name :</label>
            <input placeholder="Book Name" name="bookname" type="text" class="form-control ">
          </div>
          
                    <div class="form-group my-3">



<?php 

$query="select * from `Category`";
$res = mysqli_query($conn,$query);
while($data=mysqli_fetch_assoc($res)){
?>
            <div class="form-check">
              <input  name="categories[]" type="checkbox"   value="<?php echo$data["Category"]; ?>"
              class="form-check-input ">
              <label class=" form-check-label"
              
              >
                  <?php echo$data["Category"]; ?>
                  </label>
              </div>
              <?php } ?>
           </div>
 <!--           <div class="form-check">

              <input name="res" placeholder="Full Name" type="radio" class="form-check-input ">
              <label class=" form-check-label">Issue</label>
            </div>
            <div class="form-check">

              <input name="res" placeholder="Full Name" type="radio" class="form-check-input ">
              <label class=" form-check-label">Feedback</label>
            </div>
          </div>
  -->       
         
         
 <!--         <div class="form-group my-3">
            <label class="sr-only form-label">Book </label>
            <input placeholder="Phone Number" type="text" class="form-control ">
          </div>
          <div class="form-group my-3">
            <label class="sr-only form-label">Email</label>
            <input placeholder="Email" type="text" class="form-control ">
          </div>
          <div class="form-group">
            <textarea placeholder="Write Here" class="form-control my-3" rows="3"></textarea>

          </div>

-->

        </div>
       <div class="col-md-6 ">
         <input accept="application/pdf" type="file" id="bookpdf" name="bookpdf"  class=""/>
   
 
        <input type="submit" name="submit" class="btn w-100 btn-outline-info my-4">

          <div class=" social-icons  text-center">
            <button class="btn btn-outline-info"><i class="fa fa-facebook"></i></button>
            <button class="btn btn-outline-info"><i class="fa fa-github"></i></button>
            <button class="btn btn-outline-info"><i class="fa fa-google"></i></button>
            <button class="btn btn-outline-info"><i class="fa fa-twitter"></i></button>
          </div>

        </div>

      </div>
    </div>
  </div>

</form>



<!-- Footer Section -->

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
        <p class="lead nav-head p-2">Our Services</p>
        <ul class="list-unstyled lead py-2">
          <li class="py-2"><a href="#web">Web Development</a></li>
          <li class="py-2"><a href="#android">Android Development</a></li>
          <li class="py-2"><a href="#cyber">Cyber Security</a></li>
          <li class="py-2"><a href="#node">Node Js Development</a></li>
          <li class="py-2"><a href="#python">Python Programming</a></li>
          <li class="py-2"><a href="#java">Java Programming</a></li>
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
 <script>
 var bookimg = document.getElementById("output");
     var inputchange =(th)=>{
       bookimg.style.display="flex";
       bookimg.src=window.URL.createObjectURL(th.files[0]);
       
     }
 </script> 
</body>
</html>

<?php
}
else{
 header("Location:index.php");   
}
?>