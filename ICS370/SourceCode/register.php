<?php
include 'connection.php';
$conn = createConnection();

$username = $password = $confirmPassword = '';
$usernameError = $passwordError = $confirmPasswordError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username";
    } else {
        $query = 'SELECT id FROM users WHERE username = :username';

        if ($stmt = $conn->prepare($query)) {
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);

            if($stmt->execute()) {
                if($stmt->rowCount() > 0) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "there was a failure, try again at a later time";
            }
        }
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Please create a longer password";
    } else {
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))) {
        $password_err = "please confirm password";
    } else {
        $confirmPassword = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirmPassword)) {
            $confirmPasswordError = "Passwords did not match";
        }
    }

    if (empty($username_err) && empty($password_err) && empty($confirmPasswordError)) {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query("INSERT INTO users (username, password, account_id) VALUES ('" . $username . "', '"
            . password_hash($password, PASSWORD_DEFAULT) . "', 1)");
        header("location: login.php");
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($usernameError)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $usernameError; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($passworderror)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $passwordError; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirmPasswordError)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirmPassword; ?>">
            <span class="help-block"><?php echo $confirmPasswordError; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>
</body>
</html>
