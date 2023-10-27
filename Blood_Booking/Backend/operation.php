<?php
include ("config.php");
// $obj =new Database();
class Register{
    public $db;

    public function __construct(){
        $this->db=new Database();
       
    }

   
    public function allRecord($table){
        $sql= "SELECT * FROM $table";
        $result=$this->db->select($sql);
        return $result;
 
    }
    
    public function recordById($id){
        $sql= "SELECT * FROM `oop` WHERE id='$id'";
        $result=$this->db->select($sql);
        return $result;
 
    }

    public function update($data,$file,$id){
        $name=$data['name'];
        $email=$data['email'];
        $phone=$data['phone'];
        $branch=$data['branch'];

        $permited=array('jpeg','jpg','png','gif');

        $file_name=$file['photo']['name'];
        $file_temp=$file['photo']['tmp_name'];
        $file_size=$file['photo']['size'];
        
        $div=explode('.',$file_name);
        $file_extention=strtolower(end($div));
        $unique_img_name=substr(md5(time()),0,10).'.'.$file_extention;
        $upload_img='upload/'.$unique_img_name;
        



    //validation for empty field
    if(empty($name)||empty($email)||empty($phone)||empty($branch)){
        $msg="Filds must not be empty";
        return $msg;

    }if(!empty($file_name)){
        if($file_size>1048567){
            $msg= "file must be under 1MB";
            return $msg;
    
        }
        else if(in_array($file_extention,$permited)==false){
            $msg= "Please upload".implode(', ',$permited);
            return $msg;
    
        }
        else{
            move_uploaded_file($file_temp,$upload_img);
            
            // $sql="INSERT INTO `oop`(`name`,`email`,`phone`,`branch`,`photo`) VALUES ('$name','$email','$phone','$branch','$upload_img')";

            $sql="UPDATE  `oop` SET name='$name',email='$email',phone='$phone',branch='$branch',
            photo='$upload_img'  WHERE id=$id";
            $result=$this->db->update($sql);
            
            if($result){
                $msg="Updated succesfully";
                return $msg;
            }
            else{
            $msg="Registration faild";
            return $msg;
            }
        }
    }else{
        $sql="UPDATE  `oop` SET name='$name',email='$email',phone='$phone',
        branch='$branch' WHERE id=$id";

        $result=$this->db->update($sql);
        
        if($result){
            $msg="Updated succesfully";
            return $msg;
        }
        else{
        $msg="Registration faild";
        return $msg;
        }
    }

    }

    public function delete($id){
        $sql="DELETE FROM `oop` WHERE id='$id' ";
        $result=$this->db->delete($sql);
        if($result){    
           header("location:/oop_db/");
        }
    }
}
