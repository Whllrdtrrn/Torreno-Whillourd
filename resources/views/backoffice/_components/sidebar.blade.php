<div class="sidebar" id="sidebar">
   <div class="sidebar-header">
      <div class="sidebar-logo">
         <a href="/">
         <img src="{{ asset('backoffice/img/logo/logoplaceholder.png') }}" class="img-fluid logo" alt>
         </a>
         <a href="/">
         <img src="{{ asset('backoffice/img/logo/logo.png') }}" class="img-fluid logo-small" alt>
         </a>
      </div>
   </div>
   <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
         <ul>
    
            <li class="menu-title">
               <span>Admin</span>
            </li>
         
    
            <li class="submenu">
               <a href="{{ route('backoffice.books.index') }}">
               <i class="fe fe-image"></i>
               <span> Library</span>
               <span class="menu-arrow"></span>
               </a>
               <ul>
                  <li>
                     <a class="" href="{{ route('backoffice.books.index') }}">List of Books</a>
                  </li>
                  <li>
                     <a href="{{ route('backoffice.books.create') }}">Create</a>
                  </li>
               </ul>
            </li>
            <li class="submenu">
               <a href="{{ route('backoffice.users.index') }}">
               <i class="fe fe-image"></i>
               <span> Users Maintenance</span>
               <span class="menu-arrow"></span>
               </a>
               <ul>
                  <li>
                     <a class="" href="{{ route('backoffice.users.index') }}">List of Users</a>
                  </li>
               </ul>
            </li>
         </ul>
         {{--<ul>
            <li class="menu-title">
               <span>User</span>
            </li>
            <li class="submenu">
               <a href="">
               <i class="fe fe-users"></i>
               <span> User Management</span>
               <span class="menu-arrow"></span>
               </a>
               <ul>
                  <li>
                     <a class="" href="{{ route('backoffice.user_management.index') }}">List of Data</a>
                  </li>
                  <li>
                     <a href="{{ route('backoffice.user_management.create') }}">Create Data</a>
                  </li>
               </ul>
            </li>
         </ul>
         <ul>
            <li class="menu-title">
               <span>Settings</span>
            </li>
            <li>
               <a href="{{ route('backoffice.settings.index') }}">
               <i class="fe fe-settings"></i>
               <span>Settings</span>
               </a>
            </li>
         
         </ul>--}}
      </div>
   </div>
</div>