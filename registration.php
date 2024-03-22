<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Custom styles (if needed) */
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Registration</h1>
                    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $mobile = stripslashes($_REQUEST['mobile']);
        $mobile = mysqli_real_escape_string($con, $mobile);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        // Check if the email already exists in the database
        $email_query = "SELECT * FROM `users` WHERE email='$email'";
        $email_result = mysqli_query($con, $email_query);
        $email_rows = mysqli_num_rows($email_result);
        
        if ($email_rows > 0) {
            echo "<div class='form'>
                  <h3>Email address already exists. Please use a different email.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                  </div>";
        } else {
            $create_datetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `users` (username, mobile, email, password, create_datetime)
                         VALUES ('$username', '$mobile', '$email', '" . md5($password) . "', '$create_datetime')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
            }
        }
    } else {
?>

        <form class="form" action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
        </form>
        <?php
        }
        ?>
    </div>
</div>
</div>
</div>
</div>
<!-- Bootstrap JS (Optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
