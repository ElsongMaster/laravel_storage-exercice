<ul class="nav d-flex justify-content-center bg-warning  mb-5">
     <li class="nav-item"><a  href="{{route('users.index')}}" class="nav-link  @if(request()->routeIs('users.index')) active @else '' @endif">Users</a></li>
   <li class="nav-item"><a  href="{{route('articles.index')}}" class="nav-link  @if(request()->routeIs('articles.index')) active @else '' @endif">Articles</a></li>

</ul>