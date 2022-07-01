@if ($title !== "Dashboard" && $title !== "Opsi" && $title !== "Contact Person" && $title !== "Ketentuan" && $title !== "Edit")
<!-- ============ HEADER =========== -->
<header id="header">
    <!-- ============ NAV =========== -->
    <nav class="navbar navbar-expand-lg nav-box-shadow">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="assets/img/logo.png" alt="SSR's Logo" width="100" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            @if ($title !== "Sign Up")
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/signup">Daftar</a>
                </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/users">Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>
@else
    @if ( $title !== "Contact Person" && $title !== "Ketentuan")
    <!-- ============ HEADER =========== -->
    <header id="header">
        <!-- ============ NAV =========== -->
        <nav class="navbar navbar-expand-lg nav-box-shadow">
          <div class="container">
            @if ($title !== "Opsi")
            <a href="#" class="btn-collapse">
              <i class="bx bx-menu collapse-btn-icon"></i>
            </a>
            @endif
  
            <a class="navbar-brand" href="/">
              <img src="assets/img/logo.png" alt="SSR's Logo" width="100" />
            </a>
  
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li
                  class="nav-item notif d-flex justify-content-center align-items-center mx-4"
                >
                  <a class="nav-link notif-pop" aria-current="page" href="#">
                    <i class="bx bx-info-circle" style="font-size: 50px; margin-right: -30px; margin-top: 10px;"></i>
                    {{-- <img class="notification" src="assets/img/notif.png" /> --}}
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link profile-pop" aria-current="page" href="#">
                    @if(auth()->user()->picture)
                      <img class="profile-pict" style="margin-top: 2px !important;" src="{{ asset('storage/' . auth()->user()->picture) }}" alt="Profile's Picture" width="200" />
                    @else
                      <img class="profile-pict" style="margin-top: 2px !important;" src="{{ asset('storage/picture/profile.png') }}" alt="Profile's Picture" width="200" />
                    @endif
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      @endif
@endif

