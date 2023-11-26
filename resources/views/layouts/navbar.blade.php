<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <a class="navbar-brand pe-3 ps-4 ps-lg-2">Klinik Del</a>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
    @auth
        @if(Auth::user()->role_id==2)
            <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="me-2" data-feather="bell"></i>
                        Notifikasi
                    </h6>
                    @php
                        $pemberitahuan = \App\Models\Konsultasi::where('user_id',auth()->user()->id)->get(); 
                        $count =0;
                    @endphp
                    <!-- Example Alert 1-->
                    @foreach ($pemberitahuan as $item)
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">{{$item->created_at->diffForHumans()}}</div>
                                <div class="dropdown-notifications-item-content-text">{{ $item->pemberitahuan }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </li>
        @endif
    @endauth
        <!-- User Dropdown-->
        @auth
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="/assets/img/illustrations/profiles/img.png"/></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="/assets/img/illustrations/profiles/img.png" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ auth()->user()->nama }}</div>
                        <div class="dropdown-user-details-email">{{ auth()->user()->email }}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                    @csrf
                <button type="submit" class="dropdown-item">
                <a class="dropdown-item">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Logout
                    </form>
                </a>
                </button>
            </div>
        </li>
        @else
        <span class="mx-3">
            <a href="/login" class="btn btn-outline-primary">Login</a>
        </span>
        @endauth
    </ul>
</nav>