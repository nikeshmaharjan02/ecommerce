<?php 
    
    include_once '../connection/connection.php';
    if(isset($_POST['add'])){
        $phone_name=$_POST['phone_name'];
        $description = $_POST['description'];
        $price= $_POST['price'];
        $color= $_POST['color'];
        $company= $_POST['company'];
        $file_name=basename($_FILES['image']['name']);
        $extension = pathinfo($file_name,PATHINFO_EXTENSION);
        $image=$phone_name.rand(1,100000).'.'.$extension;
        $target = "../image/phone/".$image;

        if(!empty($phone_name) && !empty($price) && !empty($color) && !empty($company)&& !empty($image)){
            $sql = 'INSERT INTO phone(phone_name,description,price,color,company,image) 
            VALUES("'.$phone_name.'","'.$description.'","'.$price.'","'.$color.'","'.$company.'","'.$image.'")';
            $result=mysqli_query($db_con,$sql);
            if($result){
                if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                    header('location:/mobilepasa/admin/addphone.php');
                }
                else{
                    echo 'Some error occured';
                }
            }
            else{
                die("Error: " . mysqli_error($db_con));
            }
        }
        else{
            echo "required all fields";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addphone</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
     <style>
            *{
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;

}

nav{
    background: #0082e6;
    height: 80px;
    width: 100%;
}
label.logo{
    color: white;
    font-size: 25px;
    line-height: 80px;
    padding: 0 100px;
    font-weight: bold;

}
span{
    color: #ff7200;
    font-size: 35px;
    font-weight: bold;
}
nav ul{
    float: right;
    margin-right: 20px;

}
nav ul li{
    display: inline-block;
    line-height: 80px;
    margin: 0 5px;   
}
nav ul li a{
    color: white;
    font-size: 17px;
    padding: 7px 13px;
    border-radius: 3px;
    text-transform: uppercase;
}
a.active,a:hover{
    background: #1b9bff;
    transition: 0.5s;
}
.checkbtn{
    font-size: 30px;
    color: white;
    float: right;
    line-height: 80px;
    margin-right: 40px;
    cursor: pointer;
    display: none;
}
#check{
    display: none;
}
@media (max-width: 952px){
    label.logo{
        font-weight: 30px;
        padding-left: 50px;
    }
    nav ul li a{
    font-size: 16px;
    }
}
@media (max-width: 858px){
    .checkbtn{
        display: block;
    }
    ul{
        position: fixed;
        width: 100%;
        height: 100vh;
        background: #2c3e50;
        top: 80px;
        left: -100%;
        text-align: center;
        transition: all 0.5s;
    }
    nav ul li{
        display: block;
        margin: 50px 0;
        line-height: 30px;
    }
    nav ul li a{
        font-size: 20px;
    }
    a:hover,a.active{
        background: none;
        color: #0082e6;
    }
    #check:checked ~ ul{
        left: 0;
    }
}

section{
    background: url(../mobiledashboard.jpg) no-repeat;
    background-size: cover;
    height: calc(100vh - 80px);
    opacity: 0.8;
}
table{
    
    width: 80%;
    table-layout: fixed;
    margin-top: 35px;
    margin-left: auto;
    margin-right: auto;
}
tr{
    height: 40px;
    border: 1px solid #2c3e50;
    
}
td{
    border: 1px solid #2c3e50;
}

 </style>
</head>
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo"><span>Mobile</span>Pasa</label>
    <ul>
         <li ><a  href="admindashboard.php">Home</a></li>
        <li><a href="addphone.php">Add Phone</a></li>
        <li><a class="active" href="#">View Phone</a></li>
        <li><a href="view_order.php">View Orders</a></li>
    </ul>
</nav>

    <main>

        <div id="showcategory">
                <div class="categoryheading" style="margin-top:25px; text-align:center;">
                    <h2 style="margin-left:5vw;">Category of Product</h2>
                </div>
                <div class="container">
                <table style="border-collapse:collapse;" class="table">
                <tbody>
                    <tr style="background-color:#ff7200; text-align:center ">
                        <th>Phone Id</th>
                        <th>Phone Name</th>
                        <th>Phone Description</th>
                        <th>Phone Price</th>
                       
                        <th>Phone Company</th>
                        
                    </tr>
                    <?php
                        
                        $query='SELECT * FROM phone';
                        $result=mysqli_query($db_con,$query);
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <tr style="text-align: center;">
                        <td><?php echo $row['phone_id']?></td>
                        <td><?php echo $row['phone_name']?></td>
                        <td><?php echo $row['description']?></td>
                        <td><?php echo $row['price']?></td>
                        <td><?php echo $row['company']?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                </tbody>
                </table>
                </div>
            </div>
        
    </main>

</body>
</html>