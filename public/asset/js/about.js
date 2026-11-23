document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("popup-modal");
    const modalBody = document.getElementById("modal-body");
    const closeBtn = modal.querySelector(".close-btn");

    // Ouvrir le modal
    document.querySelectorAll(".view-details-btn").forEach(button => {
        button.addEventListener("click", function (event) {
            event.stopPropagation(); // Empêche le clic de se propager
            const card = this.closest(".command-card");

            // Récupère les données de la card
            const studentName = card.querySelector(".card-header h3").innerText;
            const studentLevel = card.querySelector(".card-header span").innerText;
            const comment = card.querySelector(".card-content p").innerText;

            // Remplit le modal
            modalBody.innerHTML = `
                <h3>Détails</h3>
                <p><strong>Nom :</strong> ${studentName}</p>
                <p><strong>Niveau :</strong> ${studentLevel}</p>
                <p><strong>Commentaire :</strong> ${comment}</p>
            `;

            // Affiche le modal
            modal.classList.remove("hidden");
        });
    });

    // Fermer le modal
    closeBtn.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    // Fermer le modal en cliquant à l'extérieur
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
});
