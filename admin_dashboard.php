<?php
session_start();

$IsAdmin = (!empty($_SESSION['ADMIN'])) ? true : false;

if (!$IsAdmin) {
    echo "<script>
    alert('Only Admin Can View This Page');
    window.location.href='admin.php';
    </script>";
}

?>


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
        <script>
          function nameValid(e) {
            var namePattern = /[a-zA-z]{3,10}/;
            var isNameValid = (namePattern.test(e)) ? true : false;

            if (isNameValid) {
                document.getElementById('mname').classList.remove("is-invalid");
                document.getElementById('nameError').innerHTML = ` `;
                document.getElementById('b1').disabled = false;
            } else {
                document.getElementById('mname').classList.add("is-invalid");
                document.getElementById('nameError').innerHTML = `Please Enter Name Properly`;
                document.getElementById('b1').disabled = true;
            }
        }

        function compValid(e){
          
          var namePattern = /[a-zA-z]{3,10}/;
            var isNameValid = (namePattern.test(e)) ? true : false;

            if (isNameValid) {
                document.getElementById('mcomp').classList.remove("is-invalid");
                document.getElementById('mcompError').innerHTML = ` `;
                document.getElementById('b1').disabled = false;
            } else {
                document.getElementById('mcomp').classList.add("is-invalid");
                document.getElementById('mcompError').innerHTML = `Please Enter Name Properly`;
                document.getElementById('b1').disabled = true;
            }
        }

        function usedValid(e){
          
          var namePattern = /[a-zA-z]{3,20}/;
            var isNameValid = (namePattern.test(e)) ? true : false;

            if (isNameValid) {
                document.getElementById('mused').classList.remove("is-invalid");
                document.getElementById('musedError').innerHTML = ` `;
                document.getElementById('b1').disabled = false;
            } else {
                document.getElementById('mused').classList.add("is-invalid");
                document.getElementById('musedError').innerHTML = `Please Enter Name Properly`;
                document.getElementById('b1').disabled = true;
            }
        }

        function priceValid(e) {
            var pricePattern =  /^[1-9]\d{1,5}$/;
            var isPriceValid = pricePattern.test(e) ? true : false;

            if (isPriceValid) {
                document.getElementById('mprice').classList.remove('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('priceError').innerHTML = ` `;
            } else {
                document.getElementById('mprice').classList.add('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('priceError').innerHTML = `Please Enter Digits Correctly`;
            }
        }

        
        </script>
</head>

<body>
    <?php

    $env = parse_ini_file('.env');

    $HOST = $env['HOST'];
    $USERNAME = $env['USERNAME'];
    $PASSWORD = $env['PASSWORD'];
    $DATABASE = $env['DATABASE'];

    ?>
    <div class="container-fluid">
            <?php 
            
                if(!empty($_SESSION['msg'])){
                    if($_SESSION['msg']=='insert_done'){
                        echo "<div class='alert alert-success'>Medicine Inserted Successfully</div>";
                    }elseif($_SESSION['msg']=='insert_failed'){
                        echo "<div class='alert alert-danger'>Medicine Insertion Failed</div>";
                    }elseif($_SESSION['msg']=='delete_done'){
                      echo "<div class='alert alert-success'>Medicine Deleted Successfully</div>";
                    }elseif($_SESSION['msg']=='delete_failed'){
                      echo "<div class='alert alert-danger'>Medicine Deletion Failed</div>";
                    }elseif($_SESSION['msg']=='update_done'){
                      echo "<div class='alert alert-success'>Medicine Updated Successfully</div>";
                    }elseif($_SESSION['msg']=='update_failed'){
                      echo "<div class='alert alert-danger'>Medicine Updation Failed</div>";
                    }
                    unset($_SESSION['msg']);
                }
            
            ?>
        <div class="card m-2 p-2 border">
            <div class="row">
                <div class="col text-right">
                    Welcome <?php echo $_SESSION['ADMIN']; ?>

                    <a href="#" class="btn btn-sm btn-outline-info" data-target="#addMedicineModal"
                        data-toggle="modal">Add
                        Medicine</a> |
                    <a class="btn btn-sm btn-outline-danger" href="admin_logout.php">Logout</a>
                </div>
            </div>
        
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Medicine Name</th>
                            <th>Medicine Composition</th>
                            <th>Used For</th>
                            <th>Medicine Price</th>
                            <th>Image</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <?php

                    try {

                        $c1 = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USERNAME, $PASSWORD);

                        $c1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        //echo "Connected";
                    
                        $SQL = "select * from medicine";

                        $stmnt = $c1->prepare($SQL);

                        $stmnt->execute();

                        //print "<pre>";

                        while ($rows = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                            //print_r($rows);
                    
                            ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $rows['medicine_name']; ?></td>
                                    <td><?php echo $rows['composition']; ?></td>
                                    <td><?php echo $rows['used_for']; ?></td>
                                    <td><?php echo $rows['price']; ?></td>
                                    <td><img src="<?php echo $rows['medicine_image']; ?>"
                                            alt="<?php echo $rows['medicine_name']; ?>" width="100px" height="150px"></td>
                                    <td><a href="view.php?mid=<?php echo $rows['medicine_id']?>" class="btn btn-sm btn-outline-info">View</td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!--AddMedicine Modal -->
<div  id="addMedicineModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Medicine:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form method="POST" enctype="multipart/form-data" action="add_med.php">
              <div class="form-group">
                Medicine : <input type="text" name="mname" id="mname" required class="form-control" placeholder="e.g Roxem 150" onkeyup="nameValid(this.value)">
              <div id="nameError" class="text-danger"></div>
              </div>
              <div class="form-group">
                Composition : <input type="text" name="mcomp" id="mcomp" required class="form-control" placeholder="e.g Pantapeazol,paracetamol etc." onkeyup="compValid(this.value)">
                <div id="mcompError" class="text-danger"></div>
              </div>
              <div class="form-group">
                Used For : <input type="text" name="mused_for" id="mused" required class="form-control" placeholder="Used for.." onkeyup="usedValid(this.value)">
                <div id="musedError" class="text-danger"></div>
              </div>
              <div class="form-group">
                Price : <input type="number" name="mprice" id="mprice"required class="form-control" placeholder="Price" onkeyup="priceValid(this.value)">
                <div id="priceError" class="text-danger"></div>
              </div>
              <div class="form-group">
                Upload Medicine Image : <input type="file" onchange="loadImage(event)" name="mpic" id="mpic" required class="form-control">
                <script type="text/javascript">
                 function loadImage(event){
                    let file = event.target.files[0];
                    let imageBlob = URL.createObjectURL(file);
                    document.getElementById("medicine_image_preview").innerHTML=`
                      <img src='${imageBlob}' height='120px' width='120px'/>
                    `;
                  }

                </script>
                <div id="medicine_image_preview"></div>

              </div>
              <div class="form-group">
                <button class="btn btn-sm btn-outline-danger">Add Medicine</button>
              </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="b1">Close</button>
        <button type="button" class="btn btn-primary" id="b1">Save changes</button>
      </div>
    </div>
  </div>
</div>



</body>

</html>