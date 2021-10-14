<?php
require_once('../model/user_db.php');
require_once('user.php');

class UserController {
    //helper function to convert a db row into a user object
    private static function rowToUser($row) {
        $user = new User($row['UserId'],
            $row['Password'],
            $row['FirstName'],
            $row['LastName'],
            $row['HireDate'],
            $row['EMail'],
            $row['Extension'],
            new Level($row['UserLevelNo'],
                    $row['LevelName']));
        return $user;
    }

    //function to check login credentials - return true
    //if user is valid, false other wise
    public static function validUser($email, $password) {
        $queryRes = UsersDB::getUserByEMail($email);

        if ($queryRes) {
            //process the user row
            $user = self::rowToUser($queryRes);
            if ($user->getPassword() === $password) {
                return $user->getLevel();
            } else {
                return false;
            }
        } else {
            //either no such user or db connect failed -
            //either way, can't validate the user
            return false;
        }
    }//end validUser

    public static function getAllUsers() {
        $queryRes = UsersDB::getAllUsers();

        if ($queryRes) {
            $user = array();
            foreach ($queryRes as $row) {
                $user[] = self::rowToUser($row);
            }
            return $user;
        } else {
            return false;
        }
    }//end getAllUsers

    //function to get a specific contact by their userNo
    public static function getUserByNo($userNo) {
        $queryRes = UsersDB::getUserByNo($userNo);

        if ($queryRes) {
            return self::rowToUser($queryRes);
        } else {
            return false;
        }
    }//end getUserByNo

    public static function deleteUser($userNo) {
        return UsersDB::deleteUser($userNo);
    }//end deleteContact

    //function to add a contact to the DB
    public static function addUser($user) {
        return UsersDB::addUser(
            $user->getUserNo(),
            $user->getUserID(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEMail(),
            $user->getPassword(),
            $user->getHireDate(),
            $user->getExtension(),
            $user->getLevel()->getlevelNo());
    }//end addUser

    //function to update a contact's information
    public static function updateUser($user) {
        return UsersDB::updateUser(
            $user->getUserNo(),
            $user->getUserID(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEMail(),
            $user->getPassword(),
            $user->getHireDate(),
            $user->getExtension(),
            $user->getLevel()->getlevelNo());
    }//end updateUser
}//end user controler
?>