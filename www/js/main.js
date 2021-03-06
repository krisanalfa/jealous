// ================================================= xin ===============================================================
function stylized () {
    'use strict';

    $("*").hover(function () {
        $(this).addClass("hover");
    }, function () {
        $(this).removeClass("hover");
    });

    $(".tab a:first-child").addClass("first");
    $(".tab a:last-child").addClass("last");

    $("input:text").addClass("text");
    $("input:password").addClass("password");
    $("input:reset").addClass("reset");
    $("input:submit").addClass("submit");
    $("input:button").addClass("button");
    $("input:radio").addClass("radio");

    $("ul > li:nth-child(odd), ol > li:nth-child(odd), .list > .comment:nth-child(odd)").addClass("odd");
    $("ul > li:nth-child(even), ol > li:nth-child(even), .list > .comment:nth-child(even)").addClass("even");
    $("ul > li:first-child, ol > li:first-child, .list > .comment:first-child").addClass("first");
    $("ul > li:last-child, ol > li:last-child, .list > .comment:last-child").addClass("last");

    $("[class^=blocks_] > div.block:first-child, [class^=blocks_] > div.block:first").addClass("first");
    $("[class^=blocks_] > div.block:last-child, [class^=blocks_] > div.block:last").addClass("last");

    $("[class^=tablelist] tr:first-child").addClass ("first");
    $("[class^=tablelist] tr:last-child").addClass ("last");
    $("[class^=tablelist] tr:nth-child(odd)").addClass ("even");
    $("[class^=tablelist] tr:nth-child(even)").addClass ("odd");

    $("[class^=tablelist] tr:first-child td:first-child").addClass ("first");
    $("[class^=tablelist] tr:first-child td:last-child").addClass ("last");
    $("[class^=tablelist] tr:first-child td:nth-child(odd)").addClass ("even");
    $("[class^=tablelist] tr:first-child td:nth-child(even)").addClass ("odd");

    $("[class^=tablelist] tr td:first-child").addClass ("first");
    $("[class^=tablelist] tr td:last-child").addClass ("last");
    $("[class^=tablelist] tr td:nth-child(odd)").addClass ("even");
    $("[class^=tablelist] tr td:nth-child(even)").addClass ("odd");
}
// =====================================================================================================================


$(document).ready(function() {
    'use strict';

    hljs.initHighlightingOnLoad();

    $(document).on('click', '.tabs .nav', function(event) {
        event.preventDefault();

        var target = $(event.target),
            contentId = target.attr('href');

        $('.tabs section .content').removeClass('active');

        $(contentId).addClass('active');
    });

    $(".alert p").click(function() { $(this).addClass("hide"); });

    $(".alert .close").click(function() { $(this).parent ().addClass("hide"); });

    var s4 = window.s4 = function () { return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1); };

    var guid = window.guid = function() {
        return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
    };

    stylized();
});
