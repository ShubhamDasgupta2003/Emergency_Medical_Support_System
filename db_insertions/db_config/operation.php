<?php
include("oop_config.php");
class Operation{
    public $db;

    public function __construct(){
        $this->db=new Database();
       
    }

    public function addRegister($data){
        $name=$data['name'];
        $lat=$data['lat'];
        $lon=$data['lon'];
        $phone=$data['phone'];
        $dist=$_POST['dist'];;
        $pin=$data['pin'];
        $state=$data['state'];
        $city=$data['city'];

           
        if(empty($name)||empty($lat)||empty($lon)||empty($phone)||empty($dist)||empty($pin)||empty($state)||empty($city)){
            $msg="Filds must not be empty";
            return $msg;

        }
        else{  
            $values=['name'=>$name,'latitude'=>$lat,'longitude'=>$lon,'state'=>$state,'city'=>$city,'phone'=>$phone,'dist'=>$dist,'pincode'=>$pin];
            $result=$this->db->insert('blood_bank',$values);

            // $result=$this->db->insert($sql);
            
            if($result){
                // header("location:http://localhost/crud_oop/");
                $msg="Registration Confirmed";
                return $msg;
            }
            else{
            $msg="Registration faild";
            return $msg;
            }
        }
    }
    public function update($data,$id){
        $name=$data['name'];
        $lat=$data['lat'];
        $lon=$data['lon'];
        $phone=$data['phone'];
        $dist=$_POST['dist'];;
        $pin=$data['pin'];
        $state=$data['state'];
        $city=$data['city'];


           
        if(empty($name)||empty($lat)||empty($lon)||empty($phone)||empty($dist)||empty($pin)||empty($state)||empty($city)){
            $msg="Filds must not be empty";
            return $msg;

        }
        else{  
            $values=['name'=>$name,'latitude'=>$lat,'longitude'=>$lon,'phone'=>$phone,'dist'=>$dist,'pincode'=>$pin];
            $result=$this->db->update('blood_bank',$values,'blood_bank_id='.$id);
            // $result=$this->db->update($sql);
            
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
}