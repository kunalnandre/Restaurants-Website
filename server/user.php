<?php
include('../utilities/dbConnection.php');

if(isset($_POST['orderItem'])){

    if(isset($_SESSION['user']) and !$_SESSION['isRestro']){

        $itemId=mysqli_real_escape_string($conn, $_POST['itemId']);
            $userId=mysqli_real_escape_string($conn, $_POST['userId']);
            $restroId=mysqli_real_escape_string($conn, $_POST['restroId']);
        
            $query="insert into orders (buyerId,sellerId,itemId) values ('$userId','$restroId','$itemId')";
            mysqli_query($conn,$query);
            $_SESSION['msg']="Item ordered";
            $_SESSION['type']='success';
            header('location:../front-end/userHome.php?view='.$restroId);
    }
    else{
        array_push($errors,"Login to order items");
        $_SESSION['msg']=$errors;
        $_SESSION['type']="danger";
        header("location:../front-end/userLogin.php");
    }
    
}

if(isset($_GET['logout'])){

    session_unset();
    $_SESSION['msg']="logout successfull";
    $_SESSION['type']="success";
    header('location:../front-end/userLogin.php');
}

?>