@section('content')
<ul class="listview mix thumb">
   <li class="list-group-container question-container">
      <h3>{{ $title }}</h3>
      <ul class="list-group">
         @foreach($entries as $entry)
            <li>
               <a href="{{ URL::site('/question/'.$entry['$id']) }}">
                  <span class="fa fa-question fa-2x icon"></span>
                  <span class="title-list">{{ implode(' ', array_slice(explode(' ', $entry['title']), 0, 10)); }}</span>
                  <span class="sub-title inline">
                     <span>By: Fabien Potencier</span>
                     <span>Replied: 0</span>
                  </span>
               </a>
            </li>
         @endforeach
      </ul>
   </li>
</ul>
<h2>Want to ask a question? <small>You can submit your own question <a href="{{ URL::site('/question/null/create') }}">here.</a></small></h2>
@endsection
