<?php
require_once('persistance/dao/UserDao.php');
require_once('persistance/model/User.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
    $user_dao = new UserDao();
//    foreach ($user_dao->getAll() as $user){
//        echo $user->getName();
//        echo $user->getPassword();
//        echo $user->getId();
//        echo $user->getEmail();
//    }

    $userAdd = new User(0, "test", "pass", "sdsdfsdf");
    $user_dao->addUser($userAdd);
    $user = $user_dao->getUserById(1);
    if ($user != null) echo $user->getName();
else echo "nu user with such id"

?>

</body>
</html>