<?php
include_once 'php/connection.php';
include_once 'php/sort.php';
include_once 'php/paginate.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>test</title>
</head>

<body>

  <div class="tasks">
    <div class="tasks__head">
      <?php
      if($connection) {
        echo '
        <h1 class="tasks__title">
          Список задач
        </h1>
        <a href="php/set_task.php" class="tasks__new-task">Новая задача</a>
        ';
      } else {
        echo '<h1 class="tasks__title">Не удалось подключится к БД</h1>';
      }
      ?>
    </div>
    <section class="tasks__section">
      <ul class="tasks__list">
        <li class="tasks__item tasks__item_head">
          <div class="tasks__item-block">Имя
            <div class="tasks__sort-block">
              <div class="tasks__up tasks__sort" data-value="name_up"></div>
              <div class="tasks__down tasks__sort" data-value="name_down"></div>
            </div>
          </div>
          <div class="tasks__item-block">E-mail
            <div class="tasks__sort-block">
              <div class="tasks__up tasks__sort" data-value="email_up"></div>
              <div class="tasks__down tasks__sort" data-value="email_down"></div>
            </div>
          </div>
          <div class="tasks__item-block">Задача</div>
          <div class="tasks__item-block">Статус
            <div class="tasks__sort-block">
              <div class="tasks__up tasks__sort" data-value="status_up"></div>
              <div class="tasks__down tasks__sort" data-value="status_down"></div>
            </div>
          </div>
        </li>
        <?php
          $result = mysqli_query($connection, $select);
          $number_task=0;
          while ( $r1 = mysqli_fetch_assoc($result) ) {
            $number_task++;
            $number_page = ceil($number_task/3);
            if($number_page == $iCurr) {
              echo '
              <li class="tasks__item">
                <div class="tasks__item-block">'.$r1[name].'</div>
                <div class="tasks__item-block">'.$r1[email].'</div>
                <div class="tasks__item-block">'.$r1[task].'</div>
                <div class="tasks__item-block">
                  <p>'.@$r1[edit].'</p>
                  <p>'.@$r1[done].'</p>
                </div>
              </li>';
            }
          }
          mysqli_close($connection);

        ?>

      </ul>
    </section>
    <?php makePager($iCurr, $count_all_page); ?>

    <a href="/php/admin.php" class="tasks__login">Войти в админ панель</a>
  </div>

  <script src="js/setSortValue.js"></script>
  <script async src="js/setPageValue.js"></script>
  

</body>

</html>

