<?php
include "oop_connection.php";
$obj=new Database();
$obj->insertrecord("login",['id'=>'21','userename'=>'test21']);
#$records=$obj->viewrecord("login");
#$n=$obj->numrecord("login","1");
$uid = "USR8882889123";
#$n=$obj->numrecord("cart",['user_id'=>$uid]);

#echo "num of rows $n";



#$s=$obj->insertrecord("cart",['name'=>'$product_name','price'=>'$product_price','image'=>'$product_image','quantity'=>'$product_quantity','user_id'=>'$uid']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   /* echo "<br>";
    foreach($records as $record)
    {
        echo "<br>";
        echo "username is ".$record['userename'];
        echo "id is ".$record['id'];
    }*/
    echo "done";
    ?>
</body>
</html>