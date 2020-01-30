<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-primary py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Attendance</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/home"><i class="fas fa-home"> &nbsp; Home
              <span class="sr-only">(current)</span>
            </i></a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/about"><i class="fas fa-user-alt"> &nbsp; About</i></a>
          </li>
          <div class="dropdown">
          <li class="nav-item px-lg-4">
            <a class="dropdown-toggle nav-link text-uppercase text-expanded" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-id-card"> &nbsp; Data</i></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="/karyawan">Karyawan</a>
            
            <a class="dropdown-item" href="/posisi">Posisi</a>
           
            <a class="dropdown-item" href="/absensi">Schedule Kerja</a>
           <!--  @if(Auth::user()->role == 'admin')
            <a class="dropdown-item" href="/absensi">Detail Schedule </a>
            @endif -->
          </div>
          </div>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/perusahaan"><i class="fas fa-building"> &nbsp; Perusahaan</i></a>
          </li>
          <div class="dropdown">
          <li class="nav-item px-lg-4" >
            <a class="dropdown-toggle nav-link text-uppercase text-expanded" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-tie">&nbsp;{{auth()->user()->name}} </i>
            </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="/profil">Profile</a>
            <!-- <a class="dropdown-item" href="/jadwal">Jadwal Kerja</a> -->
            @if(Auth::user()->role == 'admin')
            <!-- <a class="dropdown-item" href="/register">Kelola User</a> -->
            @endif
            <a class="dropdown-item" href="/logout">Log Out</a>
          </div>
          </div>
        </ul>
      </div>
    </div>
  </nav>