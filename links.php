<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 5 Simple Admin Dashboard</title>
  <link rel="stylesheet" href="res/bootstrap@5.2.0.min.css">
  <link rel="stylesheet" href="res/chartist.min.css">
  <link rel="stylesheet" href="res/font-awesome-4.7.0/css/font-awesome.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <style>
    * {
      text-align: center;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(lightyellow, lightblue);
    }

    .my-hover {
      cursor: pointer;
      animation: fade 5s alternate;
    }
.btn-warning{
   animation: fade 3s infinite;
}
@keyframes fade{
  0%{
   opacity: 0;
  }
  50%{
    opacity: 0.5;
  }
  100%{
   opacity:1; 
  }
}
    .my-hover:hover {
      color: black;
      font-weight: bolder;
      font-style: italic;
    }
    
    

    @media (min-width:400px) {
      .profile-photo {
        width: 250px;
        height: 250px;
        font-size: 150px;
        color: blue;
        border: 2px solid black;
        border-radius: 50%;
      }
    }

    @media (max-width:400px) {
      .profile-photo {
        width: 150px;
        height: 150px;
        font-size: 90px;
        color: blue;
        border: 2px solid black;
        border-radius: 50%;
      }
    }

    i {
      color: blue;
    }

    .fa-bel {
      font-size: 50px;
      position: absolute;
      right: 0px;
      top: 0;
      margin-right: -5px;
      margin-top: -5px;
      color: black;
    }
    .container {
      max-width:720px ; 
    }
  </style>

</head>

<body>
  <div class="container my-3 my-md-5 lead">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <div class="profile-photo m-1 text-center">
          <i class="fa fa-camera"></i>
        </div>
      </div>
    </div>
  </div>


  <div class="container my-3 p-1 lead">
    <div class="row border border-primary my-hover m-1 m-md-4 d-flex justify-content-center align-items-center" style="height: 60px">
      <div class="col-3 col-md-4">
        <i style="font-size: 50px" class="fa fa-facebook m-0 p-0"></i>
      </div>
      <div class="col-9 col-md-6 m-0 p-0">
        <p class="m-0 p-0">AP Coders Facebook Group </p>
      </div>
    </div>

  </div>

  <div class="container my-3 p-1 lead ">
    <div class="row border border-primary m-1 m-md-4 d-flex justify-content-center align-items-center my-hover" style="height: 60px">
      <div class="col-3 col-md-4">
        <i style="font-size: 50px" class="fa fa-instagram m-0 p-0"></i>
      </div>
      <div class="col-9 col-md-6 m-0 p-0">
        <p class="m-0 p-0">AP Coders Instagram Group </p>
      </div>
    </div>

  </div>


  <div class="container my-3 p-1 lead">
    <div class="row border border-primary my-hover m-1 m-md-4 d-flex justify-content-center align-items-center" style="height: 60px">
      <div class="col-3 col-md-4">
        <i style="font-size: 50px" class="fa fa-whatsapp m-0 p-0"></i>
      </div>
      <div class="col-9 col-md-6 m-0 p-0">
        <p class="m-0 p-0">AP Coders WhatsApp Group </p>
      </div>
    </div>

  </div>

  <div class="container my-3 p-2 lead">
    <div class="row border border-primary my-hover m-1 m-md-4 d-flex justify-content-center align-items-center" style="height: 60px">
      <div class="col-3 col-md-4">
        <i style="font-size: 50px" class="fa fa-telegram m-0 p-0"></i>
      </div>
      <div class="col-9 col-md-6 m-0 p-0">
        <p class="m-0 p-0">AP Coders Telegram Group </p>
      </div>
    </div>

  </div>

  <div class="container my-3 p-1 lead">
    <div class="row border border-primary my-hover m-1 m-md-4 d-flex justify-content-center align-items-center" style="height: 60px">
      <div class="col-3 col-md-4">
        <i style="font-size: 50px" class="fa fa-twitter m-0 p-0"></i>
      </div>
      <div class="col-9 col-md-6 m-0 p-0">
        <p class="m-0 p-0">AP Coders Twitter Group </p>
      </div>
    </div>

  </div>

  <div class="container my-3 p-2 lead" >
    <div class="row border border-primary my-hover m-1 m-md-4 d-flex justify-content-center align-items-center" style="height: 60px">
      <div class="col-3 col-md-4">
        <i style="font-size: 50px" class="fa fa-github m-0 p-0"></i>
      </div>
      <div class="col-9 col-md-6 m-0 p-0">
        <p class="m-0 p-0">AP Coders GitHub Community </p>
      </div>
    </div>

  </div>

  <div class="fa-bel">
    <img width="100" height="100" class="fa-bel" src="bell.gif" />
    <!-- <i  class=" fa fa-bell"></i>-->
  </div>

  <div class="container-fluid bg-primary text-center text-white mt-3 p-2">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="lead">Make Your New Collection Of Social Links<br /><span onclick="alert('Welcome to AP Coders Link collection farm')" class="btn btn-warning">
              Get Started</span></p>
          <p>Copyright &copy; AP Coders 2022-23<br />All Rights Are Reserved </p>

        </div>
      </div>
    </div>
  </div>
</body>

</html>