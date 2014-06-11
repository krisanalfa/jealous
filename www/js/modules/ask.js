(function ($, ace, marked, hljs) {
    'use strict';

    marked.setOptions({
        highlight: function(code) {
            return hljs.highlightAuto(code).value;
        }
    });

    $('.ask-input').bind('input propertychange', function(event) {
        $('#review').html(marked($(event.target).val()));
    });

})(window.$, window.ace, window.marked, window.hljs);
