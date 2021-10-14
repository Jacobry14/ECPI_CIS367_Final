<?php
require_once('../controller/user.php');
require_once('../controller/user_controller.php');
require_once('../util/security.php');

//confirm user is authorized for the page
//Security::checkAuthority('admin');

//user clciked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}

if (isset($_POST['update'])) {
    //update button pressed for a user

    if (isset($_POST['userNoUpd'])) {
        header('Location: ./add_update_user.php?pNo=' . $_POST['userNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['userNoUpd']);
}

if (isset($_POST['delete'])) {
    //delete button pressed for a user
    if (isset($_POST['userNoDel'])) {
        UserController::deleteUser($_POST['userNoDel']);
    }
    unset($_POST['delete']);
    unset($_POST['userNoDel']);
}
?>

<html>
<head>
    <title>Ryan Final</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
    <h1>Ryan Final</h1>
    <h1>Manage</h1>
    <h2><a href="./admin_add_update_user.php">Add contact</a></h2>
    <table>
    <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Hire Date</th>
            <th>Email Address</th>
            <th>Extension</th>
            <th>Level</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach (UserController::getAllUsers() as $user) : ?>
        <tr>
            <td><?php echo $user->getUserNo(); ?></td>
            <td><?php echo $user->getFirstName(); ?></td>
            <td><?php echo $user->getLastName(); ?></td>
            <td><?php echo $user->getHireDate(); ?></td>
            <td><?php echo $user->getEmail(); ?></td>
            <td><?php echo $user->getExtension(); ?></td>
            <td><?php echo $user->getLevel()->getLevelName(); ?></td>
            <td><form method="POST">
                <input type="hidden" name="userNoUpd"
                    value="<?php echo $contact->getUsertNo(); ?>"/>
                    <input type="submit" value="Update" name="update" />
            </form></td>
            <td><form method="POST">
                <input type="hidden" name="userNoDel"
                    value="<?php echo $contact->getUsertNo(); ?>"/>
                    <input type="submit" value="Delete" name="delete" />
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
    <h3><a href="admin_menu.php">Home</a></h3>
</body>
</html>