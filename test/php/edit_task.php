<?php 
include_once "connection.php";
$id = (int)$_COOKIE['id'];
$result = mysqli_query($connection, 'SELECT `task`,`edit`,`done` FROM `tasks` WHERE `id`='.$id);
$r1 = mysqli_fetch_assoc($result);

$data = $_POST;

if(isset($data['do_login'])) {
  $notify = array();
  if(trim($data['task']) == '') {
    $notify[] = 'Пустое поле';
  }
  if(empty($notify)) {
    $task = $r1['task'];
    $edit = $r1['edit'];
    $done = $r1['done'];
    if($data['done'] == 'yes') {
      $done = 'Выполнено';
    }
    if($r1['task'] != $data['task']) {
      $task = $data['task'];
      $edit = 'Изменено';
    }
    mysqli_query($connection, "UPDATE `tasks` SET `task`='$task', `edit`='$edit', `done`='$done' WHERE `id`='$id'");
    mysqli_close($connection);
    header("Location: /php/admin.php");
  }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="edit_task.php" class="form">
    <h1 class="form__title">Редактирование задачи</h1>

    <div>
      <p class="form__title3">Задача</p>
      <textarea class="form__input form__textarea" name="task" required><?php echo @$r1['task']; ?></textarea>
    </div>
    <div>
      <p class="form__title3">Задача выполнена? </p>
      <p><input class="form__input-radio" type="radio" name="done" value="yes">Да</p>
      <p><input class="form__input-radio" type="radio" name="done" value="no">Нет</p>
    </div>

    <button name="do_login" class="form__button">Сохранить</button>
    <div class="notify"><?php echo array_shift($notify); ?></div>
  </form>
</body>
</html>