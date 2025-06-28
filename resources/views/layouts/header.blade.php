<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top shadow-sm" style="background-color: #00BFA6;">
    <div class="container">
      <!-- Logo dan Brand -->
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{ asset('image/lasax3.png') }}" alt="Logo" width="50" height="30" class="me-2">
        <span class="fw-bold fs-5 text-dark">Lasax Adventure</span>
      </a>

      <!-- Mobile Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link @yield('navHome')" href="/wisata"
               style="color: #000000;"
               onmouseover="this.style.color='#ffffff'" 
               onmouseout="this.style.color='#000000'">
               Home
            </a>
          </li>

          @auth
          @if(auth()->user()->role === 'admin')
            <li class="nav-item">
              <a class="nav-link @yield('navInput')" href="{{ route('wisata.create') }}"
                 style="color: #000000;"
                 onmouseover="this.style.color='#ffffff'" 
                 onmouseout="this.style.color='#000000'">
                 Input Wisata
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('navAdmin')" href="{{ route('admin.list.wisata') }}"
                 style="color: #000000;"
                 onmouseover="this.style.color='#ffffff'" 
                 onmouseout="this.style.color='#000000'">
                 Data Wisata
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.bookings.index') }}"
                 style="color: #000000;"
                 onmouseover="this.style.color='#ffffff'" 
                 onmouseout="this.style.color='#000000'">
                 Daftar Booking User
              </a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('booking.user') }}"
                 style="color: #000000;"
                 onmouseover="this.style.color='#ffffff'" 
                 onmouseout="this.style.color='#000000'">
                 Booking Saya
              </a>
            </li>
          @endif
          @endauth

          <li class="nav-item">
            @if(auth()->check() && auth()->user()->role === 'admin')
              <a class="nav-link @yield('navGuides')" href="{{ route('admin.guides.index') }}"
                 style="color: #000000;"
                 onmouseover="this.style.color='#ffffff'" 
                 onmouseout="this.style.color='#000000'">
                 Daftar Guide
              </a>
            @elseif(auth()->check())
              <a class="nav-link @yield('navGuides')" href="{{ route('guide.list') }}"
                 style="color: #000000;"
                 onmouseover="this.style.color='#ffffff'" 
                 onmouseout="this.style.color='#000000'">
                 Daftar Guide
              </a>
            @endif
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('navHome')" href="{{ route('review.index') }}"
               style="color: #000000;"
               onmouseover="this.style.color='#ffffff'" 
               onmouseout="this.style.color='#000000'">
               Review
            </a>
          </li>
        </ul>

        <!-- Login/Logout -->
        <div class="d-flex align-items-center">
          @auth
            <span class="me-3 text-dark">Hello, {{ strtok(auth()->user()->nama, ' ') ?? auth()->user()->email }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-outline-dark btn-sm"
                      style="color: #000000;"
                      onmouseover="this.style.color='#ffffff'" 
                      onmouseout="this.style.color='#000000'">
                Logout
              </button>
            </form>
          @endauth

          @guest
            <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm"
               style="color: #000000;"
               onmouseover="this.style.color='#ffffff'" 
               onmouseout="this.style.color='#000000'">
               Login
            </a>
          @endguest
        </div>
      </div>
    </div>
  </nav>
</header>
