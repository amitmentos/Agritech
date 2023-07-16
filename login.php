<?php
    // include 'db.php';
    include 'config.php';
    session_start();
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
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login Page</title>
        <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link href="css/styleLog.css" rel="stylesheet"> 
</head>
<body>
    <div class="logIn_main">
        <h1 class="mb-4">Login</h1>
        <form action="#" method="post" id="frm">
            <div class="mb-3">
                <label for="loginMail" class="form-label">Email:</label>
                <input type="email" class="form-control" name="loginMail" id="loginMail" placeholder="Enter email"
                    required>
            </div>
            <div class="mb-3">
                <label for="loginPass" class="form-label">Password:</label>
                <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Enter Password"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Log Me In</button>
            <?php if (isset($message)): ?>
            <div class="error-message mt-3"><?php echo $message; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>