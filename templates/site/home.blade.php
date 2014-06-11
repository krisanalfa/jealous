@section('content')
<ul class="listview mix thumb">
   <li class="list-group-container">
      <h3>Last asked question</h3>
      <ul class="list-group">
         <li>
            <a href="#">
               <span class="fa fa-question fa-2x icon"></span>
               <span class="title-list">Why?</span>
               <span class="sub-title">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, veniam earum sequi reiciendis odio voluptatibus cum ipsum illo facilis officia iure ipsam enim quod ab consequatur. Repellendus possimus deleniti dolorum.
               </span>
            </a>
         </li>
         <li>
            <a href="#">
               <span class="fa fa-question fa-2x icon"></span>
               <span class="title-list">What?</span>
               <span class="sub-title">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, repudiandae ea culpa facere earum est dignissimos beatae odit aut tempore suscipit minima pariatur quod fuga cumque commodi impedit debitis. A!
               </span>
            </a>
         </li>
         <li>
            <a href="#">
               <span class="fa fa-question fa-2x icon"></span>
               <span class="title-list">Who?</span>
               <span class="sub-title">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, fugiat, mollitia, beatae blanditiis nesciunt culpa praesentium labore itaque pariatur molestiae neque earum placeat atque rerum quibusdam veniam quo modi saepe.
               </span>
            </a>
         </li>
         <li>
            <a href="#">
               <span class="fa fa-question fa-2x icon"></span>
               <span class="title-list">Where?</span>
               <span class="sub-title">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, eligendi, quibusdam id porro facilis molestiae molestias magni impedit voluptas excepturi minima aliquam nulla. Quaerat, qui dolores ut at nobis expedita.
               </span>
            </a>
         </li>
         <li>
            <a href="#">
               <span class="fa fa-question fa-2x icon"></span>
               <span class="title-list">How?</span>
               <span class="sub-title">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, eligendi, quibusdam id porro facilis molestiae molestias magni impedit voluptas excepturi minima aliquam nulla. Quaerat, qui dolores ut at nobis expedita.
               </span>
            </a>
         </li>
      </ul>
   </li>
</ul>
<h2>Want to ask a question? <small>You can submit your own question <a href="{{ URL::site('ask/null/create') }}">here.</a></small></h2>
@endsection
