@section('content')
<div class="contain-area">
    <div class="container">
        <form method="POST">
            <fieldset class="register">
                <legend>Submit new question</legend>
                <div class="span-12">
                    <div class="row">
                        <div class="span-2">
                            <label>Title <span class="mandatory">*</span></label>
                        </div>
                        <div class="span-10">
                            <input type="text" name="title" placeholder="Title" />
                            <span class="help-block"><small>A summarize about something what you want to ask</small></span>
                        </div>
                    </div>
                </div>
                <div class="span-12">
                    <div class="row">
                        <div class="span-2">
                            <label>Content <span class="mandatory">*</span></label>
                        </div>
                        <div class="span-10">
                            <article class="tabs">
                                <section>
                                    <h2>
                                        <a class="nav" href="#source">Source</a>
                                    </h2>
                                    <div class="content active" id="source">
                                        <textarea class="ask-input" name="content" placeholder="Write your own question here"></textarea>
                                        <span class="help-block"><small>Your input parsed in GitHub Flavored Markdown</small></span>
                                    </div>
                                </section>

                                <section>
                                    <h2>
                                        <a class="nav" href="#review">Review</a>
                                    </h2>
                                    <div class="content" id="review"></div>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="span-12">
                    <div class="row">
                        <div class="span-2">
                            <label>Tags</label>
                        </div>
                        <div class="span-10">
                            <input type="text" name="tags" placeholder="Tags" />
                            <span class="help-block"><small>You may insert multiple tags by write them in comma separated values</small></span>
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
    </div>
</div>
@endsection

@section('injector')
<script type="text/javascript" charset="utf-8" src="{{ URL::base('js/highlight/highlight.pack.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ URL::base('js/vendor/marked.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ URL::base('js/ace/ace.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ URL::base('js/modules/ask.js') }}"></script>
@endsection
