<?php
//class to represent an entry in the users table
class User {
    //properies - match the column in the users table
    private $userNo;
    private $userID;
    private $password;
    private $firstName;
    private $lastName;
    private $hireDate;
    private $eMail;
    private $extension;
    private $userLevel;

    public function __construct($userNo, $password, $firstName, $lastName,
                                $hireDate, $eMail, $extension, $userLevel,
                                $userID = null)
    {
        $this->userNo = $userNo;
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->eMail = $eMail;
        $this->password = $password;
        $this->hireDate = $hireDate;
        $this->extension = $extension;
        $this->userLevel = $userLevel;
    }

    //get and set the person properties
    public function getUserNo() {
        return $this->userNo;
    }
    public function setUserNo($value) {
        $this->userNo = $value;
    }
    
    public function getUserID() {
        return $this->userID;
    }
    public function setUserID($value) {
        $this->userID = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($value) {
        $this->lastName = $value;
    }

    public function getEMail() {
        return $this->eMail;
    }
    public function setEMail($value) {
        $this->eMail = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($value) {
        $this->password = $value;
    }

    public function getHireDate() {
        return $this->hireDate;
    }
    public function setHireDate($value) {
        $this->hireDate = $value;
    }

    public function getExtension() {
        return $this->extension;
    }
    public function setExtension($value) {
        $this->extension = $value;
    }


    public function getLevel() {
        return $this->userLevel;
    }
    public function setLevel($value) {
        $this->userLevel = $value;
    }
}//end User class
?>