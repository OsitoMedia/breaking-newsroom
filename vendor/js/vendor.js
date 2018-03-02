var j = jQuery.noConflict();

j(document).ready(function() {
    var e = j("body"),
        n = e.offset();
    j(window).on("scroll", function() {
        j(window).scrollTop() > n.top ? e.addClass("fixed-body") : e.removeClass("fixed-body")
    })
}); 

j(document).ready(function() {
    j("[data-toggle='body']").click(function() {
        var e = j(this).data("toggle");
        j(e).toggleClass("open-sidebar")
    });
    j("[data-toggle='#header .search, #header .search-hidden, #search-mask']").click(function() {
        var e = j(this).data("toggle");
        j(e).toggleClass("show")
    });
});

j(document).ready(function () {
    j('#infinite').infiniteScroll({
        path: '.next-post',
        append: '.article',
        status: '.page-load-status',
        button: '.view-more-button',
        scrollThreshold: false,
    });
});