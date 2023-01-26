<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="{{ asset('assets/img/logo/league-admin-logo.png') }}" alt="logo" class="main-logo">
        </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle" style=""></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>


    {{-- Sidebar Menu Start --}}
    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="#" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Basic">Dashboard</div>
        </a>
      </li>
      

      {{-- Leagues --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-adjust"></i>
          <div data-i18n="Layouts">Leagues</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without menu">All Leagues</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without navbar">Add League</div>
            </a>
          </li>
        </ul>
      </li>
      {{-- End Leagues --}}

      {{-- Teams --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-cube"></i>
          <div data-i18n="Layouts">Teams</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without menu">All Teams</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without navbar">Add Team</div>
            </a>
          </li>
        </ul>
      </li>
      {{-- End Teams --}}

      {{-- Games --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-baseball"></i>
          <div data-i18n="Layouts">Games</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without menu">All Games</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without navbar">Add Game</div>
            </a>
          </li>
        </ul>
      </li>
      {{-- End Games --}}

      {{-- Schedule --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Schedule</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without menu">Master Schedule</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without navbar">Weekly Schedule</div>
            </a>
          </li>
        </ul>
      </li>
      {{-- End Schedule --}}

      {{-- Availability --}}
      <li class="menu-item">
        <a href="#" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book-content"></i>
          <div data-i18n="Basic">Availability</div>
        </a>
      </li>
      {{-- End Availability --}}

      {{-- User Management --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user-pin"></i>
          <div data-i18n="Layouts">User Management</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without menu">All Users</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without navbar">Roles</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Without navbar">Permissions</div>
            </a>
          </li>
        </ul>
      </li>
      {{-- End Schedule --}}

      {{-- Help & Support --}}
      <li class="menu-item">
        <a href="#" class="menu-link">
          <i class="menu-icon tf-icons bx bx-help-circle"></i>
          <div data-i18n="Basic">Help & Support</div>
        </a>
      </li>
      {{-- End Help & Support --}}

      
    </ul>
  </aside>
  <!-- / Menu -->