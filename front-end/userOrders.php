<?php 
   
    include('../utilities/user.auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="userHome.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">Your orders</a>
    </li>
    <li class="nav-item">
        <a href="../server/user.php?logout=true" class="btn btn-outline-dark" >logout</a>
    </li>
    </ul>
    
    <div class="container"> 
 
        <?php include('../utilities/alert.php'); ?>

       
        <?php 
            $buyerId=$_SESSION['id'];
            $query= "select orders.orderId,restro.name,menu.itemName,orders.status 
            from orders 
            inner join menu on orders.itemId=menu.id 
            inner join restro on orders.sellerId=restro.id 
            where orders.buyerId='$buyerId' 
            order by orders.time desc";
            $result=mysqli_query($conn,$query);
        ?>
        <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Order Id</th>
                <th>Seller</th>
                <th>Item</th>
                <th>Status</th>
            </tr>
        </thead>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                <td><?php echo $row['orderId']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['itemName']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>