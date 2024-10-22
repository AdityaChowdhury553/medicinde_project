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
    <style>
        .modal-header {
    background-color: #bff7ec;
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid #ccc;
}

.modal-header h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

    </style>
</head>
<body>


    <div class="container-fluid">
        <?php 
        
        if(!empty($_SESSION['msg'])){
            if($_SESSION['msg']=="admin_login_success"){
                echo "<div class='alert alert-success'>Admin Successfully Logged In</div>";
            }else if($_SESSION['msg']=="login_failed"){
                echo "<div class='alert alert-danger'>Login Failed Please Enter Correct Credentials</div>";
            }
        }unset($_SESSION['msg']);
        
        ?>
        <header class="modal-header">
            <h1>Welcome To Administration Page</h1>
        </header>
        <div class="card m-2 p-2 border">
            <form method="POST" action="admin_login.php">
                <div class="form-group">
                 UserName<input type="text" name="admin" id="admin" placeholder="Enter Username" class="form-control">
                </div>
                <div class="form-group">
                 Password<input type="password" name="password" id="password" placeholder="*****" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-outline-info">Login</button>|
                    <a href="front.php" class="btn btn-sm btn-outline-success">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>