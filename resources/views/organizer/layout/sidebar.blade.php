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
                    <a href="{{ route('organizer.dashboard') }}" class="nav-link">
                        <i class=" fas fa-tachometer-alt fa-2xl"></i>
                        <b>
                            <p>
                                &nbsp; Dashboard
                            </p>
                        </b>
                    </a>
                </li>

                {{-- events  --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" fa-solid fa-calendar-plus fa-xl"></i>
                        <p>
                            <b>
                                &nbsp; Event Management
                                <i class="fas fa-angle-left right"></i>
                            </b>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('organizer.addEvent') }}" class="nav-link">
                                &nbsp; <i class="fa-sharp fa-solid fa-plus fa-xs"></i>
                                <p>&nbsp; Add New Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('organizer.event') }}" class="nav-link">
                                &nbsp; <i class="fa-solid fa-calendar-check fa-xs"></i>
                                <p>&nbsp; My Events</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('organizer.dashboard') }}" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="fa-solid fa-list-check fa-xl"></i>
                        <p>
                            <b>
                                &nbsp; Attendees Management
                            </b>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organizer.revenue.index') }}" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="fa-solid fa-money-check-dollar fa-xl"></i>
                        <p>
                            <b>
                                &nbsp; Revenue

                            </b>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organizer.ticket-verification') }}" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="fa-solid fa-money-check-dollar fa-xl"></i>
                        <p>
                            <b>
                                &nbsp; Verify Ticket

                            </b>
                        </p>
                    </a>
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
                <a href="{{ route('organizer.logout') }}" class="nav-link">
                    {{-- <i class="nav-icon fas fa-th"></i> --}}
                    &nbsp;
                    <i class="fa-solid fa-circle-info fa-lg"></i>
                    <p>
                        &nbsp; Help and Support
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-custom -->
</aside>
