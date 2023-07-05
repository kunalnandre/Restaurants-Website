<?php 
    
    include('../utilities/restro.auth.php');
?>

<html>
    <head>
        <title>Restro Home</title>
        <!-- import bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>

    <!-- navigation bar -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="restroOrders.php">Orders</a>
        </li>
        <li class="nav-item">
            <a href="restroHome.php?logout=true" class="btn btn-outline-dark">logout</a>
        </li>
    </ul>

    <div class="container">
        <div class="header row justify-content-center">
            <h2>Menu page - <?php echo $_SESSION['user']; ?> </h2>
        </div>

        <!-- alert for any error or success -->
        <?php include('../utilities/alert.php') ?>

        <!-- display the list of menu items -->
        <?php 
            $restroId=$_SESSION['id'];
            $query="select * from menu where restroId='$restroId'";
            $result=mysqli_query($conn,$query);
        ?>
        <div class="row justify-content-center">
            <table class="table table-hover" >
            <thead class='thead-dark'>
                <tr>
                    <th style="width: 14.28%">Item name</th>
                    <th style="width: 42.85%">Item description</th>
                    <th style="width: 14.28%">Item cost</th>
                    <th style="width: 14.28%">Item type</th>
                    <th style="width: 14.28%">Action</th>
                </tr>
            </thead>
                <?php 
                    while($row=mysqli_fetch_assoc($result)):
                ?>
                <tr>
                        <td> <?php echo $row['itemName']; ?> </td>
                        <td> <?php echo $row['itemDetail']; ?> </td>
                        <td> <?php echo $row['itemCost']; ?> </td>
                        <td> <?php echo $row['itemType']; ?> </td>
                        <td colspan="2">
                            <a href="restroHome.php?edit=<?php echo $row['id']; ?>" class='btn btn-info'>Edit </a>
                            <a href="../server/restro.php?delete=<?php echo $row['id']; ?>" class='btn btn-danger'>Delete </a>
                        </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <!-- edit menu item helper -->
        <?php 
            $itemId=null;
            $currentItemName=null;
            $currentItemDetail=null;
            $currentItemCost=null;
            $currentItemType='veg';
            $update=false;
            if(isset($_GET['edit'])){
                $itemId=$_GET['edit'];
                $query="select * from menu where id='$itemId'";
                $result=mysqli_query($conn,$query);
                $data=mysqli_fetch_assoc($result);
                $currentItemName=$data['itemName'];
                $currentItemDetail=$data['itemDetail'];
                $currentItemCost=$data['itemCost'];
                $currentItemType=$data['itemType'];
                $update=true;
            }
        ?>

        <!-- form to add new menu item -->
        <div class="row justify-content-center">
            <div class="shadow p-3 mb-5 bg-white rounded w-50">
                <div class="header row justify-content-center">
                    <h2>Item details:</h2>
                </div>
                <form action="../server/restro.php" method="post">
                    <input type="hidden" name='itemId' value="<?php echo $itemId; ?>">
                    <div class="form-group">
                        <label for="item name">item name: </label>
                        <input type="text" class="form-control" name="itemname" value="<?php echo $currentItemName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item cost">item cost: </label>
                        <input type="number" name="itemcost" class="form-control" value="<?php echo $currentItemCost; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item details">item description: </label>
                        <textarea name="itemdetail" class="form-control" rows="4" maxlength="1000"><?php echo $currentItemDetail; ?></textarea>
                    </div>
                    <div class="form-group">
                        <?php if(!$_SESSION['isPureVeg']): ?>
                            <input type="radio" name="type" value="veg" <?php if($currentItemType=='veg') echo "checked"; ?>>veg
                            <input type="radio" name="type" value="non veg" <?php if($currentItemType=='non veg') echo "checked"; ?> >non-veg
                        <?php else: ?>
                            <input type="radio" name="type" value="veg" checked>veg
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <?php if($update): ?>
                            <button class="btn btn-primary" type="submit" name="updateitem">Update</button>  
                        <?php else: ?>    
                            <button class="btn btn-primary" type="submit" name="additem">Add item</button>  
                        <?php endif; ?>    
                    </div>
                </form>
            </div>   
        </div>
    </div>
    </body>
</html>