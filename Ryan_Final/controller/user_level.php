<?php
    //Level class to represent a single entry in the User-levels table
    class Level {
        private $levelNo;
        private $levelName;

        public function __construct($levelNo, $levelName) {
            $this->levelNo = $levelNo;
            $this->levelName = $levelName;
        }

        //get and set property
        public function getLevelNo() {
            return $this->levelNo;
        }
        public function setLevelNo($value) {
            $this->levelNo = $value;
        }

        public function getLevelName() {
            return $this->levelName;
        }
        public function setLevelName($value) {
            $this->levelName = $value;
        }
    }
?>