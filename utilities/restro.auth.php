<?php 


include('dbConnection.php');


if(isset($_SESSION['user']) and $_SESSION['isRestro']){
}

else{
    array_push($errors,"Login to access this page");
    $_SESSION['msg']=$errors;
    $_SESSION['type']="danger";
    header("location:restroLogin.php");
    exit;
}


if(isset($_GET['logout'])){
    session_unset();
    $_SESSION['msg']="logout successfull";
    $_SESSION['type']="success";
    header('location:restroLogin.php');
    exit;
}
    
?>