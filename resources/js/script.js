(function($) {
    "use strict";

    // Add active state to sidbar nav links
    const path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
        console.log('2');
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        console.log('1');
        $("body").toggleClass("sb-sidenav-toggled");
    });
});
