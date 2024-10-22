<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
<?php ;

$env = parse_ini_file(".env");

$medId = (!empty($_GET['mid'])) ? $_GET['mid'] : " ";

if(empty($medId)){
    echo "<div class='alert alert-warning'>Invalid UserId</div>";
}

$HOST     = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];
try{
    
$c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE",$USERNAME,$PASSWORD);

$c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$SQL = "select * from medicine where medicine_id = :mid";

$stmnt=$c1->prepare($SQL);

$bindParams=[
    ':mid' => $medId
];

$stmnt->execute($bindParams);

while($rows=$stmnt->fetch(PDO::FETCH_ASSOC)){
    $userInfo=[

        'MedName' => $rows['medicine_name'],
        'MedComp' => $rows['composition'],
        'MedUsed' => $rows['used_for'],
        'Price'   => $rows['price'],
        'Img'     => $rows['medicine_image']

    ];
    //print_r($userInfo);
}
}catch(PDOException $ex){
    echo $ex->getMessage();
}
?>

<div class="container-fluid">
    <div class="card m-2 p-2 border">
      <header class="modal-header">
        <h3><?php echo $userInfo['MedName'];?>'s Info</h3>
      </header>
      <form method="POST" action="update.php" enctype="multipart/form-data" >
        <div class="form-group">
         MedName:<input type="text" name="edname" id="edname" class="form-control" value="<?php echo $userInfo['MedName']; ?>">
        </div>
        <div class="form-group">
         MedComposition:<input type="text" name="edcompo" id="edcompo" class="form-control" value="<?php echo $userInfo['MedComp'];?>">
        </div>
        <div class="form-group">
         MedUsedFor:<input type="text" name="edusd" id="edusd" class="form-control" value="<?php echo $userInfo['MedUsed'];?>">
        </div>
        <div class="form-group">
         Price:<input type="text" name="edpc" id="edpc" class="form-control" value="<?php echo $userInfo['Price']; ?>">
        </div>
        <div class="form-group">
         Upload:<input type="file" name="mdfile" id="mdfile" onchange="loadImg(event)">
         <div id="img_preview">
            <img src="<?php echo $userInfo['Img'];?>" height="100px" width="100px">
         </div>
         <input type="hidden" name="old_img_path" id="old_img_path" value="<?php echo $userInfo['Img']; ?>">
         <input type="hidden" name="hidn_id" id="hidn_id" value="<?php echo $medId; ?>">
         <script>
            

            function loadImg(e){
                let file = e.target.files[0];
                let imgBlob =URL.createObjectURL(file);

                document.getElementById("img_preview").innerHTML=`
                <img src='${imgBlob}' height='100px' width='100px' class='img-thumbnail'/>`;
            }
            </script>
            
        </div>
        <div class="form-group">
            <a href="admin_dashboard.php" class="btn btn-sm btn-outline-info">Back</a>|
            <a href="med_del.php?mid=<?php echo $medId;?>"class="btn btn-sm btn-outline-danger" onclick="return confirm('Do You Want To Delete')">Delete</a>|
            <button class="btn btn-sm btn-outline-success">Update</button>
        </div>
      </form>  
    </div>
</div>