document.addEventListener("DOMContentLoaded", function () {
    // Initialisation du carrousel Swiper
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    });

    // AJAX pour le formulaire de login
    $("#login-form").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: "POST",
            url: "login_process.php",
            data: formData,
            success: function (response) {
                if (response === "success") {
                    location.reload();
                } else {
                    alert("Identifiants incorrects");
                }
            }
        });
    });
});
