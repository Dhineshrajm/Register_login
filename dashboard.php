<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - Client area</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            margin-top: 50px; /* Add some top margin */
        }

        .form {
            background-color: #fff; /* White background */
            border-radius: 10px; /* Rounded corners */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
        }

        .form p {
            margin-bottom: 10px; /* Add bottom margin to paragraphs */
        }

        .form a {
            color: white; /* Blue color for links */
        }

        .logout-btn {
            background-color: #007bff; /* Red background color */
            color: #fff; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Padding */
            text-decoration: none; /* No underline */
            cursor: pointer; /* Cursor on hover */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .logout-btn:hover {
            background-color: #007bff; /* Darker red color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form">
                    <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
                    <p>Welcome to your dashboard.</p>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
