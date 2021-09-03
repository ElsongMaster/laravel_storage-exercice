<ul class="nav d-flex justify-content-center bg-warning  mb-5">
     <li class="nav-item"><a  href="{{route('images.index')}}" class="nav-link  @if(request()->routeIs('images.index')) active @else '' @endif">Images</a></li>
   <li class="nav-item"><a  href="{{route('albums.index')}}" class="nav-link  @if(request()->routeIs('albums.index')) active @else '' @endif">Albums</a></li>

</ul>