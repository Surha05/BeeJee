<div class="tasks">
    <div class="tasks__head">
      <?php
      if($connection) {
        echo '
        <h1 class="tasks__title">
          Список задач
        </h1>
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
          <div class="tasks__item-block">Редак.</div>
        </li>
        <?php
          
            $result = mysqli_query($connection, $select);
            while ( $r1 = mysqli_fetch_assoc($result) ) {
              echo '
              <li class="tasks__item">
                <div class="tasks__item-block">'.$r1[name].'</div>
                <div class="tasks__item-block">'.$r1[email].'</div>
                <div class="tasks__item-block">'.$r1[task].'</div>
                <div class="tasks__item-block tasks__edit-block" data-id='.$r1[id].'></div>
              </li>';
            }

        ?>

      </ul>
    </section>

    <a href="/php/exit_auth.php" class="tasks__login">Выйти</a>
  </div>