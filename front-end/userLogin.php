
<?php include('../utilities/dbConnection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
      
        <?php include('../utilities/alert.php') ?>

        <div class="header row justify-content-center">
            <h2>User Log in </h2>
        </div>
        <div class="shadow p-3 mb-5 bg-white rounded"  >
            <form action="../server/server.php" method="post">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email" placeholder="your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="password" placeholder="your password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="login_user"> Log in </button>
                </div>
                <div class="form-group">
                    Not a User <a href="userRegistration.php">Sign up</a>
                </div>
            </form>
            <a class='btn btn-outline-primary' href='restroLogin.php'>login as Restaurants</a>
        </div>
    </div>
</body>
</html>