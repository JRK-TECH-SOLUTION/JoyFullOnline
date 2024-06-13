<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="cdashbaord" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JoyFull</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
            <a href="/cdashbaord" class="nav-link active">
              <i class="fas fa-tachometer-alt"></i>
              <p>
                Menu

              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="corderbycustomer" class="nav-link">
              <i class="fa fa-shopping-cart"></i>
              <p>
                My Cart


              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="myorder" class="nav-link">
              <i class=" fas fa-th"></i>
              <p>
                My Orders

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">

                <i class="fas fa-sign-out-alt"></i>
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
