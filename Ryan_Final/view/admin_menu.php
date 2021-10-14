<?php
session_start();
require_once('../util/security.php');

//confirm user is authorized for the page
Security::checkAuthority('admin');

//user clciked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
?>
<html>
<head>
    <title>Ryan Final Practical</title>
</head>

<body>
    <h1>Ryan Final Practical</h1>
    <h2>Admin Menu</h2>
    <ul>
        <li>
            <h2><a href="admin_manage_users.php">Manage Users</a></h2>
        </li>
        <li>
            <h2><a href="admin_images_management.php">Manage Images</a></h2>
        </li>
    </ul>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
    <h3><a href="admin_menu.php">Home</a></h3>
</body>
</html>