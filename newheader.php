<?php
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



        <!-- Fontawesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">


        <!-- Local CSS -->
        <link rel="stylesheet" href="css/style.css">



        <title>Mobile Pasa</title>
    </head>
</head>
<body>
<header class="header" style="margin-top:0.1px;">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div style="text-decoration: none;" class="header_logo">
                    <a style="text-decoration: none;" href="/mobilepasa/index.php"><span>Mobile</span>Pasa</a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header_menu">
                    
                    

                </nav>
            </div>
            <div class="col-lg-3">
                

                 <div class="header_right">
                    <div class="header_right_auth">
                
                    <button type="button" class="btn position-relative">
                    <a href="/mobilepasa/cart/cart.php"><i class="fa fa-shopping-cart"></i></a>
                    </button>
                    <?php
                
                        if(empty($_SESSION['customer_id'])){
                    ?>
                        <a href="/mobilepasa/user/login.php"><button class="btn zind login-button mx-4 text-dark">Login</button></a>
                    <?php
                        }
                        else if(!empty($_SESSION['customer_id'])){
                    ?>
                        <a href="/mobilepasa/user/logout.php"><button class="btn zind login-button mx-4 danger">Logout</button></a>
                    <?php
                        }
                    ?>
                </div>
                </div>
            </div>
        </div>
    </div>

    </header>
</body>
</html>