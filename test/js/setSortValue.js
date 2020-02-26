let tasksSort = document.querySelectorAll('.tasks__sort');

for (let i = 0; i < tasksSort.length; i++) {
  tasksSort[i].addEventListener("click", () => {
    let sort = tasksSort[i].dataset.value;
    let str = "sort = " + sort;
    document.cookie = str;
    window.location.href = '/';
  });
}