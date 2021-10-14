<?php
require_once('database.php');

//class forn users table queries
class UsersDB {

    public static function getAllUsers() {
        //get the DB connection 
        $db = new Database();
        $dbConnect = $db->getDbConn();

        if ($dbConnect) {
            $query = 'SELECT * FROM users
                        INNER JOIN user_levels
                            ON users.UserLevelNo = user_levels.UserLevelNo';
            
            //execute the query
            return $dbConnect->query($query);
        } else {
            return false;
        }
    }//end getAllUsers

    public static function getLevel($levelNo) {
        //get the DB connection
        $db = new Database();
        $dbConnect = $db->getDbConn();

        if ($dbConnect) {
            //create the query string
            $query = "SELECT * FROM users
                        INNER JOIN user_levels
                        ON users.UserLevelNo = user_levels.UserLevelNo'
                        WHERE users.UserLevelNo = '$levelNo'";
            
            //execute the query
            return $dbConnect->query($query);
        } else {
            return false;
        }
    }//end getProductByCategory

    //function to get a user by their email address
    public static function getUserByEMail($email) {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM users
                        WHERE users.EMail = '$email'";

            //execute the query - returns false if no such email found
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }//end getUserByEMail

    //function to get a specific user by their UserNo
    public static function getUserByNo($userNo) {
        //get the DB connection 
        $db = new Database();
        $dbConnect = $db->getDbConn();

        if ($dbConnect) {
            //create the query string
            $query = "SELECT * FROM users
                        WHERE UserNo = '$userNo'";
            
            //execute the query
            $result = $dbConnect->query($query);
            //return the associative array
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }//end getUsersByNo

    public static function deleteUser($userNo) {
        //get the DB connection 
        $db = new Database();
        $dbConnect = $db->getDbConn();

        if ($dbConnect) {
            //create the query string
            $query = "DELETE FROM users
                        WHERE UserNo = '$userNo'";

            //execute the query, returning status
            return $dbConnect->query($query) === TRUE;
        } else {
            return false;
        }
    }//end deleteUser

    //function to add a user to the DB
    public static function addUser($userNo, $userId, $userPassword, $userFName, $userLName, 
                                    $userHireDate,$userEmail, $userExtension, $userLevelNo) {
        //get the DB connection 
        $db = new Database();
        $dbConnect = $db->getDbConn();

        if ($dbConnect) {
            $query = 
            "INSERT INTO users (UserNo, UserId, Password, FirstName, LastName,
                                HireDate, EMail, Extension, UserLevelNo)
            VALUES ('$userNo', '$userId', '$userPassword', '$userFName', '$userLName',  
                    '$userHireDate', '$userEmail', '$userExtension', '$userLevelNo')";

            //execute the query, returning status
            return $dbConnect->query($query) === TRUE;
        } else {
            return false;
        }
    }//end addUser

    //function to update a user's information
    public static function updateUser($userNo, $userId, $userPassword, $userFName, $userLName, 
                                        $userHireDate,$userEmail, $userExtension, $userLevelNo) {
        //get the DB connection 
        $db = new Database();
        $dbConnect = $db->getDbConn();

        if ($dbConnect) {
            //create the query string
            $query = 
            "UPDATE users SET
                UserNo = '$userNo'
                UserId = '$userId'
                Password = '$userPassword'
                FirstName = '$userFName'
                LastName = '$userLName'
                HireDate = '$userHireDate'
                EMail = '$userEmail'
                Extension = '$userExtension'
                UserLevelNo = '$userLevelNo'
            WHERE ContactNo = '$userNo'";

            //execute the query, returning status
            return $dbConnect->query($query) === TRUE;
        } else {
            return false;
        }
    }//end updateUser
}//end UserDB class
?>