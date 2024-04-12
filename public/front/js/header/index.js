$('.container .burger-icon').on("click", function () {
    if ($("body").hasClass("menu-open")) {
        closeMenu();
    } else {
        openMenu();
    }
});
$(".menu-overlay").on("click", function () {
    if ($("body").hasClass("menu-open")) {
        closeMenu();
    }
});
function closeMenu() {
    $("body").removeClass("menu-open");
    $(".mobile-nav").insertAfter($(".container.container-logo"));
    $(".mobile-nav").removeClass("mobile-nav").addClass("main-nav");
}
function openMenu() {
    $("body").addClass("menu-open");
    $(".nav-open").insertBefore($("#wrapper"));
    $(".nav-open").removeClass("main-nav").addClass("mobile-nav");
}
$(document).ready(function () {
    $(document).on('scroll', function () {
        if ($(this).scrollTop() > $('.header-section').innerHeight()) {
            $('.sticky-nav').css({
                transform: 'translate(-50%, 0%)'
            })
        } else {
            $('.sticky-nav').css({
                transform: 'translate(-50%, -100%)'
            })
        }
    })
})
