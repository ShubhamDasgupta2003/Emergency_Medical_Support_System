<?php
include("oop_config.php");
class Operation{
    public $db;

    public function __construct(){
        $this->db=new Database();
       
    }

    public function addRegister($data){
    $id =$_POST['blood_bank_id'];
    $blood_gr=$_POST['blood'];
    $unit=$_POST['unit'];
    if(empty($id)||empty($blood_gr)||empty($unit)){
        $msg="Filds must not be empty";
        return $msg;
    }
    else{  
    $result = $this->db->insert('blood_bank_blood_group',['blood_bank_id'=>$id,'blood_group_id'=>$blood_gr,'count'=>$unit]);
    }
    if($result){
        // header("location:http://localhost/crud_oop/");
        $msg="Blood added to blood bank";
        return $msg;
    }
    else{
    $msg="Registration faild";
    return $msg;
    }
  }
    

}