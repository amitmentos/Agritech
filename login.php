<?php
    include 'config.php';
    session_start();
    if(!empty($_SESSION["user_id"])){
        session_destroy();
    }
    
    if(!empty($_POST["loginMail"])){
        $query  = "SELECT * FROM tbl_229_users 
        WHERE email='" . $_POST["loginMail"] 
        . "'and password = '" 
        . $_POST["loginPass"] . "'";

        $result = mysqli_query($connection , $query);
        $row    = mysqli_fetch_array($result); 

        if(is_array($row)) {
            $_SESSION["user_id"] = $row['ID'];
            $_SESSION["user_type"] = $row['user_type'];
            $_SESSION["user_img"] = $row['profile_url'];
            $_SESSION["login"] = true;
            header('Location: ' . URL . 'index.php');
        } else {
            $message = 'invail username or password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login Page</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="logIn_page">
        <div class="logo">
            <a href="login.php" class="logo-link" title="logo"></a>
        </div> 
    <div class="logIn_form">
        <h1 class="mb-4">Login</h1>
        <form action="#" method="post" id="frm">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address:</label>
                <input type="email" class="form-control" name="loginMail" id="loginMail" placeholder="email" required>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password:</label>
                <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>

