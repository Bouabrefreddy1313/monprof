document.addEventListener("DOMContentLoaded", function() {
    var priceRange = document.getElementById("priceRange");
    var priceValue = document.querySelector(".price-value");

    // Mettez à jour la valeur du prix en fonction du curseur
    priceRange.addEventListener("input", function() {
        priceValue.innerHTML = "$" + priceRange.value;
    });
});
