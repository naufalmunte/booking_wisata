<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title')</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      display: flex;
      flex-direction: column;
      background-color: #f5f5f5;
    }

    /* Header - Nature Green */
    header.navbar {
      background: linear-gradient(135deg, #3a7d44 0%, #2d5a3d 100%);
      color: #e9f5db;
      height: 56px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    header .navbar-brand span {
      color: #e9f5db;
      font-weight: 600;
    }

    .toggle-btn {
      border: none;
      background: none;
      color: #e9f5db;
      font-size: 1.5rem;
    }

    /* Sidebar - Dark Nature Theme */
    .wrapper {
      display: flex;
      flex: 1;
      transition: all 0.3s;
      overflow: hidden;
    }

    .sidebar {
      width: 250px;
      background: linear-gradient(180deg, #2d5a3d 0%, #1e3b2a 100%);
      color: #e9f5db;
      padding: 1rem;
      transition: all 0.3s;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar.collapsed {
      margin-left: -250px;
    }

    .sidebar .nav-link {
      color: #e9f5db;
      font-weight: 500;
      padding: 10px;
      border-radius: 8px;
      transition: all 0.2s;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      color: #2d5a3d;
      background-color: #e9f5db;
    }

    .sidebar-footer {
      margin-top: auto;
      padding-top: 1rem;
      padding-block-end: 5px;
      border-top: 1px solid rgba(233, 245, 219, 0.2);
    }

    /* Content Area */
    .content {
      flex: 1;
      margin: 0px;
      padding: 0px;
      overflow-y: auto;
      background-color: #ffffff;
      transition: margin 0.3s ease-in-out;
    }

    /* Footer */
    footer {
      background: #2d5a3d;
      color: #e9f5db;
      text-align: center;
      padding: 10px 0;
      margin-top: 20px;
    }

    /* Buttons */
    .btn-nature {
      background-color: #3a7d44;
      color: white;
      border: none;
    }

    .btn-nature:hover {
      background-color: #2d5a3d;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Header (No changes to structure) -->
  <header class="navbar d-flex justify-content-between align-items-center px-3 shadow-sm">
    <div class="d-flex align-items-center gap-3">
      <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
      </button>
      <a class="navbar-brand d-flex align-items-center text-decoration-none" href="/">
        <img src="{{ asset('image/lasax3.png') }}" alt="Logo" width="45" height="30" class="me-2">
        <span class="fs-5">Lasax Adventure</span>
      </a>
    </div>
  </header>

  <!-- Wrapper (No changes to structure) -->
  <div id="mainWrapper" class="wrapper sidebar-visible">
    <nav id="sidebar" class="sidebar">
      <div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="/wisata" class="nav-link @yield('navHome')">
              <i class="bi bi-house-door me-2"></i> Home
            </a>
          </li>

          @auth
            @if(auth()->user()->role === 'admin')
              <li>
                <a href="{{ route('wisata.create') }}" class="nav-link @yield('navInput')">
                  <i class="bi bi-plus-square me-2"></i> Input Wisata
                </a>
              </li>
              <li>
                <a href="{{ route('admin.list.wisata') }}" class="nav-link @yield('navAdmin')">
                  <i class="bi bi-card-list me-2"></i> Data Wisata
                </a>
              </li>
              <li>
                <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                  <i class="bi bi-journal-check me-2"></i> Daftar Booking User
                </a>
              </li>
              <li>
                <a href="{{ route('admin.guides.index') }}" class="nav-link @yield('navGuides')">
                  <i class="bi bi-people-fill me-2"></i> Daftar Guide
                </a>
              </li>
            @else
              <li>
                <a href="{{ route('booking.user') }}" class="nav-link">
                  <i class="bi bi-calendar-check me-2"></i> Booking Saya
                </a>
              </li>
              <li>
                <a href="{{ route('guide.list') }}" class="nav-link @yield('navGuides')">
                  <i class="bi bi-person-badge me-2"></i> Daftar Guide
                </a>
              </li>
            @endif
          @endauth

          <li>
            <a href="{{ route('review.index') }}" class="nav-link @yield('navReview')">
              <i class="bi bi-star-fill me-2"></i> Review
            </a>
          </li>
        </ul>
      </div>

      <!-- Sidebar Footer -->
      <div class="sidebar-footer">
        @auth
          <div class="text-start mb-2">
            <span class="small">Hello, {{ strtok(auth()->user()->nama, ' ') ?? auth()->user()->email }}</span>
          </div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm w-100 btn-nature">
              <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
          </form>
        @endauth

        @guest
          <a href="{{ route('login') }}" class="btn btn-sm w-100 btn-nature">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login
          </a>
        @endguest
      </div>
    </nav>

    <!-- Content (No changes) -->
    <div class="content">
      @yield('container')

      <footer class="mt-3">
        <div class="container">
          &copy; {{ date('Y') }} by Naufal Munte
        </div>
      </footer>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Toggle Sidebar Script -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const wrapper = document.getElementById('mainWrapper');

      sidebar.classList.toggle('collapsed');
      wrapper.classList.toggle('sidebar-hidden');
      wrapper.classList.toggle('sidebar-visible');
    }
  </script>
</body>
</html>