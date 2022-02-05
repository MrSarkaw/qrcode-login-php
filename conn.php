<?php 
  

try{
    $pdo=new PDO('mysql:host=localhost;dbname=qrcode;charset=utf8;','root','');

    return $pdo;
}
catch(Exception $err){
    echo $err->getMessage();
}


?>