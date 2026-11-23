// Ecoutez les clics sur les éléments de sous-formation
document.addEventListener('DOMContentLoaded', function () {
        const sousFormations = document.querySelectorAll('.sous-formation');

        sousFormations.forEach(function (sousFormation) {
            sousFormation.addEventListener('click', function () {
                const sousFormationId = this.dataset.id;

                // Masquer tous les cours
                const cours = document.querySelectorAll('.premier');
                cours.forEach(function (cours) {
                    cours.style.display = 'none';
                });

                // Afficher uniquement les cours liés à la sous-formation sélectionnée
                const coursLiés = document.querySelectorAll(`.premier[data-id="${sousFormationId}"]`);
                coursLiés.forEach(function (cours) {
                    cours.style.display = 'block';
                });
            });
        });
    });

