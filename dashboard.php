<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
            <!---ADD TO CART EMOJI--->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>


    <?php
    $env = parse_ini_file('.env');

    try {
        $HOST = $env['HOST'];
        $USERNAME = $env['USERNAME'];
        $PASSWORD = $env['PASSWORD'];
        $DATABASE = $env['DATABASE'];

        $c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USERNAME, $PASSWORD);
        $c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $SQL = "select * from medicine";
        $stmnt = $c1->prepare($SQL);
        $stmnt->execute();
        ?>

        <div class="container-fluid">

            <?php if (!empty($_SESSION['USER'])) { ?>
                <div class="float-right">
                    <?php
                    try{
                        
                        $c2 = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USERNAME, $PASSWORD);
                        $c2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $SQL2 = "select * from cart where user_id =".$_SESSION['USER-ID'];
                        $stmnt2 = $c2->prepare($SQL2);
                        
                        $stmnt2->execute();

                        $cartInfo=[];

                        while($rows1=$stmnt2->fetch(PDO::FETCH_ASSOC)){
                            array_push($cartInfo,[$rows1['user_id']]);
                        }

                        $stmnt1=NULL;
                            echo "<a href='viewCart.php'class='d-flex align-items-center'><i class='fas fa-shopping-cart mr-1'></i><span class='badge badge-pills badge-danger'>".count($cartInfo)."</span>CART</a>";
                    }catch(PDOException $ex1){
                        
                        echo $ex1->getMessage();
                    
                }
                    ?>
                    Welcome<?php echo $_SESSION['USER']; ?>
                    <a href="Logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
                </div>
            <?php } else {

                header("location:front.php");

            } ?>
        </div>
        <header class="jumbotron">
            <h2>Medicine Dashboard</h2>
        </header>
        <?php

        if (!empty($_SESSION['message'])) {
            if ($_SESSION['message'] == 'cart_done') {
                echo "<div class='alert alert-success'>Add To Cart Done</div>";
            } else if ($_SESSION['message'] == 'cart_failed') {
                echo "<div class='alert alert-danger'>Cart Failed</div>";
            }
        }
        unset($_SESSION['message']);


        ?>
        <div class="card m-2 p-2 border">

            <div class="row">
                <?php
                while ($rows = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-lg-4">
                        <div class="card m-2 p-2 border">
                            <header class="bg-info modal-header">
                                <h3><?php echo $rows['medicine_name']; ?>'s Info</h3>
                            </header>
                            <p><img src="<?php echo $rows['medicine_image']; ?>" alt="<?php echo $rows['medicine_name']; ?>"
                                    width="100%" height="220px"></p>
                            <p>Composition: <?php echo $rows['composition']; ?></p>
                            <p>Used For: <?php echo $rows['used_for']; ?></p>
                            <p>Price:<span class="badge badge-pills badge-danger">&#8377;<?php echo $rows['price']; ?></span>
                            </p>
                            <div class="form-group text-center">
                                <a href="addToCart.php?mid=<?php echo $rows['medicine_id']; ?>&uid=<?php echo $_SESSION['USER-ID']; ?>"
                                    class="btn btn-sm btn-outline-info">ADD TO CART</a>

                            </div>
                        </div>
                    </div>
                    <?php
                } // End of while loop
                ?>
            </div>
        </div>
        <?php
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>

    </div>
</body>

</html>