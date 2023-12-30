<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item">
            <a href="" class="nav-link"><strong>Events Ticketing Platform</strong></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- contact  --}}
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" data-target="#navbar-search3" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block" id="navbar-search3">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>





        </li>


        {{-- user panel  --}}

        <li class="nav-item dropdown">
            <a class="" data-toggle="dropdown" href="#">

                <div class="nav-item image user-panel mt-1 pb-1 mb-1 d-flex">
                    @php
                        $profileImage = Auth::guard('organizer')->user()->profile_image;
                    @endphp
                    @if ($profileImage)
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('storage/organizer-profile-images/' . Auth::guard('organizer')->user()->profile_image) }}"
                            alt="Profile img">
                    @else
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('images/dummy-profile/dummy-profile.png') }}" alt="Profile img">
                    @endif
                </div>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @auth
                <span class="dropdown-item dropdown-header"><b>{{ Auth::user()->name }}</b></span>
            @endauth                    
            <p class="text-muted text-center">Organizer</p>

                </span>


                <div class="dropdown-divider"></div>
                <a href="{{ route('organizer.profile') }}" class="dropdown-item">
                    <i class="fa-solid fa-user fa-lg mr-3"></i> Show Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('organizer.passwordUpdateForm') }}" class="dropdown-item">
                    <i class="fa-solid fa-key fa-lg mr-3"></i>
                    Password Update
                </a>
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
                <a href="{{ route('organizer.logout') }}" class="dropdown-item dropdown-footer">
                    <i class="fa-solid fa-power-off fa-lg"></i>
                    <b>Logout</b>
                </a>
            </div>
        </li>


    </ul>
</nav>
