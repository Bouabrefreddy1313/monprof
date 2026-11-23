document.addEventListener('DOMContentLoaded', function () {
    // Ensure all dropdowns work correctly with nested dropdowns
    var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-submenu .dropdown-toggle'));
    dropdownElements.forEach(function (dropdown) {
        dropdown.addEventListener('click', function (e) {
            var el = this.nextElementSibling;
            el.classList.toggle('show');

            var parentDropdown = this.closest('.dropdown-menu');
            var openSubMenus = parentDropdown.querySelectorAll('.show');
            openSubMenus.forEach(function (openSubMenu) {
                if (openSubMenu !== el) {
                    openSubMenu.classList.remove('show');
                }
            });

            e.stopPropagation();
        });
    });

    // Hide dropdowns when clicking outside
    document.addEventListener('click', function (e) {
        var dropdownMenus = [].slice.call(document.querySelectorAll('.dropdown-menu.show'));
        dropdownMenus.forEach(function (menu) {
            menu.classList.remove('show');
        });
    });
});
