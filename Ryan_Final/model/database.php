<?php
class Database {
    //DB conntection parameters
    private $host = 'localhost';
    private $dbname = 'cis367_wk3final';
    private $username = 'cis367final_user';
    private $password = '6TusdNdKdUoACkHm';

    //DB connection and error message
    private $conn;
    private $conn_error = '';

    //contructor - connect to the DB or set an error message if the connction failed
    function __construct()
    {
        //turn off error reporing since we;re handling erros manually
        mysqli_report(MYSQLI_REPORT_OFF);

        //connect to the database
        $this->conn = mysqli_connect($this->host, $this->username,
                                        $this->password, $this->dbname);

        //if the connection failed, set the error message
        if ($this->conn === false) {
            $this->conn_error = "failed to connect to DB: " . mysqli_connect_error();
        }
    }//end __construct

    function __destruct()
    {
        mysqli_close($this->conn);
    }

    //return the connection; if the connection failed it will be false
    function getDbConn() {
        return $this->conn;
    }

    function getDbError() {
        return $this->conn_error;
    }

    //functions to get the DB connection parameters
    function getDbHost() {
        return $this->host;
    }

    function getDbName() {
        return $this->dbname;
    }

    function getDbUser() {
        return $this->username;
    }

    function getDbUserPw() {
        return $this->password;
    }
}//end Database class
?>