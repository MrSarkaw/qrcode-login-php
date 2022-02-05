<?php
session_start();

if(!isset($_SESSION["stagename"])){
    header('Location: ../index.php');
}

if(isset($_POST['logout'])){
    session_destroy();
    header('Location: ../index.php');
}


?>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled and minifitied CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>login</title>

   <style>
   body{
       font-family:"NRT";
   }
   @font-face{
       src:"../font/NRT.ttf",
       font-family:"NRT"
   }
   .box-post{
       border:1px solid #417bff;
       transition:.6s;
       
   }
   .box-post:hover{
       background-color:#417bff !important;
   }
   p , button , img{
       transition:.6s;
   }
   .box-post:hover p.h4 {
    color:#34393f !important;
    
   }
   .box-post:hover button{
    background:#34393f !important;
   }
   .box-post:hover img{
    border-radius:10px !important;
    transform:translateY(-30px);
   }
   </style>


</head>
<body class="bg-dark">
 

<form action="" method="post">
 <button class="btn btn-outline-primary btn-block" name="logout">
    <i class="fa fa-sign-out h2"></i>
 </button>
 </form>
   <div class="col-12 bg-dark border border-primary text-center h4 p-3 text-primary">// مامۆستایانی به‌شی </div>
<div class="row col-12 mx-auto p-5">
         
      
            <div class="card col-12 col-sm-6 col-md-4 col-lg-3  p-3 box-post bg-dark mt-2 ">

                    <img class="card-img-top rounded-circle border border-primary mx-auto d-block"
                                    src="../image/09aea00fc018749c1c255ddfd594b218.jpeg" alt="" style="width:100px;height:100px">
                                    <p class="h4 text-center text-primary mt-3">Sarkaw Salar</p>
                                    <p class="h5 text-center text-light">web programing</p>
                        <button class="btn btn-primary mx-auto" data-target="#modalfeed" data-toggle="modal">FeedBack</button>
             </div>



              <div class="card col-12 col-sm-6 col-md-4 col-lg-3  p-3 box-post bg-dark mt-2 ">

                    <img class="card-img-top rounded-circle border border-primary mx-auto d-block"
                                    src="../image/09aea00fc018749c1c255ddfd594b218.jpeg" alt="" style="width:100px;height:100px">
                                    <p class="h4 text-center text-primary mt-3">Sarkaw Salar</p>
                                    <p class="h5 text-center text-light">web programing</p>
                        <button class="btn btn-primary mx-auto" data-target="#modalfeed" data-toggle="modal">FeedBack</button>
             </div>



              <div class="card col-12 col-sm-6 col-md-4 col-lg-3  p-3 box-post bg-dark mt-2 ">

                    <img class="card-img-top rounded-circle border border-primary mx-auto d-block"
                                    src="../image/09aea00fc018749c1c255ddfd594b218.jpeg" alt="" style="width:100px;height:100px">
                                    <p class="h4 text-center text-primary mt-3">Sarkaw Salar</p>
                                    <p class="h5 text-center text-light">web programing</p>
                        <button class="btn btn-primary mx-auto" data-target="#modalfeed" data-toggle="modal">FeedBack</button>
             </div>



              <div class="card col-12 col-sm-6 col-md-4 col-lg-3  p-3 box-post bg-dark mt-2 ">

                    <img class="card-img-top rounded-circle border border-primary mx-auto d-block"
                                    src="../image/09aea00fc018749c1c255ddfd594b218.jpeg" alt="" style="width:100px;height:100px">
                                    <p class="h4 text-center text-primary mt-3">Sarkaw Salar</p>
                                    <p class="h5 text-center text-light">web programing</p>
                        <button class="btn btn-primary mx-auto" data-target="#modalfeed" data-toggle="modal">FeedBack</button>
             </div>

     
</div>






<!-- modalaka -->
   <div class="modal fade" id="modalfeed">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <p class="h4 text-center">feedback</p>
                </div>

                <div class="modal-body">
                    <!-- lera formaka drws ka -->
                </div>

                <div class="modal-footer">

                    <button class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <button class="btn btn-outline-success" data-dismiss="modal"><i class="fa fa-send"></i></button>

                </div>

            </div>
        </div>
   </div>




    </body>