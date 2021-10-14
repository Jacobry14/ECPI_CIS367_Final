<?php
    require_once('database.php');

    class UserLevelDB {
        //get all user level in the DB
        public static function getLevels() {
            //get the DB connection 
            $db = new Database();
            $dbConnect = $db->getDbConn();
    
            if ($dbConnect) {
                //create the query string
                $query = 'SELECT * From user_levels';
                    
                //execute the query
                return $dbConnect->query($query);
            } else {
                return false;
            }
        }//end getLevel
    }//end Class UserLevelDB
?>