<?php
require_once('persistance/dao/UserDao.php');
require_once('persistance/model/User.php');
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userDao = new UserDao();
    $user = $userDao->getUserByEmail($_POST["email"]);
    if ($user === null) {
        $error_message = "Email or password are wrong";
    } else {
        if ($user->getPassword() != $_POST["password"]){
            $error_message = "Email or password are wrong";
        } else {
            setcookie("id", $user->getId(), time() + 60 * 60);
            header("location: blog.php");
            die();
        }
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

<div class="container" style="margin-top: 125px;">
    <p class="text-center h1">Sign in</p>
    <form action="login.php" method='POST'>
        <div class="form-group">
            <label for="InputEmail">Email address</label>
            <input type="text" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                   placeholder="Enter email"/>
        </div>
        <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="InputPassword"
                   placeholder="Password"/>
        </div>
        <button type="submit" style="margin-bottom: 25px;" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if ($error_message != ""){
       echo "<div class=\"alert alert-danger\" role=\"alert\">$error_message</div>";
    }
    ?>

<!--    <div th:if="${param.logout}" class="alert alert-success" role="alert">-->
<!--        You have been logged out!-->
<!--    </div>-->

    <a href="registration.php">Registration</a>
</div>


</body>
</html>
