<?php

session_start();
session_destroy();

echo "<script>
alert('Logged Out Thank You Please Vist Again');
window.location.href='index.php'
</script>";


?>