document.addEventListener("DOMContentLoaded", function () {
    const mainContents = document.querySelectorAll('.main-content');
    const formationsPerPage = 3; // Nombre de formations à afficher par page
    const totalPages = Math.ceil(mainContents.length / formationsPerPage);
    let currentPage = 1;

    function showFormations(page) {
        mainContents.forEach((content, index) => {
            const startIndex = (page - 1) * formationsPerPage;
            const endIndex = startIndex + formationsPerPage - 1;

            if (index >= startIndex && index <= endIndex) {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });
    }

    function showPagination() {
        const paginationContainer = document.getElementById('pagination');

        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.addEventListener('click', function () {
                currentPage = i;
                showFormations(currentPage);
                highlightPaginationButton();
            });

            paginationContainer.appendChild(button);
        }

        highlightPaginationButton();
    }

    function highlightPaginationButton() {
        const paginationButtons = document.querySelectorAll('#pagination button');
        paginationButtons.forEach((button, index) => {
            if (index + 1 === currentPage) {
                button.classList.add('active');
            } else {
                button.classList.remove('active');
            }
        });
    }

    // Afficher les formations et la pagination lors du chargement initial
    showFormations(currentPage);
    showPagination();
});
