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
            if($con->connect_error)
            {
                die("Connection error".$con->connect_error);
            }
            else
            {
                return $con;
            }
        }
    }
?>

