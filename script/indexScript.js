// JavaScript
let util = {
    mobileMenu() {
        $("#nav").toggleClass("nav-visible");
    },
    windowResize() {
        if ($(window).width() > 800) {
            $("#nav").removeClass("nav-visible");
        }
    },
    scrollEvent() {
        let scrollPosition = $(document).scrollTop();

        $.each(util.scrollMenuIds, function (i) {
            let link = util.scrollMenuIds[i],
                container = $(link).attr("href"),
                containerElement = $(container);

            if (containerElement.length) {
                let containerOffset = containerElement.offset().top,
                    containerHeight = containerElement.outerHeight(),
                    containerBottom = containerOffset + containerHeight;

                if (scrollPosition === containerBottom - 20 || (scrollPosition >= containerOffset - 20 && scrollPosition < containerBottom - 20)) {
                    $(link).addClass("active");
                } else {
                    $(link).removeClass("active");
                }
            }
        });
    }
};

$(document).ready(function() {
    util.scrollMenuIds = $("a.nav-link[href]");
    $("#menu").click(util.mobileMenu);
    $(window).resize(util.windowResize);
    $(document).scroll(util.scrollEvent);
});
