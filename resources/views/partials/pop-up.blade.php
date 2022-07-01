<section class="collapse-nav" id="navbarNav">
    <ul class="navbar-nav ms-auto" id="collapse-ul">
      <li class="logo-collapse">
        <a href="#" class="btn-collapse">
          <i class="bx bx-menu collapse-btn-icon"></i>
        </a>

        <a class="navbar-brand" href="#">
          <img src="assets/img/logo.png" alt="SSR's Logo" width="100" />
        </a>
      </li>
      <li class="nav-item">
        <a href="/ketentuan" class="nav-link"
          ><img src="assets/img/codesandbox.png" alt="" /> Ketentuan Pembuatan
          Surat</a
        >
      </li>
      <li class="nav-item">
        <a href="/contact-person" class="nav-link"
          ><img src="assets/img/phone-incoming.png" alt="" /> Contact
          Person</a
        >
      </li>
    </ul>
  </section>

  <section class="pop-card notif-card">
    <div class="header-card">
      <h4>Info Kesehatan</h4>
      <a class="nav-link" aria-current="page" href="#">
        <i class="bx bx-info-circle" style="font-size: 30px; margin-right: -30px;"></i>
      </a>
    </div>
    <div class="body-card">
      @if($contents)
      
          <ul>
            @foreach ($contents as $content)
            <li class="content-card">
              <img src="{{ asset('storage/' . $content->thumbnail) }}" width="80" alt=""><br>
              <a class="content-link" href="{{ $content->url }}">{{ $content->judul }}</a>
            </li>
            <hr>
            @endforeach
          </ul>
      
    @else
      <p class="notif-desc">Tidak ada Info Kesehatan</p>
    @endif
    </div>
  </section>

  <section class="pop-card profile-card">
    <div class="header-card">
      <h4>{{ auth()->user()->nama_depan }}</h4>
      <a class="nav-link" aria-current="page" href="/dashboard">
        @if(auth()->user()->picture)
          <img class="profile-pict" style="margin-top: 2px !important;" src="{{ asset('storage/' . auth()->user()->picture) }}" alt="Profile's Picture" width="50" />
        @else
          <img class="profile-pict" style="margin-top: 2px !important;" src="{{ asset('storage/picture/profile.png') }}" alt="Profile's Picture" width="50" />
        @endif
      </a>
    </div>
    <div class="links">
      <form action="/beralih-akun" method="post">
        @csrf
          <button class="logout nav-link" type="submit" onclick=""><img src="assets/img/shuffle.png" alt="" class="profile-icon" />Beralih Akun</button>
      </form>

      <form action="/logout" method="post">
        @csrf
          <button class="logout nav-link" type="submit" onclick=""><img src="assets/img/log-in.png" alt="" class="profile-icon" /> Keluar</button>
      </form>
    </div>
  </section>

  