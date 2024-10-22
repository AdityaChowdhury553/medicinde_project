<?php 
session_start();



$env = parse_ini_file('.env');

$HOST = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];

$Name = $_POST['fname'].''.$_POST['mname'].''.$_POST['lname'];
$Contact = $_POST['contact'];
$Email = $_POST['email'];
$Education = implode(",",$_POST['edu']);
$State = $_POST['state'];
$City = $_POST['city'];
$Pin = $_POST['pin'];
$Gender = $_POST['gender'];
$Password = password_hash($_POST['pass1'],PASSWORD_BCRYPT);

$fileName = time() . '' . $_FILES['f1']['name'];
$fileType = $_FILES['f1']['type'];
$fileSize = $_FILES['f1']['size'];
$fileTmp = $_FILES['f1']['tmp_name'];

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

                $SQL = "insert into users(Name,Contact,Email,Educational,State,City,Pin,Gender,Upload,Password) values(:nm,:cn,:em,:edu,:st,:cty,:pn,:gen,:upl,:pas)";

                $stmnt = $c1->prepare($SQL);

                $bindParams = [
                    ':nm' => $Name,
                    ':cn' => $Contact,
                    ':em' => $Email,
                    ':edu'=> $Education,
                    ':st' => $State,
                    ':cty'=> $City,
                    ':pn' => $Pin,
                    ':gen'=> $Gender,
                    ':upl'=> $imgPath,
                    ':pas'=> $Password
                ];

                $stmnt->execute($bindParams);


                $rows = $stmnt->rowCount();

                $msg = ($rows==1)? 'insert_done' : 'insert_failed';

                $_SESSION['msg'] = $msg;
                header("location:index.php");
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






?>