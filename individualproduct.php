<?php



    session_start();
    include_once 'connection/connection.php';
    require 'header.php';
    
?>
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


        
    
<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;

}
.productdetail{
    margin-top: 500px;
}
.header{
    margin-top: -50px;
}
        .small-img-group{
    display: flex;
    justify-content: space-between;
}
.right{
    margin-left: 30px;
}
.small-img-col{
    flex-basis: 24%;
    cursor: pointer;
}
.productdetail select{
    display: block;
    padding: 5px 10px;
}
.productdetail input{
    width: 60px;
    height: 30px;
    padding-left: 10px;
    font-size: 12px;
    margin-right: 10px;

}
.productdetail input:focus{
    outline: none;
}
.buy-button{
    background-color: #ff7200;
    opacity: 1;
    transition: 0.3s all;
    min-width: 8vw;
    color: white;
}
.productdetail .buy-button:focus{
    outline: none;
}
h6{
    color: #ddd;
}
     </style>



    <title>ProductDetail</title>
  </head>
  <body>
    

<div class="product_individual" style="padding-top: 15vh;">
<section class=" container productdetail my-5 ">
    <?php
        if(isset($_GET['phone_id'])){
            $phone_id=$_GET['phone_id'];
                $sql = 'SELECT * FROM phone Where phone_id = "'.$phone_id.'"';
                $result=mysqli_query($db_con,$sql);
                if($result){
                    $phone=mysqli_fetch_array($result);
    ?>
    <div class="row mt-5">
        <div class="col-lg-5 col-md-12 col-12">
            <img class="img-fluid w-100 pb-1" src="image/phone/<?= $phone['image']?>" id="mainimg" alt="">
        </div>

        <div class="col-lg-6 col-md-12 col-12 right">
            
            <h3 class="py-4"><?= $phone['phone_name']?></h3>
            <h2>Rs.<?= $phone['price']?></h2>
            
            <form action="index.php" method="post" id="myform">
                    <input type="hidden" name="phone_id" value="<?= $phone['phone_id']?>">
                    <input type="submit" value="Buy Now" name="buynow" class="btn buy-btn buy-button">
            </form><br>
            <form action="index.php" method="post" id="myforms">
                    <input type="hidden" name="phone_id" value="<?= $phone['phone_id']?>">
                    <input type="submit" name="addtocart" value="Add to Cart" class=" btn buy-btn buy-button">
            </form>
            
            <h4 class="mt-5 mb-5">Product Details</h4>
            <span><?= $phone['description']?></span>


        </div>
    </div>
    <?php
                }
    }
    ?>

</section>
</div>
<section id="products" class="mt-5">
        
    <div class="container text-center mt-5 py-3">
      <div class="title ">
        <h3>RELATED PRODUCTS</h3>
        <hr style="height: 3px; opacity: 1;" class="mx-auto">
     </div>

     
    <div class="row mx-auto container-fluid pt-5">
    <?php
        
        $sql = 'SELECT * FROM phone Where company ="'.$phone['company'].'"AND NOT phone_id="'.$phone_id.'" LIMIT 4';
        $result=mysqli_query($db_con,$sql);
        if($result){
            foreach($result as $row){
 ?>
      <div class="product text-center col-lg-3 col-md-4 col-12" onclick=location.href="individualproduct.php?phone_id=<?=$row['phone_id']?>">
        <img class="img-fluid mb-3" src="image/phone/<?= $row['image']?>"   alt="<?= $row['phone_name']?>">
        
        <h6 class="p-name"><?= $row['phone_name']?></h6>
        <div class="p-price">Rs. <?= $row['price']?></div>
        
      </div>
      <?php
                }
        
                }
     ?>
      
    </div>

  </section>


    <section class="footer mt-2">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-lg-4">
              <h4>Mobile Pasa</h4>
              <p class="py-4">Mobile Pasa which is located at Satungal, Chandragiri which was established back in 2072 and has been providing mobile phones in a very affordable price.</p>
              <span class="social"><i class="fab fa-facebook"> </i></span>
              <span class="social"><i class="fab fa-facebook-messenger px-2"> </i></span>
              <span class="social"><i class="fab fa-google-plus"> </i></span>
              <span class="social"><i class="fab fa-pinterest px-2"> </i></span>
            </div>
            <div class="col-lg-3 offset col-md-3 col-sm-4 col-11 mb-2">
              
      
            </div>
            <div class="col-lg-4">
              <h5 class="pb-4">HOME LOCATION</h5>
              <p>Satungal, Chandragiri-10</p>
              <p class="link pt-3">+977 4-315046</p>
              <p class="link">mobilepasa@gmail.com</p>
            </div>
          </div>
          <div class="row py-2">
            <div class="col-lg-12">
              <div class="card text-center py-2">
                <p>MobilePasa  ©   2019 , Theme By <span>MOBILEPASA.COM</span></p>
              </div>
            </div>
          </div>
        </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
        var mainimg =document.getElementById('mainimg');
        var smallimg = document.getElementsByClassName('small-img');

        smallimg[0].onclick = function(){
            mainimg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function(){
            mainimg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            mainimg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            mainimg.src = smallimg[3].src;
        }
    </script>
  </body>
  </html>