<?php
include("oop_config.php");
class Operation{
    public $db;

    public function __construct(){
        $this->db=new Database();
       
    }

    public function addRegister($data){
        $name=$data['name'];
        $email=$data['email'];
        $pass=$data['pass'];
        $lat=$data['lat'];
        $lon=$data['lon'];
        $phone=$data['phone'];
        $dist=$_POST['dist'];;
        $pin=$data['pin'];
        $state=$data['state'];
        $city=$data['city'];

           
        if(empty($name)||empty($lat)||empty($lon)||empty($phone)||empty($email)||empty($pass)||empty($dist)||empty($pin)||empty($state)||empty($city)){
            $msg="Filds must not be empty";
            return $msg;

        }
        else{  
            $values=['name'=>$name,'email'=>$email,'password'=>$pass,'latitude'=>$lat,'longitude'=>$lon,'state'=>$state,'city'=>$city,'phone'=>$phone,'dist'=>$dist,'pincode'=>$pin];
            $result=$this->db->insert('blood_bank',$values);

            // $result=$this->db->insert($sql);
            
            if($result){
                header("location:http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/admin%20panel/adminlogin.php");
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
    public function update_Blood_Details($data,$Bank_id,$Blood_id){
        $values=['count'=>$data];
        $result=$this->db->update('blood_bank_blood_group', $values, 'blood_bank_id=' . $Bank_id . ' AND ' . 'blood_group_id=' . $Blood_id);
        // $result=$this->db->update($sql);
        
        if($result){
            $msg="Blood details updated succesfully";
            return $msg;
        }
        else{
        $msg="Updation faild";
        return $msg;
        }
    }
}