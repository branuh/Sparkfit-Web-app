<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard') - SparkFit</title>
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

  <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  @stack('styles')
</head>
<body>

  {{-- ============ SIDEBAR ============ --}}
  <div class="sidebar-wrapper" id="sidebar">
    <a href="{{ url('/') }}" class="sidebar-brand">
        <svg class="brand-logo" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M6.5 6.5v11M17.5 6.5v11M3.5 9v6M20.5 9v6M6.5 12h11"/>
    </svg>
    <span>SparkFit</span>
    </a>

    <div class="flex-grow-1 overflow-y-auto">
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Menu</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ url('/') }}" class="sidebar-menu-link {{ request()->is('/') ? 'active' : '' }}">
              <i class="bi bi-grid-fill"></i><span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-calendar3"></i><span>Calendar</span></a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-check2-square"></i><span>Tasks</span></a>
          </li>
        </ul>
      </div>

      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Fitness Pillars</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-heart-pulse"></i><span>Physical</span></a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-book"></i><span>Mental</span></a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-cash-coin"></i><span>Financial</span></a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-people"></i><span>Social</span></a>
          </li>
        </ul>
      </div>

      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Planning</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-bullseye"></i><span>Goals</span></a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-graph-up-arrow"></i><span>Reports</span></a>
          </li>
        </ul>
      </div>

      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Account</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-emoji-smile"></i><span>My Avatar</span></a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link"><i class="bi bi-gear"></i><span>Settings</span></a>
          </li>
        </ul>
      </div>
    </div>

    {{-- Avatar level card (will become dynamic later) --}}
    <div class="sidebar-profile">
      <img src="{{ asset('assets/images/enock.png') }}" alt="Avatar" class="sidebar-profile-img">
      <div class="sidebar-profile-info">
        <div class="sidebar-profile-name">Level 1</div>
        <div class="sidebar-profile-email">0 XP</div>
      </div>
    </div>
  </div>

  {{-- ============ MAIN AREA ============ --}}
  <div class="main-wrapper">

    <header class="navbar-custom">
      <div class="navbar-left">
        <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
          id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">
          <i class="bi bi-chevron-bar-left"></i>
        </button>
        <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" aria-label="Toggle Navigation">
          <i class="bi bi-list"></i>
        </button>

        <div class="dropdown ms-2">
          <button class="btn-quick-action dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="quick-actions-dropdown">
            <i class="bi bi-plus-lg"></i><span>Quick Add</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-quick-action" aria-labelledby="quick-actions-dropdown">
            <li class="dropdown-header">Quick Add</li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-heart-pulse"></i> Log workout</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-book"></i> Log reading / meditation</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-cash-coin"></i> Add transaction</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-people"></i> Log a connection</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-check2-square"></i> New task</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-bullseye"></i> New goal</a></li>
          </ul>
        </div>
      </div>

      <div class="navbar-search-wrapper">
        <input type="text" class="navbar-search-input" placeholder="Search logs, tasks, goals..." id="main-search">
        <button class="navbar-search-btn" aria-label="Search"><i class="bi bi-search"></i></button>
      </div>

      <div class="navbar-actions">
        <button class="navbar-action-btn me-1" aria-label="Toggle Fullscreen" id="btn-fullscreen">
          <i class="bi bi-arrows-fullscreen"></i>
        </button>

        <div class="dropdown">
          <button class="navbar-action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="btn-notifications" data-bs-auto-close="outside">
            <i class="bi bi-bell"></i>
            <span class="navbar-action-badge"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-notification p-0"
            aria-labelledby="btn-notifications">
            <div class="notification-header">
              <h6 class="notification-title">Notifications</h6>
              <button class="btn-clear-all" type="button">Mark all read</button>
            </div>
            <div class="notification-list">
              {{-- Placeholder: later this loops over real due-task notifications --}}
              <a href="#" class="notification-item">
                <div class="notification-icon bg-warning text-dark"><i class="bi bi-alarm"></i></div>
                <div class="notification-content">
                  <p class="notification-text">Sample: <strong>Morning run</strong> is due soon</p>
                  <span class="notification-time">Just now</span>
                </div>
                <span class="notification-unread-dot"></span>
              </a>
            </div>
            <a href="#" class="notification-footer">View All Notifications</a>
          </div>
        </div>

        <div class="dropdown ms-2">
          <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="profile-dropdown">
            <img src="{{ asset('assets/images/enock.png') }}" alt="Profile" class="navbar-profile-img">
            <span class="navbar-profile-name d-none d-md-inline">Athlete</span>
            <i class="bi bi-chevron-down navbar-profile-caret"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile" aria-labelledby="profile-dropdown">
            <li class="dropdown-header">Welcome!</li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Account</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </header>

    <div class="page-header">
      <div>
        <h1 class="page-title">@yield('title', 'Dashboard')</h1>
        <p class="page-subtitle">@yield('subtitle')</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted-green">Home</a></li>
          <li class="breadcrumb-item active text-main" aria-current="page">@yield('title', 'Dashboard')</li>
        </ol>
      </nav>
    </div>

    {{-- Each page puts its own content here --}}
    @yield('content')

    <footer class="footer-custom">
      <div class="footer-left">
        <span class="footer-logo"><i class="bi bi-asterisk"></i> SparkFit</span>
        <span class="footer-separator">|</span>
        <span class="footer-copy">&copy; {{ date('Y') }} SparkFit. Built on the Spark Admin template (MIT).</span>
      </div>
    </footer>
  </div>

  <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  @stack('scripts')
</body>
</html>