<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JoyFull</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('uploads/'.Auth::user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->FullName}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashbaord" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="product" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="orderbycustomer" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Customer Orders

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="systemuser" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                System User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="customer" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer Accounts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="delivery" class="nav-link">
              <i class="nav-icon fas fa-motorcycle"></i>
              
              <p>
                Delivery Riders Accounts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              
              <p>
                My Profile
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="logout" class="nav-link">

                <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                LogOut

              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
