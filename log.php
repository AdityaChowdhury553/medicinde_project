<?php
session_start();

$env = parse_ini_file('.env');

$HOST = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];


$UserName = $_POST['username'];
$Password = $_POST['userpass'];

try {
    $c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USERNAME, $PASSWORD);

    $c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $SQL = "select * from users where Name = :un or Contact = :un";

    $stmnt = $c1->prepare($SQL);

    $bindParams = [
        ':un' => $UserName,

    ];

    $stmnt->execute($bindParams);

    if ($rows = $stmnt->fetch(PDO::FETCH_ASSOC)) {
        //print_r($rows);
        //print_r($rows['Password']);
        $dbPass = $rows['Password'];
        $isPass = password_verify($Password,$dbPass) ? true : false;

        if($isPass){
                $_SESSION['USER'] = $rows['Name'];
                $_SESSION['USER-ID']   = $rows['user_id'];
                $_SESSION['IP']   = $_SERVER['REMOTE_ADDR'];

                header("location:dashboard.php");
        }else{
            echo "Login Failed";
        }
        }else{
            echo "Invalid User";
        }
    
} catch (PDOException $ex) {
    echo $ex->getMessage();
}




?>