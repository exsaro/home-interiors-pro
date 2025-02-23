$(document).ready(function() {
    // Smooth scrolling
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 800); // Adjust the speed (800ms) as needed
        }
    });

    // Gallery
    $("#gallery").mCustomScrollbar({
        axis: "yx",
        scrollButtons: { enable: true },
        theme: "3d",
        scrollbarPosition: "outside",
      });

    // Year
      $("#year").text(new Date().getFullYear());

    // Mobile Navigation
    $(".mobile-nav").on("click", function() {
        $(".nav").slideToggle();
    });
});