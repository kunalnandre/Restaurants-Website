<?php 
  
    include('../utilities/dbConnection.php');
?>

<html>
    <head>
        <title>user home page</title>
  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <script src="./javascript/preference.js"></script>
    </head>
    <body>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="userOrders.php">YOUR ORDERS</a>
        </li>
     
        <li class="nav-item">
            <?php if(isset($_SESSION['user']) and !$_SESSION['isRestro']): ?>
                <a href="../server/user.php?logout=true" class="btn btn-outline-dark" >LOGOUT</a>
            <?php else: ?>
                <a href="userLogin.php" class="btn btn-outline-primary" >Sign In</a>
            <?php endif; ?>  
        </li>
    </ul>

    <div class="container">
        <div class="header row justify-content-center">
            <h2>Menu Page For <?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?> </h2>
        </div>

    
        <?php include('../utilities/alert.php') ?>

        <?php 
            $query="select * from restro";
            $result=mysqli_query($conn,$query);
        ?>
        <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th style="width: 60%">RESTAURANTS NAME</th>
                <th style="width: 20%"></th>
                <th style="width: 20%">ACTION</th>
            </tr>
        </thead>
            <?php
                while($row=mysqli_fetch_assoc($result)):
            ?>
            <tr>
                    <td> <?php echo $row['name']; ?> </td>
                    <td> <?php if($row['isPureVeg']) echo "100% veg"; ?> </td>
                    <td><a href="userHome.php?view=<?php echo $row['id']; ?>" class='btn btn-primary'>view menu</a></td>
            </tr>
                <?php endwhile; ?>
        </table>
        
   
        <?php if(isset($_GET['view'])): ?>
        <div>
            <?php 
                $restroId=$_GET['view'];
                $query="select * from menu where restroId='$restroId'";
                $result=mysqli_query($conn,$query);
            ?>

            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" <?php if( isset($_SESSION['preference']) and $_SESSION['preference']=='non veg') echo 'checked'; ?> onclick="togglePreference()" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Include non-veg</label>
            </div>
            <table class="table table-hover">
            <thead class="thead-dark">
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
                        if($row['itemType']=='veg'):
                ?>
                <tr id="veg">
                        <td> <?php echo $row['itemName']; ?> </td>
                        <td> <?php echo $row['itemDetail']; ?> </td>
                        <td> <?php echo $row['itemCost']; ?> </td>
                        <td> <?php echo $row['itemType']; ?> </td>
                        <td>
                            <form action="../server/user.php" method="post">
                                <input type="hidden" name="userId" value="<?php echo $_SESSION['id']; ?>">
                                <input type="hidden" name="restroId" value="<?php echo $restroId; ?>">
                                <input type="hidden" name="itemId" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-primary" name="orderItem" >Order</button>
                            </form>
                        </td>
                </tr>
                <?php else: ?>
                <tr class="non-veg" style="display:none">
                        <td> <?php echo $row['itemName']; ?> </td>
                        <td> <?php echo $row['itemDetail']; ?> </td>
                        <td> <?php echo $row['itemCost']; ?> </td>
                        <td> <?php echo $row['itemType']; ?> </td>
                        <td>
                            <form action="../server/user.php" method="post">
                                <input type="hidden" name="userId" value="<?php echo $_SESSION['id']; ?>">
                                <input type="hidden" name="restroId" value="<?php echo $restroId; ?>">
                                <input type="hidden" name="itemId" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-primary" name="orderItem" >Order</button>
                            </form>
                        </td>
                </tr>
                <?php endif; ?>
                    <?php endwhile; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    </body>
</html>