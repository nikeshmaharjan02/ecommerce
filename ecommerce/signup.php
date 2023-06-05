<?php
    require 'connection/connection.php';
    session_start();
    if(isset($_SESSION['cid'])){
        header('location: products.php');
    }
    
?>
<?php
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        
        if(!empty($name) && !empty($email) && !empty($password) && !empty($contact) && !empty($city) && !empty($address) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $query3 = "SELECT * FROM customer WHERE email = '$email' OR contact = '$contact'";
            $result3 = mysqli_query($db_con,$query3);
            if($result3){
                if(mysqli_num_rows($result3)>0){
                    echo 'Credentials already used.';
                }
                else{
                    $sql='INSERT INTO customer(username,email,password,contact,city) VALUES("'.$name.'","'.$email.'","'.$password.'","'.$contact.'","'.$city.'")';
                    if(mysqli_query($db_con,$sql)){
                        $cid=mysqli_insert_id($db_con);
                        $_SESSION['cid']=$cid;
                        header('location:index.php');
                    }
                    else{
                        echo 'Error3: '.mysqli_error($db_con);
                    }
                }
            }
            else{
                echo 'Error2: '.mysqli_error($db_con);
            }
        }
        else{
            echo 'Error1: Empty fields';
        }
            
        }
        
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>My Shoes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4" style="color:green" >
                        <div class="panel panel-primary">
                        <div class="panel-heading" style="text-align:center" >Sign Up</div>
                        <form method="post" action="signup.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div> 
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group"> 
                                <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="City" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                            </div>
                            <div class="form-group" >
                                <input type="submit" name="register" class="btn btn-success"  value="Sign Up" style="float:center" >
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="https://www.nike.com/">My Shoes</a> Store. All Rights Reserved.</p>
               </center>
               </div>
           </footer>

        </div>
    </body>
</html>
