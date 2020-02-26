

  <form class="form" action="/php/admin.php" method="POST">
    <h1 class="form__title">Авторизация</h1>

    <div class="form__left">
      <p class="form__title3">Логин</p>
      <input type="text" class="form__input" name="login" value="<?php echo @$data['login']; ?>" required>
    </div>

    <div class="form__right">
      <p class="form__title3">Пароль</p>
      <input type="password" class="form__input" name="password" value="<?php echo @$data['password']; ?>" required>
    </div>
    <div class="clear"></div>
    <button type="submit" class="form__button" name="do_login">Войти</button>
    <div class="notify"><?php echo array_shift($notify); ?></div>
  </form>