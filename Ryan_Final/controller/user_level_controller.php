<?php
include_once('user_level.php');
include_once('../model/user_level_db.php');

class UserLevelController {
    public static function getAllLevels() {
        $queryRes = UserlevelDB::getLevels();

        if ($queryRes) {
            //process the results into an array of Levels objects
            $levels = array();
            foreach ($queryRes as $row) {
                $levels[] = new Level($row['UserlevelNo'], $row['LevelName']);
            }

            //return the array of Category information
            return $levels;
        } else {
            return false;
        }
    }//end getAllLevels
}//end class UserLevelController
?>