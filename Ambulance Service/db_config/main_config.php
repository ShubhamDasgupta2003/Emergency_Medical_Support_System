<?php
    class Database
    {
        private $username;
        private $server;
        private $pswd;
        private $db;
        private $con;

        public $islogin;

        // Method to connect to  mysql databse

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
                return $this->con = $con;
            }
        }
        // Method to connect to  mysql databse ends here
        
        // Method to check login status of users
        
        public function isLoggedIn()
        {
            session_start();
            $islogin= $_SESSION['is_logged_in'];
            if($islogin!=1)
            {
                echo "<script>alert('It seems like you have not logged in\\nPlease login to book your ride');
                window.location.href = '/minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php'</script>";
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }

        // Method to check login status of users ends here

        
        public function select($table, $rows = '*', $where = null, $order = null) 
        {
            $q = 'SELECT '.$rows.' FROM '.$table;
            if($where != null)
                $q .= ' WHERE '.$where;
            if($order != null)
                $q .= ' ORDER BY '.$order;

            // return $q;
            $result = $this->con->query($q);
            if($result) {
                return $result;
            } else {
                return false;
            }
        }
    }
?>

