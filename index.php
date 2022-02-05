<!DOCTYPE html>
<?php
include 'conn.php';
session_start();

if(isset($_SESSION['stagename'])){
 header('Location: path/login.php');
}
?> 
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
</head>
<body class="bg-dark text-light">
    
    <div class="col-12 col-sm-6 col-md-3 mx-auto mt-5 bg-dark rounded p-5" 
    style="margin-top:180px !important; box-shadow:0px 0px 10px 1px black inset;">
    


    <!-- register-->
        <div class="modal faded" id="reg">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="header bg-dark ">
                        <p class="text-center pt-3">register</p>
                    </div>

                    <div class="modal-body bg-dark">
                    <form action="" method="post">
                        <div class="input-group">
                         <input class="form-control" type="text" name="qrcode" placeholder="">
                         <div class="input-group-append">
                        <span class="input-group-text" id="my-addon">satge-name</span>
                 </div>
            </div>
            
            <div class="form-group mt-3">
                <label for="my-select">choose name of department</label>
                <select id="my-select" class="custom-select" name="depname">
                   <?php

                        $stmt=$pdo->prepare('select * from dep');
                        $stmt->execute();
                        foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $row){
                            echo "<option value = ",$row->id,">",$row->dep_name,"</option>";
                        }
                   
                   ?>
                </select>
            </div>

            <button class="btn btn-success btn-block mt-2" name="CreateQrcode">Create account</button>
                           
                            </form>

                    </div>
                </div>
            </div>
        </div>



<!--login-->


<form method="post" enctype="multipart/form-data">


        <div class="custom-file mt-2">
            <input id="my-input" class="custom-file-input" type="file" name="image">
            <label for="my-input" class="custom-file-label">choose qrCode</label>
        </div>



            <button class="btn btn-primary btn-block mt-2" name="login">login</button>
            <p class="text-primary mt-3" data-target="#reg" data-toggle="modal">create account</p>

        </form>

    </div>

    <?php
include('phpqrcode/qrlib.php');
include('qrReader/lib/QrReader.php');
include('vendor/autoload.php');


        if(isset($_POST['login'])){
                $path="qrcodes/";
                if(!$_FILES["image"]['name']){
                    echo "<div class='col-sm-12 alert alert-warning text-center'>image is empty</div>'";
                }
                else {

                
                $target='qrcodes/'.basename($_FILES['image']['name']);
                $image_name=$_FILES['image']['name'];


                move_uploaded_file($_FILES['image']['tmp_name'],$target);

                $qrcode = new Zxing\QrReader($path.$image_name);

                if($qrcode->text()==''){
                    echo "<div class='alert alert-danger text-center mt-2'>its not qrcode</div>";
                }
                else {

                    $name=$qrcode->text();
                
                    $login=$pdo->prepare('select * from stage where n_stage = :name');
                    $login->execute(array(':name'=>$name));
                      
                    if($login->fetchColumn()>0){
                            $_SESSION['stagename']=$name;
                            header('Location: path/login.php');
                        }

                        else {
                            echo "<div class='alert alert-danger col-sm-12 text-center mt-2'>qrCode is worng</div>";
                        }

                }
            }
                
        

             

      




        }
     








  
      if(isset($_POST['CreateQrcode'])){
      $tempDir = 'qrcodes/';
      

      $name=htmlspecialchars($_POST["qrcode"]);
      $dep_id=htmlspecialchars($_POST["depname"]);
      $codeContents =$name;
      
      // we need to generate filename somehow, 
      $fileName =$codeContents.'.png';
      
      $pngAbsoluteFilePath = $tempDir.$fileName;
      $urlRelativeFilePath = $tempDir.$fileName;
      
      $stmt=$pdo->prepare('insert into stage (dep_id,n_stage) values(:id,:name)');
      $stmt->execute(array(':id'=>$dep_id,':name'=>$name));


          QRcode::png($codeContents, $pngAbsoluteFilePath);
          echo '<div class="col-12 mt-5 col-sm-6 mx-auto alert alert-success">your account is created</div>';
          echo '<hr />';    
          echo '<div class="col-sm-5 mx-auto"><center><img src="'.$urlRelativeFilePath.'" /></center></div>';


     

    }
    
      
           ?>

</body>
</html>