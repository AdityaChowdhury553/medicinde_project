<?php

session_start();

$IsAdmin = (!empty($_SESSION['ADMIN'])) ? true : false;

if (!$IsAdmin) {
    echo "<script>
    alert('Only Admin Can View This Page');
    window.location.href='admin.php';
    </script>";
}else{

$env = parse_ini_file('.env');

$HOST     = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];



$MedName     = $_POST['mname'];
$Composition = $_POST['mcomp'];
$UsedFor     = $_POST['mused_for'];
$Price       = $_POST['mprice'];

$fileName = time() .' '. $_FILES['mpic']['name'];
$fileType = $_FILES['mpic']['type'];
$fileSize = $_FILES['mpic']['size'];
$fileTmp  = $_FILES['mpic']['tmp_name'];

$destination = './uploads/' . $fileName;

$imgPath = $destination;

function isImg($fileType)
{
    $isImg = ($fileType == 'image/jpg'
        || $fileType == 'image/jpeg'
        || $fileType == 'image/png'
        || $fileType == 'image/gif') ? true : false;

    return $isImg;
}

function imgSize($fileSize)
{
    $imgSize = ($fileSize <= 800 * 1024);

    return $imgSize;
}


if (isImg($fileType)) {
    if (imgSize($fileSize)) {
        move_uploaded_file($fileTmp, $imgPath);

        try{
                $c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE",$USERNAME,$PASSWORD);

                $c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $SQL = "insert into medicine(medicine_name,composition,used_for,price,medicine_image) values(:mn,:cm,:uf,:pr,:mi)";

                $stmnt = $c1->prepare($SQL);

                $bindParams = [
                    ':mn' => $MedName,
                    ':cm' => $Composition,
                    ':uf' => $UsedFor,
                    ':pr' => $Price,
                    ':mi' => $imgPath
                ];

                $stmnt->execute($bindParams);


                $rows = $stmnt->rowCount();

                $msg = ($rows==1)? 'insert_done' : 'insert_failed';

                $_SESSION['msg'] = $msg;

                header("location:admin_dashboard.php");
                exit();
                

        }catch(PDOException $ex){
            echo $ex->getMessage();
        }

        $c1 = NULL;

    } else {
        $_SESSION['msg'] = "img is above 800kb";
    }
} else {
    $_SESSION['msg'] = 'pls upload img in correct format';
}

}

?>