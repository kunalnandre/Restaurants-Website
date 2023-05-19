<?php 


include("../utilities/dbConnection.php");


if(isset($_POST['additem'])){


    $itemname=mysqli_real_escape_string($conn, $_POST['itemname']);
    $itemdetail=mysqli_real_escape_string($conn, $_POST['itemdetail']);
    $itemcost=mysqli_real_escape_string($conn, $_POST['itemcost']);
    $itemtype=mysqli_real_escape_string($conn, $_POST['type']);
    $restroid=$_SESSION['id'];

    
   
    if(empty($itemname)) {array_push($errors,"item name is required");}
    if(empty($itemcost)) {array_push($errors,"item cost is required");}

    
    if(count($errors)==0){
  
        $query= "insert into menu (itemName, itemDetail , itemCost, itemType, restroId) values ('$itemname','$itemdetail','$itemcost','$itemtype','$restroid')";
        mysqli_query($conn,$query);
        $_SESSION['msg']="Item added to your menu";
        $_SESSION['type']='success';
        header('location:../front-end/restroHome.php');
    }
  
    else{
        $_SESSION['msg']=$errors;
        $_SESSION['type']='danger';
        header('location:../front-end/restroHome.php');
    }

}


if(isset($_GET['delete'])){
  
    $id=$_GET['delete'];
    
  
    $query="delete from menu where id='$id'";
    mysqli_query($conn,$query);

    
    $_SESSION['msg']="Item deleted from your menu";
    $_SESSION['type']='danger';
    header('location:../front-end/restroHome.php');
}


if(isset($_POST['updateitem'])){

    $itemid=$_POST['itemId'];
    $itemname=mysqli_real_escape_string($conn, $_POST['itemname']);
    $itemdetail=mysqli_real_escape_string($conn, $_POST['itemdetail']);
    $itemcost=mysqli_real_escape_string($conn, $_POST['itemcost']);
    $itemtype=mysqli_real_escape_string($conn, $_POST['type']);

    
    
    if(empty($itemname)) {array_push($errors,"item name is required");}
    if(empty($itemcost)) {array_push($errors,"item cost is required");}

    
    if(count($errors)==0){
      
        $query= "update menu set itemName='$itemname',itemDetail='$itemdetail' ,itemCost='$itemcost', itemType='$itemtype' where id='$itemid'";
        mysqli_query($conn,$query);
        $_SESSION['msg']="Item updated";
        $_SESSION['type']='success';
        header('location:../front-end/restroHome.php');
    }
   
    else{
        $_SESSION['msg']=$errors;
        $_SESSION['type']='danger';
        header('location:../front-end/restroHome.php');
    }
}


if((isset($_GET['deliver']))){

  
    $orderId=$_GET['deliver'];


    $query="update orders set status='delivered' where orderId='$orderId'";
    mysqli_query($conn,$query);
    $_SESSION['msg']="item delivered";
    $_SESSION['type']='success';
    header('location:../front-end/restroOrders.php');
}