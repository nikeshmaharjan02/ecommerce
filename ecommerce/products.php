<?php
    session_start();
    include_once 'connection/connection.php';
    if(isset($_POST['addtocart'])){
        if(empty($_SESSION['cid'])){
            header('location:login.php');
        }
        $cid=$_SESSION['cid'];
        $shoes_id=$_POST['shoes_id'];
        $sql='INSERT INTO cart (cid,shoes_id) VALUES("'.$cid.'","'.$shoes_id.'")';
        if(mysqli_query($db_con,$sql)){
            header('location:cart.php');
        }
        else{
            echo'Error: '.mysqli_error($db_con);
        }
    }
    if(isset($_POST['buynow'])){
        if(empty($_SESSION['cid'])){
            header('location:login.php');
        }
        $cid=$_SESSION['cid'];
        $shoes_id=$_POST['shoes_id'];
        $sql='INSERT INTO cart (cid,shoes_id) VALUES("'.$cid.'","'.$shoes_id.'")';
        if(mysqli_query($db_con,$sql)){
            $order_info=mysqli_insert_id($db_con);
            header('location:buynow.php?order_info='.$order_info);
        }
        else{
            echo'Error: '.mysqli_error($db_con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
        main> #shoesDiv{
            display: grid;
            grid-template-columns:auto auto auto;
            justify-content:space-evenly;
        }
        main > #shoesDiv :hover{
            cursor: pointer;
        }

        main>#shoesDiv >.phoneCard{
            min-height: 40vh;
            width: 25vw;
            margin: 3vh 5% 0 5%;
            background-color:aliceblue ;
            text-align: center;
        }
        
        main>#shoesDiv >.shoesCard >.shoesImage> img{
            height: 80%;
            width: 75%;
            margin-top: 10%;
        }

    </style>
</head>
<body>
        <?php
          include 'header.php';
        ?>
        <div class="container">
                <div class="jumbotron">
                    <h1 style="text-align:center">Shoes :For all walks of Life"</h1>
                    
                    <p></p>
                </div>
                
            </div>
        <div>
      
        <main>
          <div>
                   <a href="cart.php">
             
                      </a>
            </div>
         <div id="shoesDiv">

          <?php
            if(isset($_GET['brand'])){
            $brand=$_GET['brand'];
            $sql = 'SELECT * FROM shoes where brand ="'.$brand.'"';
            $result=mysqli_query($db_con,$sql);
            if($result){
            while ($row = mysqli_fetch_array($result)) {
        ?>
        
          <div class="shoesCard">
         <div class="shoesImage">
            <img src="admin/image/<?= $row['image'] ?>" alt="<?= $row['sname']?>"><br>
         </div>
                <div class="shoesName">
            <h3><?= $row['sname']?></h3>
                </div>
                <div class="shoesprice">
            <p>Price: <?= $row['price']?></p>
                </div>
                <div class="description">
            <p>Description: <?= $row['description']?></p>
                </div>
                <div>
                        <form action="products.php" method="post" id="myform">
                            <input type="hidden" name="shoes_id" value="<?= $row['shoes_id']?>">
                            <p><input type="submit" value="Buy Now" name="buynow" class="btn btn-primary btn-block"></p>
                        </form>
                        <form action="products.php" method="post" id="myforms">
                            <input type="hidden" name="shoes_id" value="<?= $row['shoes_id']?>">
                            <p><input type="submit" name="addtocart" value="Add to Cart" class="btn btn-block btn-success"></p>
                        </form>
                </div>
            </div>
             <?php
                }       
              }
                    else{
                        die("Error: " . mysqli_error($db_con));
                    }
             }
             ?>
        
             </div>

        
        </main>
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