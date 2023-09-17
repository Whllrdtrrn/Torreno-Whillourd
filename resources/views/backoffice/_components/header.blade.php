<div class="header header-one">
    <a href="javascript:void(0);" id="toggle_btn">
    <span class="toggle-bars">
    <span class="bar-icons"></span>
    <span class="bar-icons"></span>
    <span class="bar-icons"></span>
    <span class="bar-icons"></span>
    </span>
    </a>
 
    <a class="mobile_btn" id="mobile_btn">
    <i class="fas fa-bars"></i>
    </a>
    <ul class="nav nav-tabs user-menu">
       <li class="nav-item dropdown">
          <a href="javascript:void(0)" class="user-link  nav-link" data-bs-toggle="dropdown">
          <span class="user-img">
          {{--<div class="avatar-circle">{{ Auth::user()->initials }}</div>--}}
          <span class="animate-circle"></span>
          </span>
          <span class="user-content">
          <span class="user-details">{{ Auth::user()->role }}</span>
          <span class="user-name">
          @auth
             {{ Auth::user()->first_name }}
          @else
             Guest
          @endauth
          </span>
          </span>
          </a>
          <div class="dropdown-menu menu-drop-user">
             <div class="profilemenu">
                <div class="subscription-menu">
                   <ul>
                      <li>
                         <a class="dropdown-item" href="#">Profile</a>
                      </li>
                    
                   </ul>
                </div>
                <div class="subscription-logout">
                   <ul>
                      <li class="pb-0">
                         <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Log Out</a>
                      </li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                   </ul>
                </div>
             </div>
          </div>
       </li>
    </ul>
 </div>