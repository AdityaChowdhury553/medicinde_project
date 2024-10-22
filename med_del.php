<?php

$IsAdmin = (!empty($_SESSION['ADMIN'])) ? true : false;

if (!$IsAdmin) {
    echo "<script>
    alert('Only Admin Can View This Page');
    window.location.href='admin.php';
    </script>";
}



session_start();

$env = parse_ini_file(".env");
$imgPath=NULL;

$medId = (!empty($_GET['mid'])) ?$_GET['mid'] : " ";

if(empty($medId)){
    echo "<div class='alert alert-danger'>User Id Is Not Present</div>";
}

$HOST     = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];
try{
    
$c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE",$USERNAME,$PASSWORD);

$c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$SQL1= "select medicine_image from medicine where medicine_id = :md";

$stmnt = $c1->prepare($SQL1);

$bindParams=[
    ':md' => $medId
];

$stmnt->execute($bindParams);

while($rows = $stmnt->fetch(PDO::FETCH_ASSOC)){
    
    //print_r($rows['medicine_image']);

    $imgPath = $rows['medicine_image'];

    unlink($imgPath);
}


$SQL2 = "delete from medicine where medicine_id = :md";

$stmnt2=$c1->prepare($SQL2);


$stmnt2->execute($bindParams);

$rows = $stmnt2->rowCount();


}catch(PDOException $ex){
    echo $ex->getMessage();
}

$msg = ($rows==1) ? 'delete_done' : 'delete_failed';

$_SESSION['msg'] = $msg;

header("location:admin_dashboard.php");



?>

