<?php
    class Database
    {
        private $username;
        private $server;
        private $pswd;
        private $db;

        public function connect()
        {
            $this->username = "root";
            $this->server = "localhost";
            $this->pswd = "";
            $this->db = "emgmedicalsystem";

            $con = new mysqli($this->server,$this->username,$this->pswd,$this->db);

            return $con;
        }

        public function currentDateTime()
        {
            date_default_timezone_set("Asia/calcutta");
            $cur_date = date("Y-m-d");
            $cur_time = date("H:i:s");
            $this->curDateTime = array("date"=>$cur_date,"time"=>$cur_time);

            return $this->curDateTime;
        }
    }
?>

