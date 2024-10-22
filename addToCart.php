<?php

session_start();

        //Get UserId and MedicineId[$mid and $uid]//

$medicinceId = $_GET['mid'];

$user_Id = $_GET['uid'];

$env = parse_ini_file('.env');

$HOST = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];

try {

    $c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USERNAME, $PASSWORD);

    $c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $SQL = "insert into cart(medicine_id,user_id)values(:mi,:ui)";


    $stmnt = $c1->prepare($SQL);
    $bindParams = [
        ':mi' => $medicinceId,
        ':ui' => $user_Id,
    ];

    $stmnt->execute($bindParams);

    $rows = $stmnt->rowCount();
    
    $msg = ($rows == 1)?'cart_done' : 'cart_failed';

    //echo $msg;

    $_SESSION['message'] = $msg;


}catch(PDOException $ex){
    echo $ex->getMessage();
}

header("location:dashboard.php");
exit();
?>