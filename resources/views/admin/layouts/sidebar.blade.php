<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin-assets/img/Admin-Panel logo.jpg') }}" alt="Shopping-site logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"
            style="font-family: Georgia, 'Times New Roman', Times, serif;">Admin-Panel</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <!-- Create Company -->
        <li class="nav-item">
            <a href="{{ route('admin.create_company.index') }}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>Create Company</p>
            </a>
        </li>
        <!-- Company Details -->
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info-circle"></i>
                <p>Company Details</p>
            </a>
        </li> -->
          <!-- Create Company Profile -->
          <li class="nav-item">
            <a href="{{ route('admin.company.create') }}" class="nav-link">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Create Company Profile</p>
            </a>
        </li>
        <!-- Company Profile -->
        <li class="nav-item">
            <a href="{{ route('admin.company.profile') }}" class="nav-link">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Company Profile</p>
            </a>
        </li>
        <!-- Add Common Layouts -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>Add Common Layouts</p>
            </a>
        </li>
        <!-- Multiple Branch -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-code-branch"></i>
                <p>Multiple Branch</p>
            </a>
        </li>
        <!-- Settings -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>Settings</p>
            </a>
        </li>
        <!-- Messages -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Messages</p>
            </a>
        </li>
        <!-- Users -->
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Employee</p>
            </a>
        </li>
        <!-- Pages -->
        <li class="nav-item">
            <a href="{{ route('pages.index') }}" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Pages</p>
            </a>
        </li>
        <!-- Cache Clear -->
        <li class="nav-item">
            <a href="{{ route('admin.clearCache') }}" class="nav-link">
                <i class="nav-icon fas fa-trash-alt"></i>
                <p>Cache Clear</p>
            </a>
        </li>
    </ul>
</nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>