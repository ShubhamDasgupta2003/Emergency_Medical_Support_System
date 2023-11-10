<?php
class Database
{
    public $conn;

public function __construct()
{
$this->conn=new PDO("mysql:host=localhost;dbname=emgmedicalsystem","root","");
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
public function viewrecorddm($s)
  { 
  
        $sql = 'SELECT * FROM medical_supplies_medical WHERE product_id=:s';

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':s', $s, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch();
        return $row;
}
public function viewrecorddt($s)
  { 
  
        $sql = 'SELECT * FROM medical_supplies_technical WHERE product_id=:s';

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':s', $s, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch();
        return $row;
}
public function insertcart($product_name, $product_price, $product_image, $product_quantity,$uid)
{

  $sql="INSERT INTO cart (name,price,image,quantity,user_id) VALUES (:n,:p,:i,:q,:u)";
  $statement = $this->conn->prepare($sql);
  $statement->bindParam(':n', $product_name, PDO::PARAM_STR);
  $statement->bindParam(':p', $product_price, PDO::PARAM_INT);
  $statement->bindParam(':i', $product_image, PDO::PARAM_STR);
  $statement->bindParam(':q', $product_quantity, PDO::PARAM_INT);
  $statement->bindParam(':u', $uid, PDO::PARAM_STR);
  $statement->execute();
  return true;
}
public function viewrecordc($id)
  { 
  
    $sql="SELECT * FROM cart WHERE  user_id=:p";

    $statement = $this->conn->prepare($sql);
    $statement->bindParam(':p', $id, PDO::PARAM_STR);
    $statement->execute();
    $publisher = $statement->fetchAll();
    
    return $publisher;
}
public function viewordera()
{
  
  $sql="SELECT * FROM `medical_supplies_order_table` ";
  $statement = $this->conn->prepare($sql);
  $statement->execute();
  $publisher = $statement->fetchAll();
    
    return $publisher;
 }
 public function updatecart ($update_value,$update_id)
{
  try{
   $sql="update `cart` set quantity=:v where id=:i";  
   $statement = $this->conn->prepare($sql);
   $statement->bindParam(':v', $update_value, PDO::PARAM_STR);
   $statement->bindParam(':i', $update_id, PDO::PARAM_STR);
   $statement->execute();  
   return true;
  }catch (Exception $e)
  {
    
    $e->getMessage();
  }
}

public function deletecart($delete_id)
{
  try{
   $sql="DELETE FROM cart WHERE id=:d";
   $statement = $this->conn->prepare($sql);
   $statement->bindParam(':d', $delete_id, PDO::PARAM_STR);
   $statement->execute();  
   return true;
  }catch (Exception $e)
  {
    
    $e->getMessage();
  }
}
public function insertrecordorder($p,$s,$j,$current_date,$current_time,$ufname,$ulname,$e,$t)
{
  try{
   $sql="INSERT INTO `medical_supplies_order_table`( `user_id`, `product_name`, `quantity`, `date`, `time`, `user_fname`, `user_lname`, `user_email`, `price`) VALUES (:p,:s,:j,:c,:u,:f,:l,:e,:t)";
   $statement = $this->conn->prepare($sql);
   $statement->bindParam(':p', $p, PDO::PARAM_STR);
   $statement->bindParam(':s', $s, PDO::PARAM_STR);
   $statement->bindParam(':j', $j, PDO::PARAM_INT);
   $statement->bindParam(':c', $current_date, PDO::PARAM_STR);
   $statement->bindParam(':u', $current_time, PDO::PARAM_STR);
   $statement->bindParam(':f', $ufname, PDO::PARAM_STR);
   $statement->bindParam(':l', $ulname, PDO::PARAM_STR);
   $statement->bindParam(':e', $e, PDO::PARAM_STR);
   $statement->bindParam(':t', $t, PDO::PARAM_INT);
   $statement->execute();  
   return true;
  }catch (Exception $e)
  {
    
    $e->getMessage();
  }
}
public function insertallorder($i,$f,$d,$t)
{
  try{
   $sql="INSERT INTO `all_order`(`user_id`, `service`, `user_fname`, `date`, `time`) VALUES (:i,'Medical Supplies',:f,:d,:t)";  
   $statement = $this->conn->prepare($sql);
   $statement->bindParam(':i', $i, PDO::PARAM_STR);
   $statement->bindParam(':f', $f, PDO::PARAM_STR);
   $statement->bindParam(':d', $d, PDO::PARAM_STR);
   $statement->bindParam(':t', $t, PDO::PARAM_STR);
   $statement->execute();  
   return true;
  }catch (Exception $e)
  {
    
    $e->getMessage();
  }
}
public function viewtable($t)
{
  $sql="SELECT * FROM ";
  $sql.=$t;
  $statement = $this->conn->prepare($sql);
  $statement->execute();
  $publisher = $statement->fetchAll();
    
    return $publisher;
}
public function viewsearch($q)
{
  $sql=$q;
  $statement = $this->conn->prepare($sql);
  try{
  $statement->execute();
  }catch (Exception $e)
  {
    $e->getMessage();
    echo $sql;
  }
  $publisher = $statement->fetchAll();
    
    return $publisher;
}
public function numsearch($q)
{ 
$sql=$q;
$statement = $this->conn->prepare($sql);
$statement->execute();
$publisher = $statement->rowCount();

return $publisher;
}
}

?>
