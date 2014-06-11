(function ($, ace, marked, hljs) {
    'use strict';

    marked.setOptions({
        highlight: function(code) {
            return hljs.highlightAuto(code).value;
        }
    });

    $('textarea[data-editor]').each(function () {
        var textarea = $(this);

        var mode = textarea.data('editor');

        var editDiv = $('<div>', {
            position: 'absolute',
            width: textarea.width(),
            height: textarea.height(),
            'class': textarea.attr('class')
        }).insertBefore(textarea);

        textarea.css('display', 'none');

        var editor = window.editor = ace.edit(editDiv[0]);
        editor.renderer.setShowGutter(true);
        editor.getSession().setValue(textarea.val());
        editor.getSession().setMode("ace/mode/" + mode);
        editor.setTheme("ace/theme/github");

        editor.on('blur', function() {
            $('#review').html(marked(editor.getSession().getValue()));
        });

        // copy back to textarea on form submit...
        textarea.closest('form').submit(function () {
            textarea.val(editor.getSession().getValue());
        })
    });

})(window.$, window.ace, window.marked, window.hljs);
