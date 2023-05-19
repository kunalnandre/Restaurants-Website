<?php 

include('dbConnection.php');


if(isset($_SESSION['user']) and !$_SESSION['isRestro']){
}
else{
    array_push($errors,"Login to view this page");
    $_SESSION['msg']=$errors;
    $_SESSION['type']="danger";
    header("location:userLogin.php");
    exit;
}
  
?>