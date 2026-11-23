document.addEventListener("DOMContentLoaded", function() {
    const adultesBtn = document.getElementById("adultes-btn");
    const adolescentsBtn = document.getElementById("adolescents-btn");
    const enfantsBtn = document.getElementById("enfants-btn");

    adultesBtn.addEventListener("click", function() {
        adultesBtn.classList.add("btn-active");
        adultesBtn.classList.remove("btn-inactive");
        adolescentsBtn.classList.remove("btn-active");
        adolescentsBtn.classList.add("btn-inactive");
        enfantsBtn.classList.remove("btn-active");
        enfantsBtn.classList.add("btn-inactive");
        // Code pour afficher le contenu des adultes
        document.getElementById("seances-danse").style.display = "block";
        document.getElementById("prestations-adultes").style.display = "block";
        document.getElementById("prestations-enfants-ados").style.display = "none";
        document.getElementById("ninja-boxing").style.display = "none";
        document.getElementById("preparation-champion").style.display = "none";
        document.getElementById("team-challenge").style.display = "none";
    });

    adolescentsBtn.addEventListener("click", function() {
        adultesBtn.classList.remove("btn-active");
        adultesBtn.classList.add("btn-inactive");
        adolescentsBtn.classList.add("btn-active");
        adolescentsBtn.classList.remove("btn-inactive");
        enfantsBtn.classList.remove("btn-active");
        enfantsBtn.classList.add("btn-inactive");
        // Code pour afficher le contenu des adolescents
        document.getElementById("prestations-enfants-ados").style.display = "block";
        document.getElementById("ninja-boxing").style.display = "block";
        document.getElementById("seances-danse").style.display = "none";
        document.getElementById("prestations-adultes").style.display = "none";
        document.getElementById("preparation-champion").style.display = "none";
        document.getElementById("team-challenge").style.display = "none";
    });

    enfantsBtn.addEventListener("click", function() {
        adultesBtn.classList.remove("btn-active");
        adultesBtn.classList.add("btn-inactive");
        adolescentsBtn.classList.remove("btn-active");
        adolescentsBtn.classList.add("btn-inactive");
        enfantsBtn.classList.add("btn-active");
        enfantsBtn.classList.remove("btn-inactive");
        // Code pour afficher le contenu des enfants
        document.getElementById("preparation-champion").style.display = "block";
        document.getElementById("team-challenge").style.display = "block";
        document.getElementById("seances-danse").style.display = "none";
        document.getElementById("prestations-adultes").style.display = "none";
        document.getElementById("prestations-enfants-ados").style.display = "none";
        document.getElementById("ninja-boxing").style.display = "none";
    });

    // Initialisation pour afficher les contenus des adultes au chargement de la page
    adultesBtn.click();
});