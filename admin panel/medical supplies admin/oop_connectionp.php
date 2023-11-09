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
    echo $sql;
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
    echo $sql;
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
    echo $sql;
    $e->getMessage();
  }
}
public function viewuser()
{
  $sql="SELECT * FROM `user_info` ";
  $statement = $this->conn->prepare($sql);
  $statement->execute();
  $publisher = $statement->fetchAll();
    
    return $publisher;
}
public function viewall_order()
{
  $sql="SELECT * FROM `all_order` ";
  $statement = $this->conn->prepare($sql);
  $statement->execute();
  $publisher = $statement->fetchAll();
    
    return $publisher;
}
public function viewmedical_order()
{
  $sql="SELECT * FROM `medical_supplies_order_table` ";
  $statement = $this->conn->prepare($sql);
  $statement->execute();
  $publisher = $statement->fetchAll();
    
    return $publisher;
}
public function insertadminmedical($table_name,$product_id,$source_id,$product_name,$product_rate,$file_name,$product_info,$product_desc,$product_makers,$product_password,$product_email,$product_phone,)
{
  if($table_name== "medical_supplies_medical")
  {
    $sql= "INSERT INTO `medical_supplies_medical`(`product_id`, `source_id`, `product_name`, `product_rate`, `product_image`, `product_para`, `product_desc`, `product_makers`, `password`, `email`, `phone`) VALUES (:p,:s,:n,:r,:f,:i,:d,:m,:e,:o,:w)";
    $statement = $this->conn->prepare($sql);
    $statement->bindParam(':p', $product_id, PDO::PARAM_INT);
    $statement->bindParam(':s', $source_id, PDO::PARAM_INT);
    $statement->bindParam(':n', $product_name, PDO::PARAM_STR);
    $statement->bindParam(':r', $product_rate, PDO::PARAM_STR);
    $statement->bindParam(':f', $file_name, PDO::PARAM_STR);
    $statement->bindParam(':i', $product_info, PDO::PARAM_STR);
    $statement->bindParam(':d', $product_desc, PDO::PARAM_STR);
    $statement->bindParam(':m', $product_makers, PDO::PARAM_STR);
    $statement->bindParam(':e', $product_password, PDO::PARAM_STR);
    $statement->bindParam(':o', $product_email, PDO::PARAM_STR);
    $statement->bindParam(':w', $product_phone, PDO::PARAM_INT);
    try{
      $statement->execute();
    }catch(PDOException $e){ 
      ?><script>alert("Data Entry have a problem");</script><?php
    }
   
  }elseif($table_name== 'medical_supplies_technical')
  {
    $sql= "INSERT INTO `medical_supplies_technical`(`product_id`, `source_id`, `product_name`, `product_rate`, `product_image`, `product_para`, `product_desc`, `product_makers`, `password`, `email`, `phone`) VALUES (:p,:s,:n,:r,:f,:i,:d,:m,:e,:o,:w)";
    $statement = $this->conn->prepare($sql);
    $statement->bindParam(':p', $product_id, PDO::PARAM_INT);
    $statement->bindParam(':s', $source_id, PDO::PARAM_INT);
    $statement->bindParam(':n', $product_name, PDO::PARAM_STR);
    $statement->bindParam(':r', $product_rate, PDO::PARAM_STR);
    $statement->bindParam(':f', $file_name, PDO::PARAM_STR);
    $statement->bindParam(':i', $product_info, PDO::PARAM_STR);
    $statement->bindParam(':d', $product_desc, PDO::PARAM_STR);
    $statement->bindParam(':m', $product_makers, PDO::PARAM_STR);
    $statement->bindParam(':e', $product_password, PDO::PARAM_STR);
    $statement->bindParam(':o', $product_email, PDO::PARAM_STR);
    $statement->bindParam(':w', $product_phone, PDO::PARAM_INT);
    try{
      $statement->execute();
    }catch(PDOException $e){ 
      ?><script>alert("Data Entry have a problem");</script><?php
    }
  }
}
public function updateadminmedical($table_name,$product_id,$source_id,$product_name,$product_rate,$file_name,$product_info,$product_desc,$product_makers,$product_password,$product_email,$product_phone,)
{
  if($table_name== "medical_supplies_medical")
  {
    $sql="UPDATE "."`$table_name`"." SET `source_id`=:s,`product_name`=:n,`product_rate`=:r,`product_image`=:f,`product_para`=:i,`product_desc`=:d,`product_makers`=:m,`password`=:e,`email`=:o,`phone`=:w  WHERE `product_id`=:p";
    $statement = $this->conn->prepare($sql);
    $statement->bindParam(':p', $product_id, PDO::PARAM_INT);
    $statement->bindParam(':s', $source_id, PDO::PARAM_INT);
    $statement->bindParam(':n', $product_name, PDO::PARAM_STR);
    $statement->bindParam(':r', $product_rate, PDO::PARAM_STR);
    $statement->bindParam(':f', $file_name, PDO::PARAM_STR);
    $statement->bindParam(':i', $product_info, PDO::PARAM_STR);
    $statement->bindParam(':d', $product_desc, PDO::PARAM_STR);
    $statement->bindParam(':m', $product_makers, PDO::PARAM_STR);
    $statement->bindParam(':e', $product_password, PDO::PARAM_STR);
    $statement->bindParam(':o', $product_email, PDO::PARAM_STR);
    $statement->bindParam(':w', $product_phone, PDO::PARAM_INT);
    try{
      $statement->execute();
    }catch(PDOException $e){ 
      ?><script>alert("Data Entry have a problem");</script><?php
    }
  }elseif($table_name== 'medical_supplies_technical')
  {
    $sql="UPDATE "."`$table_name`"." SET `source_id`=:s,`product_name`=:n,`product_rate`=:r,`product_image`=:f,`product_para`=:i,`product_desc`=:d,`product_makers`=:m,`password`=:e,`email`=:o,`phone`=:w  WHERE `product_id`=:p";
    $statement = $this->conn->prepare($sql);
    $statement->bindParam(':p', $product_id, PDO::PARAM_INT);
    $statement->bindParam(':s', $source_id, PDO::PARAM_INT);
    $statement->bindParam(':n', $product_name, PDO::PARAM_STR);
    $statement->bindParam(':r', $product_rate, PDO::PARAM_STR);
    $statement->bindParam(':f', $file_name, PDO::PARAM_STR);
    $statement->bindParam(':i', $product_info, PDO::PARAM_STR);
    $statement->bindParam(':d', $product_desc, PDO::PARAM_STR);
    $statement->bindParam(':m', $product_makers, PDO::PARAM_STR);
    $statement->bindParam(':e', $product_password, PDO::PARAM_STR);
    $statement->bindParam(':o', $product_email, PDO::PARAM_STR);
    $statement->bindParam(':w', $product_phone, PDO::PARAM_INT);
    try{
      $statement->execute();
    }catch(PDOException $e){ 
      ?><script>alert("Data Entry have a problem");</script><?php
    }
  }
}
public function deleteadminmedical($table_name,$product_id)
{
  $sql="DELETE FROM "."`$table_name`"." WHERE `product_id`=:p";
  $statement = $this->conn->prepare($sql);
  $statement->bindParam(':p', $product_id, PDO::PARAM_INT);
  try{
    $statement->execute();
  }catch(PDOException $e){ 
    ?><script>alert("Data Entry have a problem");</script><?php
  } 
   return true;
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
}
?>
