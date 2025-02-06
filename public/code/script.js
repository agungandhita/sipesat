document.addEventListener('DOMContentLoaded', () => {
    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
      if (collapseMenu.style.display === 'block') {
        collapseMenu.style.display = 'none';
      } else {
        collapseMenu.style.display = 'block';
      }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);

    let sidebarToggleBtn = document.getElementById('toggle-sidebar');
    let sidebar = document.getElementById('sidebar');
    let sidebarCollapseMenu = document.getElementById('sidebar-collapse-menu');

    sidebarToggleBtn.addEventListener('click', () => {
      if (!sidebarCollapseMenu.classList.contains('open')) {
          sidebarCollapseMenu.classList.add('open');
          sidebarCollapseMenu.style.cssText = 'width: 250px; visibility: visible; opacity: 1;';
          sidebarToggleBtn.style.cssText = 'left: 236px;';
      } else {
          sidebarCollapseMenu.classList.remove('open');
          sidebarCollapseMenu.style.cssText = 'width: 32px; visibility: hidden; opacity: 0;';
          sidebarToggleBtn.style.cssText = 'left: 10px;';
      }

    });
  });