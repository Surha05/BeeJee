let editTask = document.querySelectorAll('.tasks__edit-block');

for (let i = 0; i < editTask.length; i++) {
  editTask[i].addEventListener("click", () => {
    let id = editTask[i].dataset.id;
    let str = "id = " + id;
    document.cookie = str;
    window.location.href = '/php/edit_task.php';
  });
}