
    var elementsPerPage = 5;
    var contentContainer = document.getElementById('content');
    var items = contentContainer.children;
    var totalPages = Math.ceil(items.length / elementsPerPage);

    function showPage(pageNumber) {
        var startIndex = (pageNumber - 1) * elementsPerPage;
        var endIndex = pageNumber * elementsPerPage;

        for (var i = 0; i < items.length; i++) {
            if (i >= startIndex && i < endIndex) {
                items[i].style.display = 'block';
            } else {
                items[i].style.display = 'none';
            }
        }
    }

    function createPaginationButtons() {
        var paginationContainer = document.getElementById('pagination');
        for (var i = 1; i <= totalPages; i++) {
            var button = document.createElement('button');
            button.textContent = i;
            button.onclick = function() {
                showPage(parseInt(this.textContent));
            };
            paginationContainer.appendChild(button);
        }
    }

    // Cacher tous les éléments sauf les premiers
    for (var i = elementsPerPage; i < items.length; i++) {
        items[i].style.display = 'none';
    }

    // Générer les boutons de pagination
    createPaginationButtons();

    // Afficher la première page par défaut
    showPage(1);
