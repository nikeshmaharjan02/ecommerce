<?php 
    // include '/xampp/htdocs/myshoes/header.php';
    include_once '../connection/connection.php';
    // if(empty($_SESSION['admin_id'])){
    //     header('location:/myshoes/admin/login.php');
    // }
    if(isset($_POST['deliver'])){
        $status=$_POST['status']+1;
        $order_id=$_POST['order_id'];
        $sql='UPDATE orders SET status="'.$status.'" WHERE order_id="'.$order_id.'"';
        $result=mysqli_query($db_con,$sql);
        if(!$result){
            echo "Error: ".mysqli_error($db_con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
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
table{
    
    width: 80%;
    table-layout: fixed;
    margin-top: 35px;
    margin-left: auto;
    margin-right: auto;
}
tr{
    height: 45px;
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
        <li><a  href="addphone.php">Add Phone</a></li>
        <li><a href="viewphone.php">View Phone</a></li>
        <li><a class="active" href="view_order.php">View Orders</a></li>
    </ul>
</nav>
    <main>
        <div class="heading">
            <h1 style="margin: 5vh 5vw; color:#5eb85a; margin-left:520px;">Order table</h1>
        </div>
        <div class="admin_table">
            <table style="border-collapse:collapse;" class="table">
                <tr style="background-color:#ff7200; text-align:center ">
                    <th>Sn</th>
                    <!-- <th>Image</th> -->
                    <th>Phone Name</th>
                    <th>Quantity</th>
                    
                    <th>Delivery Address</th>
                    
                    <th>Contact Info</th>
                    
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php
                    
                    $sql = 'SELECT * FROM orders';
                    if($result = mysqli_query($db_con,$sql)){
                        $sn=0;
                        foreach($result as $row){
                            $sn++;
                            
                        
                            $query3='SELECT phone_name FROM phone WHERE phone_id="'.$row['phone_id'].'"';
                            $phone_name=mysqli_fetch_array(mysqli_query($db_con,$query3));
                            if($row['status']==0){
                                $delivery_satus="Ordered";
                                $color='black';
                                $button_status="Deliver Package";
                            }
                            elseif($row['status']==1){
                                $delivery_satus="Delivering";
                                $color='orange';
                                $button_status="Delivered";
                            }
                            else{
                                $delivery_satus="Delivered";
                                $color='#5eb857';
                                $button_status="Done";
                            }
                           
                ?>
                <tr style="text-align: center;">
                    <td><?= $sn?></td>
                    <td><?= $phone_name['phone_name']?></td>
                    <td><?= $row['quantity']?></td>
                    
                    <td><?= $row['delivery_location']?></td>
                    
                    <td><?= $row['contact']?></td>
                    <td style="color:<?=$color?>;"><?= $delivery_satus ?></td>
                    <td>
                        <?php
                            if($row['status']==0){ ?>
                                <form action="view_order.php" method="POST">
                                    <input type="hidden" name="status" value="<?=$row['status']?>">
                                    <input type="hidden" name="order_id" value="<?=$row['order_id']?>">
                                    <input type="submit" value="<?= $button_status?>" name="deliver" class="status_button">
                                </form>
                        <?php }
                            elseif($row['status']==1){?>
                                <form action="view_order.php" method="POST">
                                    <input type="hidden" name="status" value="<?=$row['status']?>">
                                    <input type="hidden" name="order_id" value="<?=$row['order_id']?>">
                                    <input type="submit" value="<?= $button_status?>" name="deliver" class="status_button">
                                </form>
                            <?php  
                            }
                            else{
                        ?>
                            <b style="color:#5eb85a;">Done</b>
                        <?php  
                            }
                        ?>
                    </td>
                </tr>

                <?php
                        }
                    }
                ?>
            </table>
        </div>
    </main>


</body>
</html>