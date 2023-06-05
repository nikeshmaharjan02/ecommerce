<?php
    session_start();
    include_once 'connection/connection.php';
    if(isset($_POST['addtocart'])){
        if(empty($_SESSION['customer_id'])){
            header('location:user/login.php');
        }
        $customer_id=$_SESSION['customer_id'];
        $phone_id=$_POST['phone_id'];
        $sql='INSERT INTO cart (customer_id,phone_id) VALUES("'.$customer_id.'","'.$phone_id.'")';
        if(mysqli_query($db_con,$sql)){
            header('location:cart/cart.php');
        }
        else{
            echo'Error: '.mysqli_error($db_con);
        }
    }
    if(isset($_POST['buynow'])){
        if(empty($_SESSION['customer_id'])){
            header('location:user/login.php');
        }
        $customer_id=$_SESSION['customer_id'];
        $phone_id=$_POST['phone_id'];
        $sql='INSERT INTO cart (customer_id,phone_id) VALUES("'.$customer_id.'","'.$phone_id.'")';
        if(mysqli_query($db_con,$sql)){
            $order_info=mysqli_insert_id($db_con);
            header('location:cart/buynow.php?order_info='.$order_info);
        }
        else{
            echo'Error: '.mysqli_error($db_con);
        }
    }
?>
   <!DOCTYPE html>
    <!doctype html>
    <html lang="en">
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
    <body>
        
    <section id="products" class="mt-5">
            
            <div class="container text-center mt-5 py-3">
            <div class="title ">
                <h3>OUR PRODUCTS</h3>
                <hr style="height: 3px; opacity: 1;" class="mx-auto">
                <p>Here you can check out our products with affordable price.</p>
            </div>
            <div class="row pb-4">
            <div class="d-flex flex-wrap justify-content-center mt-3">
               <a href="index.php"> <button type="button" class="btn m-2 text-dark active-filter-btn">All</button></a>
                <a href="samsung.php"><button type="button" class="btn product_button m-2 text-dark">Samsung</button></a>
               <a href="apple.php"><button type="button" class="btn product_button m-2 text-dark">Apple</button></a> 
                <a href="mi.php"><button type="button" class="btn product_button m-2 text-dark">Redmi</button></a>
                <a href="realme.php"><button type="button" class=" btn product_button m-2 text-dark">Realme</button></a>
                <a href="others.php"><button type="button" class=" btn product_button m-2 text-dark">Others</button></a>
            </div>

            </div>

            <div class="row mx-auto container-fluid">
            <?php
            $sql='SELECT * FROM phone';
            if($result=mysqli_query($db_con,$sql)){
                foreach($result as $row){
            ?>
            <div onclick="" class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="image/phone/<?= $row['image']?>"
                onclick=location.href="individualproduct.php?phone_id=<?=$row['phone_id']?>"   alt="<?= $row['phone_name']?>">
                
                <h6 class="p-name"><?= $row['phone_name']?></h6>
                <div class="p-price">Rs. <?= $row['price']?></div>
                    <form action="index.php" method="post" id="myform">
                            <input type="hidden" name="phone_id" value="<?= $row['phone_id']?>">
                            <p><input type="submit" value="Buy Now" name="buynow" class=" btn buy-btn"></p>
                    </form>
                    <form action="index.php" method="post" id="myforms">
                            <input type="hidden" name="phone_id" value="<?= $row['phone_id']?>">
                            <p><input type="submit" name="addtocart" value="Add to Cart" class=" btn buy-btn"></p>
                    </form>
            </div>
            <?php
                }
            }
            ?>
            
            </div>

        </section>
    </body>