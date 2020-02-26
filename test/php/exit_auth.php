<?php 
session_start();
unset($_SESSION['auth']);
session_destroy();
echo "<script>window.location.href='/'</script>";
?>