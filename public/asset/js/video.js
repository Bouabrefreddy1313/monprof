document.addEventListener('DOMContentLoaded', function() {
    var video = document.getElementById('promoVideo');

    // Remove the controls attribute initially
    video.removeAttribute('controls');

    // Add a click event listener to the video
    video.addEventListener('click', function() {
        // Play the video when it is clicked
        if (video.paused) {
            video.play();
            video.setAttribute('controls', 'controls'); // Show controls when playing
        } else {
            video.pause();
        }
    });
});

$(document).ready(function() {
    $('.formation-link').click(function(e) {
        e.preventDefault();
        var formationId = $(this).data('formation-id');
        $('#sous-formations-' + formationId).toggle();
    });
});