<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: welcome.php");
    exit;
}

include('connection.php');
$conn = createConnection();

$username = $password = '';
$usernameError = $passwordError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty(trim($_POST['username']))) {
        $usernameError = 'Please enter username';
    } else {
        $username = trim($_POST['username']);
    }

    if (empty(trim($_POST['password']))) {
        $passwordError = 'Please enter password';
    } else {
        $password = trim($_POST['password']);
    }

    if (empty($usernameError) && empty($passwordError)) {
       $query = 'SELECT id, username, password FROM users WHERE username = :username';

       if ($stmt = $conn->prepare($query)) {
           $stmt->bindParam(":username", $paramUsername, PDO::PARAM_STR);

           $paramUsername = $username;

           if ($stmt->execute()) {
               if ($stmt->rowCount() == 1) {
                   if ($row = $stmt->fetch()) {
                       $id = $row['id'];
                       $username = $row['username'];
                       $hashedPassword = $row['password'];
                       $accountType = $row['account_id'];

                       if (password_verify($password, $hashedPassword)) {
                           session_start();

                           $_SESSION['loggedin'] = true;
                           $_SESSION['id'] = $id;
                           $_SESSION['username'] = $username;
                           if ($accountType == 1) {
                               $_SESSION['account_type'] = 'user';
                           } elseif ($accountType == 2) {
                               $_SESSION['account_type'] = 'admin';
                           } else {
                               $_SESSION['account_type'] = 'invalid';
                           }

                           header('location: welcome.php');
                       } else {
                           $passwordError = 'The password you entered does not match';
                       }
                   }
               } else {
                   $usernameError = 'No account found with that username';
               }
           } else {
               echo "Oh shit, stuff broke";
           }

           unset($stmt);
       }
    }

    unset($conn);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($usernameError)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $usernameError; ?></span>
</div>
<div class="form-group <?php echo (!empty($passwordError)) ? 'has-error' : ''; ?>">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
    <span class="help-block"><?php echo $passwordError; ?></span>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Login">
</div>
<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
</form>
</div>
</body>
</html>