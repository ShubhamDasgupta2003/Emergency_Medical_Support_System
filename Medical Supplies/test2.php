
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


    <script>
        var test="success";
        function myfunction()
        {
            var x=document.getElementById("mytext").value;
            document.getElementById("demo").innerHTML= x;
            <?php echo "teru"; ?>
        }
    </script>
    <?php
                 echo "<script>document.writeln(test);</script>"
              ?>
</body>
</html>