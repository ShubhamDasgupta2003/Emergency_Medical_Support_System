<?php
class Database
{
   private $host="localhost";
   private $user="root";
   private $password="";
   private $dbname="emgmedicalsystem";
   public $result=array();
   private $mysqli="";
   public $conn=false;



   public function __construct()
   {
     try{
      $this->conn=new mysqli($this->host,$this->user,$this->password,$this->dbname);
    }catch (Exception $e){
        echo $e->getMessage();
    }
  }

  public function insertrecord($t,$params=array())
  { 
   if($this->tableexists($t))
   {
    $table_columns=implode(", ",array_keys($params));
    $table_values=implode("', '",$params);
    $sql="INSERT INTO $t($table_columns) VALUES('$table_values')";
    
    $query=$this->conn->query($sql);
   
    if($query)
   {
    return true;
   }
   else
   {
    return false;
   }
  }
  }

  public function updaterecord($t,$params=array())
  { 
   if($this->tableexists($t))
   {
    $table_columns=implode(", ",array_keys($params));
    $table_values=implode("', '",$params);
    $sql="INSERT INTO $t($table_columns) VALUES('$table_values')";
    $query=$this->conn->query($sql);
    
    if($query)
   {
    return true;
   }
   else
   {
    return false;
   }
  }
  }

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
        
  public function viewrecord($t)
  { 
    // if($w=='null')
    {
    $sql="SELECT * FROM $t";
    $query=$this->conn->query($sql);
    if($query->num_rows>0)
    {
      while($row=$query->fetch_assoc())
      {
        $this->result[]=$row;
       
      }
     
      return $this->result;
    }else{
      return false;
    }
  }
//   else
//   {
//     $sql="SELECT * FROM $t WHERE 'ride_status'='$w'";
//     $query=$this->conn->query($sql);
//     if($query->num_rows>0)
//     {
//       while($row=$query->fetch_assoc())
//       {
//         $this->result[]=$row;
       
//       }
     
//       return $this->result;
//     }else{
//       return false;
//     }
//   }
  }
  
  public function numrecord($t,$id)
  { 
    $sql="SELECT * FROM $t WHERE  user_id='$id'";
    $query=$this->conn->query($sql);
    $num=$query->num_rows;
    return $num;
  }
  
  public function viewprecord($t,$params=array())
  { 
    $table_columns=implode(" ",array_keys($params));
    $table_values=implode(" ",$params);
    $sql="SELECT * FROM $t WHERE  $table_columns=$table_values";
    $query=$this->conn->query($sql);
    $num=$query->num_rows;
    if($num>0)
     {
      $row=$query->fetch_assoc();
      return $row;
    }else{
      return false;
    }
    
  }

  public function tableexists($t)
  {
    $sql="SHOW TABLES FROM $this->dbname LIKE '$t'";
    $exist=$this->conn->query($sql);
    if($exist)
    {
      return true;
    }
    else{
      echo"table does not exist";
      return false;
    }
  }


  public function insertcart ($product_name, $product_price, $product_image, $product_quantity,$uid)
{
  try{
  $sql="INSERT INTO cart (name,price,image,quantity,user_id) VALUES (' $product_name',' $product_price',' $product_image', $product_quantity,'$uid')";
   $query=$this->conn->query($sql);
   return true;
  }catch (Exception $e)
  {
  
  }
  
}

public function updatecart ($update_value,$update_id)
{
  try{
   $sql="update `cart` set quantity=$update_value where id=$update_id";
   $query=$this->conn->query($sql);
  }catch (Exception $e)
  {
    echo $sql;
    $e->getMessage();
  }
   if($query)
   {
    return true;
   }
   else
   {
    return false;
   }
}
public function deletecart($delete_id)
{
  try{
   $sql="DELETE FROM cart WHERE id=$delete_id";
   $query=$this->conn->query($sql);
  }catch (Exception $e)
  {
    echo $sql;
    $e->getMessage();
  }
   if($query)
   {
    return true;
   }
   else
   {
    return false;
   }
}
  


public function vieworder($t)
{
  
 $result=mysqli_query($this->conn,"select * FROM ".$t);
 return $result;
 }



public function insertadminmedical($table_name,$product_id,$source_id,$product_name,$product_rate,$file_name,$product_info,$product_desc,$product_makers)
{

  $sql="INSERT INTO "."`$table_name`"."(`product_id`, `source_id`, `product_name`, `product_rate`, `product_image`, `product_para`, `product_desc`, `product_makers`) VALUES ($product_id,$source_id,'$product_name',$product_rate,'$file_name','$product_info','$product_desc','$product_makers')";
   $query=$this->conn->query($sql);
   return true;

 }
 public function updateadminmedical($table_name,$product_id,$source_id,$product_name,$product_rate,$file_name,$product_info,$product_desc,$product_makers)
{

  $sql="UPDATE "."`$table_name`"." SET `source_id`='$source_id',`product_name`='$product_name',`product_rate`='$product_rate',`product_image`='$file_name',`product_para`='$product_info',`product_desc`='$product_desc',`product_makers`='$product_makers' WHERE `product_id`=$product_id";
   $query=$this->conn->query($sql);
   return true;

 }
 public function deleteadminmedical($table_name,$product_id)
{

  $sql="DELETE FROM "."`$table_name`"." WHERE `product_id`='$product_id'";
   $query=$this->conn->query($sql);
   return true;

 }
}
?>