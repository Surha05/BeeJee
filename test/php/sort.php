<?php 
include_once 'connection.php';
$value_sort = $_COOKIE['sort'];
if($value_sort == 'name_up') {
  $select = 'SELECT * FROM `tasks` ORDER BY `name`';
}
if($value_sort == 'name_down') {
  $select = 'SELECT * FROM `tasks` ORDER BY `name` DESC';
}
if($value_sort == 'email_up') {
  $select = 'SELECT * FROM `tasks` ORDER BY `email`';
}
if($value_sort == 'email_down') {
  $select = 'SELECT * FROM `tasks` ORDER BY `email` DESC';
}
if($value_sort == 'status_up') {
  $select = 'SELECT * FROM `tasks` ORDER BY `done` DESC';
}
if($value_sort == 'status_down') {
  $select = 'SELECT * FROM `tasks` ORDER BY `edit` DESC';
}

?>