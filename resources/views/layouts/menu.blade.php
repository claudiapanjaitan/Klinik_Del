    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Accordion (Home)-->
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Beranda
                </a>
                <!-- Sidenav Accordion (Konsultasi)-->
                <div class="dropdown-divider"></div>
                <a class="nav-link collapsed {{ Request::is('konsultasi*','jadwal*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Konsultasi
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                        <!-- Nested Sidenav Accordion (Consultation -> Jadwal)-->
                        <a class="nav-link collapsed {{ Request::is('jadwal*') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">
                            Jadwal
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <!-- Nested Sidenav Accordion (Consultation -> Pengajuan)-->
                        <a class="nav-link collapsed {{ Request::is('konsultasi*') ? 'active' : '' }}" href="{{ route('konsultasi.index') }}">
                            Pengajuan
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                    </nav>
                </div>
                <!-- Sidenav Accordion (About)-->
                <a class="nav-link collapsed {{ Request::is('aboutclinic*','about') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Tentang
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                        <!-- Nested Sidenav Accordion (About -> About Clinic)-->
                        <a class="nav-link collapsed {{ Request::is('aboutclinic*') ? 'active' : '' }}" href="{{ route('aboutclinic.index')  }}">
                            Tentang Klinik
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <!-- Nested Sidenav Accordion (About -> About Us)-->
                        <a class="nav-link collapsed {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            Tentang Kami
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                    </nav>
                </div>
                <!-- Sidenav (Comment)-->
                <div class="dropdown-divider"></div>
                <a class="nav-link {{ Request::is('saran') ? 'active' : '' }}" href="{{ route('saran.index') }}">
                    <div class="nav-link-icon"><i data-feather="message-square"></i></div>
                    Saran
                </a>
            </div>
        </div>
        <!-- Sidenav Footer-->
        @auth
            @if(Auth::user()->role_id==1)
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle"><i data-feather="user"></i>Logged in as:</div>
                    <div class="sidenav-footer-title">Staff</div>
                </div>
            </div>
            @elseif(Auth::user()->role_id==2)
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle"><i data-feather="user"></i>Logged in as:</div>
                    <div class="sidenav-footer-title">Mahasiswa</div>
                </div>
            </div>
        @else
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle"><i data-feather="user"></i>Logged in as:</div>
                    <div class="sidenav-footer-title">-</div>
                </div>
            </div>
            @endif
        @endauth
    </nav>