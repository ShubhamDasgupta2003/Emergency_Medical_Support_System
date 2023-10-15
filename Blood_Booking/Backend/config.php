<?php
class Config {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "emgmedicalsystem";
    protected $con;

    public function __construct() {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }
}
?>
