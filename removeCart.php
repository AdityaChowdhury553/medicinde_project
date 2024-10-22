<?php
session_start();
          $env = parse_ini_file(".env");
          $HOST     = $env['HOST'];
          $USERNAME = $env['USERNAME'];
          $PASSWORD = $env['PASSWORD'];
          $DATABASE = $env['DATABASE'];

          function redirect($loc){
            echo "<script>
                    window.location.href='$loc';
            </script>";
          }
           try{
              $con = new PDO("mysql:host=$HOST;dbname=$DATABASE",$USERNAME,$PASSWORD);
              $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              //echo "Connected";
              $SQL="delete from cart where medicine_id=:mid";
              $stmt = $con->prepare($SQL);
              $bindParams =['mid'=>$_GET['mid']];
              $stmt->execute($bindParams);
              $rows = $stmt->rowCount();
              $stmt = NULL;
              $message = ($rows == 1) ? "medicine_remove_cart_success":"medicine_remove_cartP_failed";
              $_SESSION['message'] = $message;

     
            }
           catch(PDOException $ex){
            die($ex->getMessage());

           }
           finally {
               $con = NULL;

           }
           redirect("viewCart.php");
       
           ?>