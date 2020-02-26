<?php 
include_once 'connection.php';
$result = mysqli_query($connection, "SELECT * FROM `tasks`");
$count_task = mysqli_num_rows($result);
$count_all_page = ceil($count_task/3);
$iCurr = (int)(empty($_COOKIE['page']) ? 1 : $_COOKIE['page']);

function makePager($iCurr, $count_all_page)
{
  if($count_all_page<2) return;
  $first_page = $iCurr - $iCurr%10 +1;
  $last_page = $first_page + 10;
  if($count_all_page<$last_page) {
    $last_page=$count_all_page;
  }

  echo '<div class="paginate">
        <p class="paginate__title">Страницы</p>
        <p class="paginate__pages">';
  if($first_page>10) echo '<span class="paginate__arrow" data-arrow="left">&laquo;&laquo;</span>';
  for($i=$first_page; $i<=$last_page; $i++) {
    if($i==$iCurr) {
      echo '<span class="paginate__span paginate__span_curr" data-page="'.$i.'">'.$i.'</span>';
    } else {
      echo '<span class="paginate__span" data-page="'.$i.'">'.$i.'</span>';
    } 
  }
  if($last_page<$count_all_page) echo '<span class="paginate__arrow" data-arrow="right">&raquo;&raquo;</span>';
  echo '</p></div>';
  
}
?>