<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="{{ asset('dist/img/logo5.png') }}" alt="GB Events Logo" class="brand-image img-circle elevation-5" style="opacity: 1.5">
     <span class="brand-text font-weight-light"> <h3><b>GB Events</b></h3></span>
   </a>
 
   <!-- Sidebar -->
   <div class="sidebar">
 
     <!-- Sidebar Menu -->
     <nav class="mt-4">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="{{ route('attendee.dashboard') }}" class="nav-link">
             <i class=" fas fa-tachometer-alt fa-2xl mr-2"></i>
           <b>
            <p>
              &nbsp;   Dashboard
            </p>
           </b>
           </a>
         </li>

         <li class="nav-item">
           {{-- <a href="{{ route('attendee.events') }}" class="nav-link"> --}}
           <a href="{{ route('attendee.events') }}" class="nav-link">
             {{-- <i class="nav-icon fas fa-th"></i> --}}
             <i class="fa-solid fa-list-check fa-xl mr-2"></i>
             <b>
              <p>
               &nbsp; Events
             </p>
             </b>
           </a>
         </li>

         {{-- wishlist  --}}
         <li class="nav-item">
           {{-- <a href="{{ route('attendee.events') }}" class="nav-link"> --}}
           <a href="{{ route('attendee.wishlist') }}" class="nav-link">
             <i class="fa-solid fa-cart-shopping fa-xl mr-2"></i>
            <b>
              <p>
                &nbsp; My Cart
              </p>
            </b>
           </a>
         </li>

       
         <li class="nav-item">
           <a href="{{ route('attendee.tickets') }}" class="nav-link">
             {{-- <i class="nav-icon fas fa-th"></i> --}}
             {{-- <i class="fa-solid fa-circle-info fa-xl"></i>  --}}
             <i class="fa-solid fa-ticket fa-lg mr-2"></i>            
            <b>
              <p>
                &nbsp; My Tickets
              </p>
            </b>
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
        <a href="{{ route('attendee.logout') }}" class="nav-link">
          {{-- <i class="nav-icon fas fa-th"></i> --}}
          &nbsp; 
          <i class="fa-solid fa-circle-info fa-lg"></i>
          <p>
              &nbsp; Tickets Purchased
            </p>
         </a>
      </li>
    </ul>
</div>
   <!-- /.sidebar-custom -->

   
 </aside>