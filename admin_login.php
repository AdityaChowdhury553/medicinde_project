<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

    $AdminUser = $_POST['admin'];
    $Password  = $_POST['password'];
?>



<?php 
    
    $env = parse_ini_file('.env');

    $HOST     = $env['HOST'];
    $USERNAME = $env['USERNAME'];
    $PASSWORD = $env['PASSWORD'];
    $DATABASE = $env['DATABASE'];
    

    try{

        $c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE",$USERNAME,$PASSWORD);

        $c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $SQL = "select * from admin where admin_username = :au and pass = :pa";

        $stmnt = $c1->prepare($SQL);

        $BindParams = [
            ':au' => $AdminUser,
            ':pa' => $Password
        ];

        $stmnt->execute($BindParams);

        if($rows = $stmnt->fetch(PDO::FETCH_ASSOC)){
           // print_r($rows);

            $_SESSION['ADMIN']    = $rows['admin_username'];
            $_SESSION['ADMIN-ID'] = $rows['admin_id'];
            $_SESSION['msg']      = "admin_login_success";

            header("Location: admin_dashboard.php");
            exit();

        }else{
            $_SESSION['msg'] = "login_failed";

            header("location:admin.php");
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
     
    ?>
</body>
</html>