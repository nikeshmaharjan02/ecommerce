<?php
    session_start();
    include_once '../connection/connection.php';
    if(!empty($_SESSION['admin_id'])){
        header('location:admindashboard.php');
    }
    if(isset($_POST['login'])){
        $username = $_POST['admin_username'];
        $password = $_POST['admin_password'];
        $query = 'SELECT * FROM admin WHERE username = "'.$username.'" AND password = "'.$password.'"';
        $result = mysqli_query($db_con,$query);
        if($result){
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
                
                $_SESSION['admin_id']=$row['admin_id'];
                
                header('location:admindashboard.php');
            }
            else{
                echo 'incorrect passord or username';
            }
        }
        else{
            echo 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <div class="wrapper">
        <h1>Admin Login</h1>
    <form action="login.php" method="post">
        <input type="text" name="admin_username" id="admin_username" placeholder="Username"><br>
        <input type="password" name="admin_password" id="admin_password" placeholder="Password"><br>
        <button name="login">Login</button>
    </form>
    </div>
</body>
</html>