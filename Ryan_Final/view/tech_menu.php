<?php
session_start();
require_once('../util/security.php');

//confirm user is authorized for the page
Security::checkAuthority('tech');

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
    <h2>Technician Menu</h2>
    <ul>
        <li>
            <h2><a href="tech_incidents_management.php">Manage Incidents</a></h2>
        </li>
        <li>
            <h2><a href="tech_db_conn_status.php">View DB Status</a></h2>
        </li>
    </ul>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>