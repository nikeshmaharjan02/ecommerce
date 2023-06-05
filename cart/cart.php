<?php
    session_start();
    require '../connection/connection.php';
    
    if(empty($_SESSION['customer_id'])){
        header('location: ../user/login.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        


        
</head>
<body>

        
            <?php
                include_once '../newheader.php';
            ?>
            
            <br>
            <main>
            <div class="container" style="padding-top: 15vh;">
            <h3>CART</h3>
                <hr style="height: 3px; opacity: 1; margin-left: 8px; margin-top:-3px; color: #ff7200;">
                <table style="border-collapse:collapse;" class="table">
                    <tbody>
                    
                        <tr style="background-color:#ff7200; text-align:center ">
                            <th>Item Number</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Checkout</th>
                            <th>Remove</th>
                        </tr>
                       <?php
                        $customer_id=$_SESSION['customer_id'];

                        
                        $query="SELECT * FROM cart WHERE customer_id = '".$customer_id."'";
                        $result = mysqli_query($db_con,$query);
                        if($result){
                            $sn=0;
                            foreach($result as $row){
                                $sn++;
                                $phone_id=$row['phone_id'];
                                $sql = 'SELECT * FROM phone WHERE phone_id = "'.$phone_id.'"';
                                $result5=mysqli_query($db_con,$sql);
                                if($result5){
                                    while($phone = mysqli_fetch_array($result5)){
                                        
                           
                         ?>
                        <tr style="text-align: center;">
                            <td><?php echo $sn ?></td>
                            <td><?php echo $phone['phone_name']?></td>
                            <td><?php echo $phone['price']?></td>
                            <td><a style="text-decoration: none; color: black;" href='buynow.php?order_info=<?php echo $row['cart_id'] ?>'>Checkout</a></td>
                            <td><a style="text-decoration: none; color: black;"  href='cart_remove.php?cart_id=<?php echo $row['cart_id'] ?>'><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
            </main>
            <footer class="footer">
               <div class="container">
                <center>
                <p>Copyright &copy <a href="../index.php">MobilePasa</a> Store. All Rights Reserved.</p>
               </center>
               </div>
           </footer>
    </body>
</html>