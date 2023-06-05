<?php
    require '../connection/connection.php';
    session_start();
    
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        
        if(!empty($name) && !empty($email) && !empty($password) && !empty($contact) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $query3 = "SELECT * FROM customer WHERE email = '$email' OR contact = '$contact'";
            $result3 = mysqli_query($db_con,$query3);
            if($result3){
                if(mysqli_num_rows($result3)>0){
                    echo 'Credentials already used.';
                }
                else{
                    $sql='INSERT INTO customer(name,email,password,contact) VALUES("'.$name.'","'.$email.'","'.$password.'","'.$contact.'")';
                    if(mysqli_query($db_con,$sql)){
                        $cid=mysqli_insert_id($db_con);
                        $_SESSION['cid']=$cid;
                        header('location:../index.php');
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

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;;
        }
        body{
            background: #dfe9f5;

        }
        .wrapper{
            width: 330px;
            padding: 2rem 1rem;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }
        h1{
            font-size: 2rem;
            color: #07001f;
            margin-bottom: 1.2rem;
        }
        form input{
            width: 92%;
            outline: none;
            border: 1px solid #fff;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 20px;
            background: #e4e4e4;
        }
        button{
            font-size: 1rem;
            margin-top: 1.8rem;
            padding: 10px 0;
            border-radius: 20px;
            outline: none;
            border: none;
            width: 90%;
            color: #fff;
            cursor: pointer;
            background: rgb(17, 107, 143);

        }
        button:hover{
            background: rgba(17, 107, 143, 0.877);;
        }
        input:focus{
            border: 1px solid rgb(192, 192, 192);
        }
        .member{
            font-size: 0.8rem;
            margin-top: 1.4rem;
            color: #636363;
        }
        .member a{
            color: rgb(17, 107, 143);
            text-decoration: none;
        }
    </style>
    </head>
    <body>
        <div>
            
            <br><br>
            <div class="container-fluid wrapper">
                <h1>Sign Up</h1>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4" style="color:green" >
                        <div class="panel panel-primary">
                        <form method="post" action="registration.php">
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
                            
                            <div class="form-group" >
                            <button type="submit" name="register" >Sign UP</button>
                                
                            </div>
                        </form>
                        <div class="member">
                            Already a member? <a href="../user/login.php">Login Here</a>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="../index.php">MobilePasa</a> Store. All Rights Reserved.</p>
               </center>
               </div>
           </footer>

        </div>
    </body>
</html>
