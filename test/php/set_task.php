<?php
include_once 'connection.php';

$data = $_POST;
if(isset($data['do_save'])) {
  $notify = array();
  $success = '';
  if(trim($data['name']) == '') {
    $notify[] = 'Введите имя';
  }
  if(trim($data['task']) == '') {
    $notify[] = 'Опишите задачу';
  }
  if(empty($notify)) {
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $task = htmlspecialchars($data['task']);

    if($connection) {
      mysqli_query($connection, "INSERT INTO `tasks` (`name`, `email`, `task`) VALUES ('$name', '$email', '$task')");
      $success = 'Задача успешно сохранена';
    } else {
      echo 'Не получилось подключиться к серверу';
    }
    mysqli_close($connection);
    echo "<script src='../js/goToMainPage.js'></script>";
  }
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Новая задача</title>
</head>

<body>
  <form method="POST" action="set_task.php" class="form">
    <h1 class="form__title">Новая задача</h1>

    <div class="form__left">
      <p class="form__title3">Имя</p>
      <input type="text" class="form__input" name="name" required>
    </div>

    <div class="form__right">
      <p class="form__title3">E-mail</p>
      <input type="email" class="form__input" name="email" required>
    </div>

    <div class="clear"></div>

    <div>
      <p class="form__title3">Задача</p>
      <textarea class="form__input form__textarea" name="task" required></textarea>
    </div>

    <button name="do_save" class="form__button">Сохранить</button>
    <div class="notify"><?php echo array_shift($notify); ?></div>
    <div class="success"><?php echo $success; ?></div>
  </form>
</body>

</html>