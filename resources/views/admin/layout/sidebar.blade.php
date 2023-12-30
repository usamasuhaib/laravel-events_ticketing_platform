    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('dist/img/logo5.png') }}" alt="GB Events Logo" class="brand-image img-circle elevation-5"
                style="opacity: 1.5">
            <span class="brand-text font-weight-light">
                <h3><b>GB Events</b></h3>
            </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class=" fas fa-tachometer-alt fa-2xl"></i>
                           <b>
                            <p>
                                &nbsp; Dashboard
                            </p>
                           </b>
                        </a>
                    </li>
                    <li class="nav-item">
                        {{-- <a href="{{route('')}}" class="nav-link"> --}}
                        <a href="{{ route('admin.events') }}" class="nav-link">
                            <i class=" fa-solid fa-calendar-plus fa-xl"></i>
                           <b>
                            <p>
                                &nbsp; &nbsp; Events
                            </p>
                           </b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.organizersList') }}" class="nav-link">
                            {{-- <i class="nav-icon fas fa-th"></i> --}}
                            <i class="fa-solid fa-people-roof fa-xl"></i>
                           <b>
                            <p>
                                &nbsp; Organizers
                            </p>
                           </b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.attendeesList') }}" class="nav-link">
                            {{-- <i class="nav-icon fas fa-th"></i> --}}
                            <i class="fa-solid fa-users fa-xl"></i>
                            <b>
                                <p>
                                    &nbsp; Attendees
                                </p>
                            </b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../widgets.html" class="nav-link">
                            {{-- <i class="nav-icon fas fa-th"></i> --}}
                            <i class="fa-solid fa-chart-simple fa-xl"></i>
                            <b>
                                <p>
                                    &nbsp; &nbsp; Analytics
                                </p>
                            </b>
                        </a>
                    </li>

                    <li class="nav-item">
                        {{-- <a href="../widgets.html" class="nav-link">
                            <i class="fa-solid fa-circle-info fa-xl"></i>
                            <p>
                                &nbsp; Help and Support
                            </p>
                        </a> --}}
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

        <div class="sidebar-custom">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        &nbsp;
                        <i class="fa-solid fa-circle-info fa-lg"></i>
                        <p>
                            &nbsp; &nbsp; Help and Support
                        </p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-custom -->
    </aside>
