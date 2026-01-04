<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <div class="mr-4 lead"><b>@yield('heading')</b></div>

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav mr-auto">
    
    <div class="topbar-divider d-none d-sm-block"></div>

    

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" style="right:-90px">
        <div class="dropdown-center text-center">
              {{auth()->user()->name}}
        </div>
        <a class="dropdown-item text-right" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              تسجيل خروج
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->