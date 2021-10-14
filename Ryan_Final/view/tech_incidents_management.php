<?php
session_start();
require_once('../util/security.php');
require_once('../util/file_utilities.php');

//confirm user is authorized for the page
Security::checkAuthority('tech');

//user clciked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}

//get logs directory in current working directory
$dir = getcwd() . "/logs/";
$viewFile = '';
$editFile = '';

//User selected to view file contents
if (isset($_POST['view'])) {
    $fName = $_POST['fileToView'];
    $viewFile = FileUtilities::GetFileContents($dir . $fName);
    $editFile = '';
}

//User is loading a file to edit
if (isset($_POST['load'])) {
    $fName = $_POST['fileToUpdate'];
    $editFile = FileUtilities::GetFileContents($dir . $fName);
    $viewFile = '';
}

//User wants to save edited file contents
if (isset($_POST['save'])) {
    $fName = $_POST['fileToUpdate'];
    $content = $_POST['editFile'];
    FileUtilities::WriteFile($dir . $fName , $content);
    $editFile = '';
    $viewFile = '';
}

//User wants to create a new file
if (isset($_POST['create'])) {
    $fName = $_POST['newFileName'];
    $content = $_POST['createFile'];
    FileUtilities::WriteFile($dir . $fName, $content);
    $editFile = '';
    $viewFile = '';
}
?>

<html>
<head>
    <title>Ryan Final Practical</title>
</head>
<body>
    <h1>Ryan Final Practical</h1>
    <h3>Manage Incident Text Files</h3>
    <form method="POST">
    <h3>View Text File: <select name="fileToView">
        <?php foreach(FileUtilities::GetFileList($dir) as $file) : ?>
            <option value="<?php echo $file; ?>"><?php echo $file; ?> </option>
        <?php endforeach; ?></select>
        <input type="submit" value="View File" name="view">
        <input type="submit" value="Edit File" name="edit">
        <input type="submit" value="Save Edits" name="save"><br>
        <input type="text" name="newFileName">
        <input type="submit" value="Create" name="create">
    </h3>
    <textarea id="textField" name="textField" rows="5" cols="50">
        <?php echo $viewFile ?></textarea>
    </form>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
    <h3><a href="tech_menu.php">Home</a></h3>
</body>
</html>