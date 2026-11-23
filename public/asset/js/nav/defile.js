document.querySelector('.btn-warning').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien
    document.querySelector('#chatbot').scrollIntoView({ 
        behavior: 'smooth' // Ajoute un défilement doux
    });
});