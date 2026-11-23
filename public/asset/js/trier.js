document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.getElementById('formationsDropdown');
    var items = dropdown.getElementsByClassName('custom-item');

    // Convertir la collection HTML en tableau
    var itemsArray = Array.from(items);

    // Trier les éléments par ordre alphabétique
    itemsArray.sort(function (a, b) {
        return a.textContent.localeCompare(b.textContent);
    });

    // Vider le dropdown
    dropdown.innerHTML = '';

    var currentCategory = null;
    var rowCount = 0;

    itemsArray.forEach(function (item) {
        var itemCategory = item.textContent.trim().charAt(0).toUpperCase();

        if (currentCategory !== itemCategory) {
            // Nouvelle catégorie, ajouter un séparateur si ce n'est pas la première catégorie
            if (currentCategory !== null) {
                dropdown.appendChild(document.createElement('div')).classList.add('dropdown-divider');
            }
            
            // Mettre à jour la catégorie actuelle
            currentCategory = itemCategory;
            rowCount = 0;
        }

        // Ajouter l'élément au dropdown
        dropdown.appendChild(item);

        // Ajouter un saut de ligne après chaque groupe de 5 éléments
        if (++rowCount % 5 === 0) {
            dropdown.appendChild(document.createElement('div')).classList.add('dropdown-divider');
        }
    });

    // Réorganiser le dropdown avec les éléments triés
    itemsArray.forEach(function (item) {
        dropdown.appendChild(item);
    });
});
