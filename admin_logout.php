
<?php
   session_start();
   session_destroy();

   echo "<script>
    alert('Administrator Has Been Logged Out');
    window.location.href='admin.php';
   </script>";

?>