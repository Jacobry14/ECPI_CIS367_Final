<?php
    require_once('../controller/user.php');
    require_once('../controller/user_controller.php');
    require_once('../util/security.php');

    $user = new User('', '', '', '', '', '', '', '');
    $user ->setUserNo(-1);
    $pageTitle = "Add a New User";

    $userId_error = 'Required';
    $password_error = 'Required';
    $fName_error = 'Required';
    $lName_error = 'Required';
    $hireDate_error = 'Required';
    $email_error = 'Required';
    $extension_error = 'Required';

    if (isset($_GET['userNoUpd'])) {
        $user = UserController::getUserByNo($_GET['userNo']);
        $pageTitle = "Updata an Existing User";
    }

    if (isset($_POST['save'])) {

        $user = new User($_POST['userNo'], $_POST['userId'], $_POST['userPw'], $_POST['userFName'], 
                            $_POST['userLName'], $_POST['userHireDate'], $_POST['userEmail'], 
                            $_POST['userExtension'], $_POST['userLevel']);
        $user->setUserNo($_POST['userNo']);

        if ($user->getUserNo() === '-1') {
            //add
            UserController::addUser($user);
        } else {
            //update
            UserController::updateUser($user);
        }
        //return to product list
        header('Location: ./admind_manage_users.php');
    }

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admind_manage_users.php');
    }
?>

<html>
<head>
    <title>Ryan Final</title>
</head>

<body>
    <h1>Ryan Final</h1>
    <h2><?php echo $pageTitle; ?></h2>
    <form method='POST'>
        <h3>
            User ID: <input type="text" name="userId"
            value="<?php echo $contact->getUser(); ?>">
        </h3>
        <h3>
            Password: <input type="text" name="userPw"
            value="<?php echo $contact->getPassword(); ?>">
        </h3>
        <h3>
            First Name: <input type="text" name="userFName"
            value="<?php echo $contact->getContactFirstName(); ?>">
            <?php if (empty($contact->getContactFirstName())) {
                echo "<span style='color: red;'>$fName_error</span>";}?>
        </h3>
        <h3>
            Last Name: <input type="text" name="userLName"
            value="<?php echo $contact->getContactLastName(); ?>">
        </h3>
        <h3>
            Hire Date: <input type="date" name="userHireDate"
            value="<?php echo $contact->getHireDate(); ?>">
        </h3>
        <h3>
            E-Mail: <input type="text" name="userEmail"
            value="<?php echo $contact->getEmail(); ?>">
        </h3>
        <h3>
            Extension: <input type="text" name="userExtension"
            value="<?php echo $contact->getExtension(); ?>">
        </h3>
        <h3>
            Level: <select name="userLevel">
                <?php foreach($levels as $level) : ?>
                    <option value="<?php echo $level->getLevelNo(); ?>">
                    <?php if ($level->getLevelNo() === $user->getLevel()->getLevelNo())?>  
                    <?php echo $level->getLevelName(); ?></option>
                <?php endforeach ?>
            </select>
        </h3>
        <input type="hidden" value="<?php echo $user->getUserNo(); ?>" name="userNo">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>
</html>