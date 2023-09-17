<div class="header" id="header" style="z-index: 100; background: white; position: fixed;">
   <div class="container">
       <div class="nav">
           <h1 class="oswald-font" style="font-size: 30px;padding:10px;">eBook</h1>
           <div class="profile">
               <div class="dropdown">
                   <button class="oswald-font text-capitalize btn btn-link dropdown-toggle" type="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                       <span>{{ Auth::user()->name }} <i class="fa-regular fa-circle-user"></i> </span>
                   </button>
                   <ul class="dropdown-menu oswald-font">
                       <li><a class="dropdown-item" type="button" href="{{ route('profile.index') }}">Profile</a></li>
                       <li><a class="dropdown-item" type="button" href="{{ route('book.index') }}">Home</a></li>
                       <li><a class="dropdown-item" type="button" href="{{ route('mybook.index') }}">My Library</a></li>
                       <li>
                           <hr class="dropdown-divider">
                       </li>
                       <li><a class="dropdown-item" type="button" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                       </li>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                   </ul>
               </div>
           </div>
       </div>
   </div>
</div>