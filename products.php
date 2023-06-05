<?php
    session_start();
    include_once 'connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <style>
        main> #phoneDiv{
            display: grid;
            grid-template-columns:auto auto auto;
            justify-content:space-evenly;
        }
        main > #phoneDiv :hover{
            cursor: pointer;
        }

        main>#phoneDiv >.phoneCard{
            min-height: 40vh;
            width: 25vw;
            margin: 3vh 5% 0 5%;
            background-color:aliceblue ;
            text-align: center;
        }
        
        main>#phoneDiv >.phoneCard >.phoneImage> img{
            height: 80%;
            width: 75%;
            margin-top: 10%;
        }

    </style>
</head>
<body>
    <main>
        <div id="phoneDiv">

            <?php
            if(isset($_GET['brand'])){
                $brand=$_GET['brand'];
                $sql = 'SELECT * FROM phone where brand ="'.$brand.'"';
                $result=mysqli_query($db_con,$sql);
                if($result){
                while ($row = mysqli_fetch_array($result)) {?>
                    
                <div class="phoneCard">
                    <div class="phoneImage">
                        <img src="admin/image/<?= $row['image'] ?>" alt="<?= $row['pname']?>"><br>
                    </div>
                    <div class="phoneName">
                        <h3><?= $row['pname']?></h3>
                    </div>
                    <div class="phoneprice">
                        <p>Price: <?= $row['price']?></p>
                    </div>
                    <div class="description">
                        <p>Description: <?= $row['description']?></p>
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
</body>
</html>