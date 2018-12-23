<?php
require_once('persistance/dao/UserDao.php');
require_once('persistance/model/User.php');
require_once('persistance/dto/UserDto.php');

$email_error_msg = "";
$user_error_msg = "";
$password_error_msd = "";
$passwords_error_msg = "";
$is_valid = true;
$userDao = new UserDao();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validate();
    if ($is_valid) {
        $user = new UserDto($_POST["name"], $_POST["email"], $_POST["password"], $_POST["confPassword"]);
        $userDao -> addUser($user);
        header("location: login.php");
        die();
    }
}

function validate(){
    if (strlen($_POST["name"]) < 5) {
        global $is_valid, $user_error_msg;
        $is_valid = false;
        $user_error_msg = "User name must contain at least 5 letters";
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        global $is_valid, $email_error_msg;
        $email_error_msg = "Email is not valid";
        $is_valid = false;
    }

    global $userDao;
    $queried_user = $userDao -> getUserByEmail($_POST["email"]);
    if ($queried_user != null) {
        global $is_valid, $email_error_msg;
        $email_error_msg = "User with such email exists";
        $is_valid = false;
    }

    if (strlen($_POST["password"]) < 8) {
        global $is_valid, $password_error_msd;
        $password_error_msd = "Password length must be greater than 8 letters";
        $is_valid = false;
    }

    if ($_POST["password"] != $_POST["confPassword"]){
        global $is_valid, $passwords_error_msg;
        $is_valid = false;
        $passwords_error_msg = "Passwords don't match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body>


<div class="container" style="margin-top: 25px;">

    <p class="text-center h1">Registration</p>
    <form method="POST" enctype="utf8" action="registration.php">
        <div class="form-group">
            <label for="inputName">User name</label>
            <input name="name" id="inputName" class="form-control" placeholder="Input first name" value="<?php echo $_POST["name"]?>"/>
            <?php
            if ($user_error_msg != ""){
                echo "<p class=\"form-text text-danger\">$user_error_msg</p>";
            }
            ?>
        </div>
        <div class="form-group">
            <label for="inputEmail">E-mail</label>
            <input name="email" type="text  " id="inputEmail" class="form-control" placeholder="Input email" value="<?php echo $_POST["email"]?>"/>
            <?php
            if ($email_error_msg != ""){
                echo "<p class=\"form-text text-danger\">$email_error_msg</p>";
            }
            ?>
        </div>
        <div class="form-group">
            <label for="inputPass1">Password</label>
            <input name="password" type="password" id="inputPass1" class="form-control" placeholder="Input password" value="<?php echo $_POST["password"]?>"/>
            <?php
            if ($password_error_msd != ""){
                echo "<p class=\"form-text text-danger\">$password_error_msd</p>";
            }
            ?>
        </div>
        <div class="form-group">
            <label for="inputPass2">Confirm Password</label>
            <input name="confPassword" type="password" id="inputPass2" class="form-control" placeholder="Confirm password" value="<?php echo $_POST["confPassword"]?>"/>
            <?php
            ?>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 25px;">Register</button>
    </form>
</div>
</body>
</html>
