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


    // Form Validation
    $("#enquiryForm").validate();
    // $('#enquiryForm').submit(function (event) {
    //     event.preventDefault(); 

    //     const formValues = {
    //         name: $('#name').val(),
    //         email: $('#email').val(),
    //         message: $('#message').val()
    //     };

    //     const errors = validate(formValues, constraints);
    //     if (errors) {
    //         const errorMessage = Object.values(errors)
    //             .map(fieldValues => fieldValues.join(', '))
    //             .join("\n");
    //         alert(errorMessage);
    //     } else {
    //         this.submit(); 
    //     }
    // });
});