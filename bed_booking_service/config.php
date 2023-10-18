<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname="emgmedicalsystem";

// $conn =mysqli_connect($servername, $username, $password,$dbname);

// if (!$conn) {
//   // echo "conection succesfull";
//   echo "Not connected";
// }
?>


<?php
    class Database
    {
        private $username;
        private $servername;
        private $password;
        private $dbname;
        protected $conn;
        public $curDateTime;
//---------------------------------------------------------------------------
        // Method to connect to  mysql databse

        public function connect()  
        {
            $this->username = "root";
            $this->servername = "localhost";
            $this->password = "";
            $this->dbname = "emgmedicalsystem";

            $conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            if($conn->connect_error)
            {
                die("Connection error".$conn->connect_error);
            }
            else
            {
                return $this->conn = $conn;
            }
        }
        // Method to connect to  mysql databse ends here
//---------------------------------------------------------------------------       
        // Method to check login status of users
        
        public function isLoggedIn($islogin)
        {
            if($islogin!=1)
            {
                echo "<script>alert('It seems like you have not logged in\\nPlease login to book bed');
                window.location.href = '/minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php'</script>";
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }

        // Method to check login status of users ends here
//---------------------------------------------------------------------------
        // Method for SELECT query in mysql

        public function select($table, $rows = '*', $where = null, $order = null) 
        {
            $q = 'SELECT '.$rows.' FROM '.$table;
            if($where != null)
                $q .= ' WHERE '.$where;
            if($order != null)
                $q .= ' ORDER BY '.$order;

            // return $q;
            $result = $this->conn->query($q);
            if($result) {
                return $result;
            } else {
                return false;
            }
        }
        // Method for SELECT query in mysql ends here
//---------------------------------------------------------------------------
        // Method for INSERT query in mysql

        public function insert($table, $values, $rows = null)
        {
            $insert = 'INSERT INTO '.$table;
            if ($rows != null) {
                $insert .= ' ('.$rows.')';
            }
            for ($i = 0; $i < count($values); $i++) {
                $values[$i] = mysqli_real_escape_string($this->conn, $values[$i]);
                if (is_string($values[$i])) {
                    $values[$i] = '"'.$values[$i].'"';
                }
            }
            $values = implode(',', $values);
            $insert .= ' VALUES ('.$values.')';
            $ins = $this->conn->query($insert);
            if ($ins) {
                return true;
            } else {
                return false;
            }
        }
        // Method for INSERT query in mysql ends here
//---------------------------------------------------------------------------
        // Method for UPDATE query in mysql 
        public function update($table, $rows, $where)
        {
            $update = 'UPDATE ' . $table . ' SET ';
            $keys = array_keys($rows);
            
            $setValues = [];
            foreach ($keys as $key) {
                $value = $rows[$key];
                $setValues[] = "`$key` = '" . mysqli_real_escape_string($this->conn, $value)."'";
            }
            
            $update .= implode(',', $setValues);
            $update .= ' WHERE ' . $where;
            $query = $this->conn->query($update);
            if ($query) {
                return true;
            } 
            else {
                return false;
            }
        }
        // Method for UPDATE query in mysql ends here
//---------------------------------------------------------------------------
        // Method for getting current date and time
        public function currentDateTime()
        {
            date_default_timezone_set("Asia/calcutta");
            $cur_date = date("Y-m-d");
            $cur_time = date("H:i:s");
            $this->curDateTime = array("date"=>$cur_date,"time"=>$cur_time);

            return $this->curDateTime;
        }

    }

    class locationChange
    {

    }
?>

