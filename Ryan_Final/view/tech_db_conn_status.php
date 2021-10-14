<?php
session_start();
require_once('../util/security.php');
require_once('../model/database.php');

//confirm user is authorized for the page
Security::checkAuthority('tech');

//user clciked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
//set error reporting to errors only
error_reporting(E_ERROR);

$db = new Database();
?>

<html>
<head>
    <title>Ryan Final Practical</title>
</head>

<body>
    <h1>Ryan Final Practical</h1>
    <h1>Database Connection Statuts</h1>
    <?php if (strlen($db->getDbError())) : ?>
        <ul>
            <li><?php echo "Database Name: " . $db->getDbName(); ?></li>
            <li><?php echo "Database User: " . $db->getDbUser(); ?></li>
            <li><?php echo "Database User Password: " . $db->getDbUserPw(); ?></li>
        </ul>
        <h2><?php echo $db->getDbError(); ?></h2>
    <?php else : ?>
        <ul>
            <li><?php echo "Database Name: " . $db->getDbName(); ?></li>
            <li><?php echo "Database User: " . $db->getDbUser(); ?></li>
            <li><?php echo "Database User Password: " . $db->getDbUserPw(); ?></li>
        </ul>
        <h2><?php echo "successfully connected to " . $db->getDbName(); ?></h2>
    <?php endif; ?>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
    <h3><a href="tech_menu.php">Home</a></h3>
</body>
</html>