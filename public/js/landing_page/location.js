const mediaQuery = window.matchMedia('(min-width: 1169px)');
const sidebarFilter = document.querySelector('.sidebarFilter');

if (mediaQuery.matches) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      sidebarFilter.classList.add('fixed');
      sidebarFilter.style = "top : 20px";
    } else {
      sidebarFilter.classList.remove('fixed');
    }
  });
}