<?php
require_once('persistance/dao/UserDao.php');
require_once('persistance/dao/SubjectDao.php');
require_once('persistance/model/User.php');
require_once('persistance/dto/UserDto.php');
$userDao = new UserDao();
$subjectDao = new SubjectDao();
$user = null;
if (!isset($_COOKIE["id"]) || isset($_POST["submitbutton"])) {
    header("location: login.php");
    die();
} else {
    $user = $userDao->getUserById($_COOKIE["id"]);
}

if (isset($_POST["create_subject_btn"]) && strlen($_POST["name"]) > 0) {
    $subjectDao->createSubject($user->getId(), $_POST["name"]);
}
?>

<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org" xmlns:sec="http://www.thymeleaf.org/thymeleaf-extras-springsecurity3"
      xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        Blog
    </title>

</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<body>


<div>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content"
                    aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="blog.php"">BLOG</a>

            <div>
                <form class="form-inline" method="post">
                    <span class="navbar-text mr-sm-2"><?php echo "Hello, " . $user->getName() . "!" ?></span>
                    <button class="btn btn-outline-success" type="submit" name="submitbutton" value="sign_out">Sign
                        Out
                    </button>
                </form>
            </div>
        </div>
    </nav>

</div>
<div class="container" style="margin-top: 25px;">

    <form class="form-inline" method="post">
        <div class="form-group mb-2">
            Create new subject:
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="sub_name" class="sr-only">Subject Name</label>
            <input type="text" name="name" class="form-control" id="sub_name" placeholder="Subject Name">
        </div>
        <button type="submit" name="create_subject_btn" value="create_subject_bth" class="btn btn-success mb-2">Confirm</button>
    </form>


    <?php
    $subjects = $subjectDao ->getAll();
    foreach ($subjects as $subject){
        echo "<div class=\"card\" style=\"margin-top: 25px;\">";
        echo "<div class=\"card-body\">";
        echo "<h5 class=\"card-title\">" . $subject->getSubjectName() . "</h5>";
        echo "<h6 class=\"card-subtitle mb-2 text-muted\">" . $userDao->getUserById($subject->getUserId())->getName() . " " . $userDao->getUserById($subject->getUserId())->getEmail() . "</h6>";
        echo "<a href=\"subject.php?id=" . $subject->getId() . "\" class=\"card-link\">Read subject</a>";
        echo "</div>";
        echo "</div>";
    }
    ?>

</div>
</body>
</html>