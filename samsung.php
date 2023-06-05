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
            <div>
        <header class="header" style="margin-top:0.1px;">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="header_logo">
                    <a href="index.php"><span>Mobile</span>Pasa</a>
                </div>
            </div>
            <div class="col-lg-6">
                    
                <nav class="header_menu">
                    
                    <ul>
                        <li class="active"> <a href="index.php" >Home</a></li>
                        <li> <a href="#products">Products</a></li>
                        <li> <a href="#offers">Offers</a></li>
                        <li> <a href="#aboutus">About Us</a></li>
                        <li> <a href="#footer">Contact Us</a></li>
                        
                    </ul>

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
            <section class="categories" id="home"> 
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/home4.jpg" height="525px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block mb-5 pb-5">
                        <h2>Best Mobile Shop in Town</h2>
                        <p>We provide you mobile phones at affordable price.</p>
                        <a href="#products"><button class="btn btn-home">Shop Now</button></a>
                
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="image/home5.jpg"  height="525px" class="d-block w-100" alt="#">
                    <div class="carousel-caption d-none d-md-block mb-5 pb-5">
                        <h2>Best Mobile Shop in Town</h2>
                        <p>We provide you mobile phones at affordable price.</p>
                        <a href="#products"><button class="btn btn-home">Shop Now</button></a>
            
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="image/mia-baker-15q2ZCDbQFU-unsplash.jpg" height="525px" class="d-block w-100" alt="#">
                    <div class="carousel-caption d-none d-md-block mb-5 pb-5">
                        <h2>Best Mobile Shop in Town</h2>
                        <p>We provide you mobile phones at affordable price.</p>
                        <a href="#products"><button class="btn btn-home">Shop Now</button></a>
                    
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section> 
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
            $sql='SELECT * FROM phone WHERE company = "samsung"';
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


        <!-- -------------------offer------    -->

        <section id="offers" class="offer" style="background-image: url(/mobilepasa/image/banner.webp);">
            <h4>Repair Services</h4>
            <h2>Up To <span>30% Off</span> - All Phones and Accessories</h2>
            <button class="btn explore-btn">Explore More</button>

        </section>


        <section id="aboutus" class="my-5 pb-5">
            <div class="container container-about container-fluid">
            <div class="content-section">
            <div class="title text-center">
                <h3>ABOUT US</h3>
                <hr style="height: 3px; opacity: 1;" class="mx-auto">
            </div>
            <div class="content">
            <h3 class="pb-2">We provide a best mobile with affordable price.</h3>
            <p>Customer Satisfaction is our primary goal. We try to maintain best relation  with our customer.</p>
            <div class="btn btn-about mt-3"><a href="#">Read More</a></div>
            </div>
            <div class="social pt-4">
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            </div>
            </div>
            <div class="image-section">
            <img src="image/mia-baker-15q2ZCDbQFU-unsplash.jpg" alt="">
            </div>

        </div>
        </div>
        </section>




        <section id="brands">
            <div class="small-container container-fluid">
            <div class="row container-fluid mx-2">
                <div class="col-5">
                <img src="/image/apple.png" alt="">
                </div>
                <div class="col-5">
                <img src="/image/oppo.png" alt="">
                </div>
                <div class="col-5">
                <img src="/image/samsung.png" alt="">
                </div>
                <div class="col-5">
                <img src="/image/realme.png" alt="">
                </div>
                <div class="col-5">
                <img src="/image/xiomi.png" alt="">
                </div>
            </div>
            </div>

        </section>

    <!-- ---------------------footter---------------------- -->


        <section class="footer mt-5" id="footer">
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
                <h5 class="pb-4">QUICK LINKS</h5>
                <a href="#home"><p class="link"><span><i class="fas fa-angle-double-right"></i></span> Home</p></a>
                <a href="#products"><p class="link"><span><i class="fas fa-angle-double-right"></i></span> Products</p></a>
                <a href="#aboutus"><p class="link"><span><i class="fas fa-angle-double-right"></i></span> About Us</p></a>
                <a href="#offers"><p class="link"><span><i class="fas fa-angle-double-right"></i></span> Offers</p></a>
    
        
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
    </body>
    </html>