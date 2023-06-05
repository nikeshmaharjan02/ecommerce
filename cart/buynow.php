<?php
    session_start();
    require '../connection/connection.php';
    
    if(isset($_POST['checkout'])){
        $cart_id=$_POST['cart_id'];
        $phone_id=$_POST['phone_id'];
        $customer_id=$_POST['customer_id'];
        $delivery_location=$_POST['delivery_location'];
        $contact=$_POST['contact'];
        $payment_id=$_POST['payment'];
        if(!empty($phone_id) &&!empty($customer_id) && !empty($delivery_location) && !empty($contact) && !empty($payment_id)){
            $sql='INSERT INTO orders(delivery_location,contact,customer_id,phone_id,payment_id) VALUES("'.$delivery_location.'","'.$contact.'","'.$customer_id.'","'.$phone_id.'","'.$payment_id.'")';
            if(mysqli_query($db_con,$sql)){
                $query1='DELETE FROM cart where cart_id = "'.$cart_id.'"';
                if(mysqli_query($db_con,$query1)){
                    header('location:../index.php');
                }
                else{
                    echo 'Error2: '.mysqli_error($db_con);
                }
            }
            else{
                echo 'Error1: '.mysqli_error($db_con);
            }
        }
        else{
            echo 'Error: All field required';
        }
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
       <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;;
        }
        .wrapper{
            width: 350px;
            padding: 2rem 1rem;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }
        .buy-now{
            font-size: 2rem;
            color: #07001f;
            margin-bottom: 1.2rem;
        }
        .inp{
            width: 92%;
            outline: none;
            border: 1px solid #fff;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 20px;
            background: #e4e4e4;
        }
        .inp:focus{
            border: 1px solid rgb(192, 192, 192);
        }
        .radio-list{
            text-align: left;
            margin: 2px 70px;
        }
        #checkout{
            font-size: 1rem;
            /* margin-top: 1.8rem; */
            padding: 10px 0;
            border-radius: 20px;
            outline: none;
            border: none;
            width: 90%;
            color: #fff;
            cursor: pointer;
            background: rgb(17, 107, 143);

        }
       </style>
        
    </head>
    <body style="background: #dfe9f5;">
            <?php
                include_once '../newheader.php';
            ?>
    
        
            
            <br>
            <main>
            <div class="container" style="padding-top: 15vh;">
                
                    <?php
                    
                    if(isset($_GET['order_info'])){
                        $cart_id=$_GET['order_info'];
                        $query="SELECT * FROM cart WHERE cart_id = '".$cart_id."'";
                        $result = mysqli_query($db_con,$query);
                        if($result){
                                $row=mysqli_fetch_array($result);
                                $phone_id=$row['phone_id'];
                                
                                $sql = 'SELECT * FROM phone WHERE phone_id = "'.$phone_id.'"';
                                if($result5=mysqli_query($db_con,$sql)){
                                    while($phone = mysqli_fetch_array($result5)){
                                        
                           
                         ?>
                         <div class="wrapper">
                            <h1 class="buy-now">Buy Now</h1>
                            <div class="row">
                          <div class="col-xs-6 col-xs-offset-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                <form action="buynow.php" method="post">
                            <input class="inp" type="text" id="contact" name="contact" placeholder="Enter your phone number"><br>
                            <input class="inp" type="text" id="delivery_location" name="delivery_location" placeholder="Enter delivery Address"><br>
                            <label for="total_price">Price: &emsp;Rs.</label>
                            <input class="inp" type="money" readonly name="price" id="price" value="<?= $phone['price']?>"><br>
                            
                            <label for="payment">Enter your desired mode of payment:</label>
                            <br>

                            <div class="radio-list">
                                <div class="radio-item">
                                <input type="radio" id="cod" name="payment" value="1" checked>
                                <label for="cod">Cash on delivery</label>      
                                </div>
                                <div class="radio-item">
                                <input type="radio" id="esewa" name="payment" value="2">
                                 <label for="esewa">Esewa</label>
                                </div>
                                <div class="radio-item">
                                <input type="radio" id="khalti" name="payment" value="3">
                                <label for="khalti">Khalti</label>
                                </div>
                                <div class="radio-item">
                                <input type="radio" id="phonepay" name="payment" value="4">
                                <label for="khalti">Phone Pay</label>
                                </div>
                                <br>
                                
                            </div>


                            <input type="hidden" name="phone_id" value="<?= $row['phone_id']?>">
                            <input type="hidden" name="customer_id" value="<?= $row['customer_id']?>">
                            <input type="hidden" name="cart_id" value="<?= $cart_id?>">

                            <button  name="checkout" id="checkout" value="Checkout">Checkout</button>
                         </form>
                                </div>

                            </div>

                          </div>
                            </div>
                         </div>
                        
                        <?php
                                    }
                                    
                                }
                            }
                        }
                        ?>
                    
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