
<?php include('../utilities/dbConnection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restro Registration</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="./javascript/formValidations.js"></script>
</head>
<body>
    <div class="container">
    
        <?php include('../utilities/alert.php') ?>
      
        <div id='alertDiv' class="alert alert-danger" style="display:none"></div>

        <div class="header row justify-content-center">
            <h2>Restro Register </h2>
        </div>
        <div class="shadow p-3 mb-5 bg-white rounded" >
            <form action="../server/server.php" method="post" onSubmit="return registrationValidation()">
                <div class="form-group">
                    <label for="name">Restro Name: </label>
                    <input type="text" class="form-control" name="name" placeholder="restro's name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email" placeholder="your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="pass1" placeholder="your password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm password: </label>
                    <input type="password" class="form-control" name="pass2" placeholder="confirm password" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="pureVeg">
                    <label class="form-check-label" for="pureVeg">100% veg</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="register_restro"> Register </button>
                </div>
                <div class="form-group">
                    Already registered <a href="restroLogin.php">Log in</a>
                </div>
                <div class="form-group">
                    <a class="btn btn-outline-primary" href="userRegistration.php">Register as user</a>
                </div>
            </form>
            <br>
        </div>
    </div>
</body>
</html>