<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Arial, sans-serif; /* Font family */
        }

        .card {
            border: none; /* Remove card border */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Add box shadow */
        }

        .card-title {
            color: #333; /* Card title color */
            font-size: 24px; /* Card title font size */
            margin-bottom: 20px; /* Bottom margin for the card title */
        }

        .form-control {
            border: 1px solid #ccc; /* Input border color */
            border-radius: 5px; /* Input border radius */
            margin-bottom: 20px; /* Bottom margin for inputs */
        }

        .btn-primary {
            background-color: #007bff; /* Button background color */
            border-color: #007bff; /* Button border color */
            border-radius: 5px; /* Button border radius */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Button hover background color */
            border-color: #0056b3; /* Button hover border color */
        }

        .link {
            font-size: 14px; /* Link font size */
        }
    </style> -->
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Login</h1>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
     <form class="form" method="post" name="login">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                        <p class="text-center mt-3">Don't have an account? <a href="registration.php">Registration Now</a></p>
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