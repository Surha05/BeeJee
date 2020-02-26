<?php
  
$connection = mysqli_connect('localhost', 'n98948jc_test', 'Test123', 'n98948jc_test');

$select = 'SELECT * FROM `tasks`';

$server_name;
$server_password;
if($connection) {
  $result_auth = mysqli_query($connection, 'SELECT * FROM `auth`');
  $r1_auth = mysqli_fetch_assoc($result_auth);
  $server_name = $r1_auth[login];
  $server_password = $r1_auth[password];
}

?>