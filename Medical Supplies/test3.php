
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" id="mytext" >
    <button type="button" onclick="myfunction()" >Try it</button>
    <p id="demo">

    </p>
<?php
 $search_data_value=$_GET['search_data'];
 $search_query="SELECT * FROM medical_supplies_medical WHERE product_keywords like '%$search_data_value%'";
 echo $search_query;
if(isset($_GET['search_data_product']))
{
    $search_data_value=$_GET['search_data'];
    $search_data_value= trim($search_data_value);
    $search_query="SELECT * FROM medical_supplies_medical WHERE product_keywords like '%$search_data_value%'";
    echo $search_query;
}
?>

    <script>
        var test="success 2";
        function myfunction()
        {
            var x=document.getElementById("mytext").value;
            document.getElementById("demo").innerHTML= x;
            window.location.href = "test3.php?q="+searchbar_text;
           
        }
    </script>
    <?php
                 echo "<script>document.writeln(test);</script>"
              ?>
</body>
</html>