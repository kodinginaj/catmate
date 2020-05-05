        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Our Menu
            </div>

                
            <li class="nav-item active">
                <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Dashboard</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin/ras'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Ras Kucing</span></a>
            </li>
       

            <hr class="sidebar-divider mt-3">


        

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End  of Sidebar --> 