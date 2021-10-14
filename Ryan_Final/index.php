<?php
session_start();
require_once('controller/user.php');
require_once('controller/user_controller.php');
require_once('util/security.php');

Security::checkHTTPS();

//set the message related to login/logout function
$login_mes = isset($_SESSION['logout_mes']) ? $_SESSION['logout_mes'] : '';

if (isset($_POST['email']) & isset($_POST['pw'])) {
    //login and password fields were set
    $user_level = UserController::validUser($_POST['email'], $_POST['pw']);

    if ($user_level === '1')  {
        $_SESSION['admin'] = true;
        $_SESSION['tech'] = false;
        header("Location: view/admin_menu.php");
    } else if ($user_level === '2')  {
        $_SESSION['admin'] = false;
        $_SESSION['tech'] = true;
        header("Location: view/tech_menu.php");
    } else {
        $login_mes = 'Failed Authentication - try again.';
    }
}
?>

<html>
<head>
    <title>Ryan Final Practical</title>
</head>

<body>
    <h1>Ryan Final Practical</h1>
    <h2>Ryan Application Login</h2>
    <form method='POST'>
        <h3>Login ID: <input type="text" name="email"></h3>
        <h3>Password: <input type="password" name="pw"></h3>
        <input type="submit" value="Login" name="login">
    </form>
    <h2><?php echo $login_mes; ?></h2>
</body>
</html>