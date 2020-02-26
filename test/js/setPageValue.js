
let pages = document.querySelectorAll('.paginate__span');
for (let i = 0; i < pages.length; i++) {
  pages[i].addEventListener("click", () => {
    let page = pages[i].dataset.page;
    let str = "page = " + page;
    document.cookie = str;
    window.location.href = '/';
  });
}