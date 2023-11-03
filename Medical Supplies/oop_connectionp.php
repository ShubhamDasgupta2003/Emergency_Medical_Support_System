<?php
class Database
{
    public $conn;

public function __construct()
{
$this->conn=new PDO("mysql:host=localhost;dbname=emgmedicalsystem","root","");
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "successful connection";
}
public function numrecord($id)
{ 
    $n=0;
  $sql="SELECT * FROM cart WHERE  user_id=:p";

$statement = $this->conn->prepare($sql);
$statement->bindParam(':p', $id, PDO::PARAM_STR);
$statement->execute();
$publisher = $statement->rowCount();

return $publisher;
}
public function viewrecordm()
  { 
  
        $sql = 'SELECT * FROM medical_supplies_medical';

        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $publisher = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $publisher;
}
public function viewrecordt()
  { 
  
        $sql = 'SELECT * FROM medical_supplies_technical';

        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $publisher = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $publisher;
}
}
?>
