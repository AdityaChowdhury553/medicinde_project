<?php


session_start();

$env = parse_ini_file('.env');

$HOST = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];

$EditName = $_POST['edname'];
$EditCompo = $_POST['edcompo'];
$EditUsd = $_POST['edusd'];
$EditPrice = $_POST['edpc'];
$Mid = $_POST['hidn_id'];


$isImgChanged = ($_FILES['mdfile']['error'] == 0) ? true : false;
$old_img_path = $_POST['old_img_path'];
$imgPath = "";


if ($isImgChanged) {
    $fileName = time() . '' . $_FILES['mdfile']['name'];
    $fileType = $_FILES['mdfile']['type'];
    $fileSize = $_FILES['mdfile']['size'];
    $fileTmp = $_FILES['mdfile']['tmp_name'];

    $destination = "./uploads/" . $fileName;

    $imgPath = $destination;
    move_uploaded_file($fileTmp, $imgPath);
} else {
    $imgPath = $old_img_path;
}

try {

    $c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USERNAME, $PASSWORD);

    $c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $SQL = "update medicine set medicine_name     =:edmn,
                                composition       = :cm,
                                used_for          =:uf,
                                price             =:pc,
                                medicine_image    =:impt
                                where medicine_id = :md";

    $stmnt = $c1->prepare($SQL);

    $bindParams = [
        ':edmn' => $EditName,
        ':cm' => $EditCompo,
        ':uf' => $EditUsd,
        ':pc' => $EditPrice,
        ':impt' => $imgPath,
        ':md' => $Mid
    ];

    

    $stmnt->execute($bindParams);

    $rows = $stmnt->rowCount();

    $msg = ($rows == 1) ? 'update_done' : 'update_failed';

    $_SESSION['msg'] = $msg;

    header("location:admin_dashboard.php");

    exit();

} catch (PDOException $ex) {
    echo $ex->getMessage();
}


?>