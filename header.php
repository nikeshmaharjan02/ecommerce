<header class="header" style="margin-top:0.1px;">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="header_logo">
                    <a href="/mobilepasa/index.php"><span>Mobile</span>Pasa</a>
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