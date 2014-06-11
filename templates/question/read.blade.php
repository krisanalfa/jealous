@section('content')
<div class="row">
    <div class="span-1">
        <div class="rate-question">
            <a href="#"><span class="fa fa-angle-up fa-2x"></span></a>
            <span class="rate-counter">0</span>
            <a href="#"><span class="fa fa-angle-down fa-2x"></span></a>
            <a href="#"><span class="fa fa-star fa-2x"></span></a>
        </div>
    </div>
    <div class="span-11 question-display">
        <h1>{{ $entry['title'] }}</h1>
        {{ App::getInstance()->kraken['ciconia']->render($entry['content']) }}
        <div class="question-submiter">
            <div class="tags">
                @foreach($tags as $tag)
                    <a href="#" class="button button-tags"><span class="fa fa-tags"></span> {{ $tag['name'] }}</a>
                @endforeach
            </div>
            <!-- <div class="question-user">
                <span>Asked {{ $entry['$created_time'] }}</span>
                <div class="user-information">
                    <span class="fa fa-user fa-2x"></span>
                    <span>Fabien Potencier</span>
                </div>
            </div> -->
        </div>
    </div>
</div>

<form method="POST" action="{{ URL::current() }}/answer">
    <fieldset>
        <input type="hidden" name="question_id" value="{{ $entry['$id'] }}">
        <legend>Your answer</legend>
        <div class="span-12">
            <div class="row">
                <div class="span-12">
                    <article class="tabs">
                        <section>
                            <h2>
                                <a class="nav" href="#source">Source</a>
                            </h2>
                            <div class="content active" id="source">
                                <div class="editor-wrapper">
                                    <textarea class="editor" name="content" data-editor="markdown"></textarea>
                                </div>
                                <span class="help-block"><small>Your input parsed in GitHub Flavored Markdown</small></span>
                            </div>
                        </section>

                        <section>
                            <h2>
                                <a class="nav" href="#review">Preview</a>
                            </h2>
                            <div class="content" id="review"></div>
                        </section>
                    </article>
                </div>
            </div>
        </div>
        <div class="span-12">
            <div class="row">
                <div class="span-12">
                    <input type="submit" value="Submit" class="pull-right">
                </div>
            </div>
        </div>
    </fieldset>
</form>
@endsection

@section('injector')
    <script type="text/javascript" charset="utf-8" src="{{ Theme::base('js/ace/ace.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::base('js/highlight/highlight.pack.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::base('js/vendor/marked.js') }}"></script>
    <script>
        // Hook up ACE editor to all textareas with data-editor attribute
        $(function () {
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
        });
    </script>
@endsection
