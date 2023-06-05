<?php
    include_once '../connection/connection.php';
    if(isset($_POST['submit'])){
        $target = "image/".basename($_FILES['image']['name']);
        $image=$_FILES['image']['name'];
        $pname=$_POST['pname'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        $brand=$_POST['brand'];



        $sql = 'INSERT INTO phone(pname,price,image,description,brand) VALUES("'.$pname.'","'.$price.'","'.$image.'","'.$description.'","'.$brand.'")';
        $result=mysqli_query($db_con,$sql);
        if($result){
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                header('location:addphone.php');
            }
            else{
                echo 'Some error occured';
            }
        }
        else{
            die("Error: " . mysqli_error($db_con));
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add phone</title>
</head>
<body>
    <form action="addphone.php" method="post" enctype="multipart/form-data">
        <input type="text" name="pname" id="pname" placeholder="Phone Name"><br>
        <input type="text" name="price" id="price" placeholder="Phone Price"><br>

        <label for="image">Upload a image</label><br>
        <input type="file" name="image" id="image"><br>

        <input type="text" name="description" id="description" placeholder="Phone Description"><br>

        <label for="brand">Select Brand</label><br>
        <input type="radio" id="ios" name="brand" value="ios">
        <label for="ios">IOS</label><br>
        <input type="radio" id="android" name="brand" value="android">
        <label for="android">Android</label><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>