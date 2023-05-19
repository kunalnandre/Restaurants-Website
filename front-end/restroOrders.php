<?php 
   
    include('../utilities/restro.auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Orders</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
 
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="restroHome.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">Orders</a>
    </li>
    <li class="nav-item">
        <a href="restroHome.php?logout=true" class="btn btn-outline-dark">logout</a>
    </li>
    </ul>
    
    <div class="container"> 
       
        <?php include('../utilities/alert.php'); ?>

        <div class="header row justify-content-center">
            <h2>Your orders </h2>
        </div>

        
        <?php 
            $restroId=$_SESSION['id'];
            $query= "select orders.orderId,orders.buyerId,users.name,menu.itemName,orders.status 
            from orders 
            inner join menu on orders.itemId=menu.id 
            inner join users on orders.buyerId=users.id
            where orders.sellerId='$restroId' 
            order by orders.time desc";
            $result=mysqli_query($conn,$query);
        ?>
        <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Order Id</th>
                <th>Buyer Id</th>
                <th>Buyer Name</th>
                <th>Item</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                <td><?php echo $row['orderId']; ?></td>
                <td><?php echo $row['buyerId']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['itemName']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php if($row['status']=='ordered'): ?>
                        <a class="btn btn-primary" href="../server/restro.php?deliver=<?php echo $row['orderId']; ?>">Deliver</a>
                    <?php else: ?>
                        <a class="btn btn-secondary">Deliver</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>