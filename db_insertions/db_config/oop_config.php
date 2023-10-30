<?php

class Database{
    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="";
    private $db_name="emgmedicalsystem";

    private $link="";
    private $conn=false;
    private $result=array();
    


    public function __construct(){

        $this->link=new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        $this->conn=true;
        if(!$this->link){
            array_push($this->result,$this->link->connect_error);
            // echo "Connection;
        }else{
            // echo "connection established";
        }
   
    }
    
    //insert
    public function insert($table,$parameters=array()){
        if($this->tableExist($table)){
            // print_r($parameters);

            $table_colums=implode(', ',array_keys($parameters));
            $table_value=implode("', '",$parameters);
            $sql= "INSERT INTO $table ($table_colums) VALUES ('$table_value')";
            echo $sql;
            if(mysqli_query($this->link,$sql)){
                array_push($this->result,$this->link->insert_id);
                return true;
            }else{
                array_push($this->result,$this->link->error);

            }

        }
    }
    //update
    public function update($table,$parameters=array(), $where=null){
        if($this->tableExist($table)){
           $args=array();
           foreach($parameters as $key=>$value){
            $args[]="$key='$value' ";
            }
          $sql="UPDATE $table SET ". implode(', ',$args);
          if($where != null){
            $sql.=" WHERE $where";
          }

          echo $sql;
        //   if($this->link->query($sql)){
        //     // array_push($this->result,$this->link->affected_rows);
        //     return true;
        //   }else{
        //     $r=($this->link->error);
        //     echo $r;
        //     return false;
        //   }
        }
    }
    
    //delete
    public function delete($table,$where=null){
        if($this->tableExist($table)){
            $sql="DELETE FROM $table";
            if($where!=null){
                $sql.= " WHERE $where";
            }
            echo $sql;
            if($this->link->query($sql)){
                array_push($this->result,$this->link->affected_rows);
                return true;
              }else{
                array_push($this->result,$this->link->error);
                return false;
              }
        }else{
            return false;
        }
    }
    public function select($sql){
        $query=$this->link->query($sql);
        if($query){
            $this->result=$query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push( $this->result,$this->link->error);
            return false;
        }
    }

    public function sql_select($table,$rows="*",$join=null,$where=null,$order=null,$limit=null){
        if($this->tableExist($table)){
            $sql= "SELECT $rows FROM $table";
            if($join!=null){
                $sql.= " JOIN $join";
            }
            if($where!=null){
                $sql.= " WHERE $where";
            }  
            if($order!=null){
                $sql.= " ORDER BY $order";
            }
            if($limit!=null){
                $sql.= " LIMIT 0,$limit";
            }
        }else{
            return false;
        }
        // echo $sql;
        $query=$this->link->query($sql);
        if($query){
            $this->result=$query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push( $this->result,$this->link->error);
            return false;
        }
    }
    private function tableExist($table){
        $sql= "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableinDb=$this->link->query($sql);
        
        if($tableinDb){
            if($tableinDb->num_rows==1){
                return true;
            }else{
                array_push($this->result,$table."Doesn't exist");
                return false;
            }
        }
    }

    public function getResult(){
        $val=$this->result;
        $this->result=array();
        return $val;
    }
    public function __destruct(){
        if($this->conn){
            mysqli_close($this->link);
            $this->conn=false;
            // return ture;
        }
    }

}

?>