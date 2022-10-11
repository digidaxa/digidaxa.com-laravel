<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ '/' }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-home"></i>
        </div>
        <div class="sidebar-brand-text ml-3">
            Beranda
        </div>
    </a>

    <!-- Nav Item - admin -->
    <li class="nav-item {{ (Request::is('/admin')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ '/admin' }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Admin</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        3D Model Management
    </div>

    <li class="nav-item {{ (Request::is('admin/products/*')) ? 'active' : ''; }}">
        <a class="nav-link {{ (Request::is('admin/products/*')) ? '' : 'collapsed'; }}" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-box"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse {{ (Request::is('admin/products/*')) ? 'show' : ''; }}" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Products:</h6>
                <a class="collapse-item {{ (Request::is('admin/products/*list')) ? 'active' : '' }}" href="{{ '/admin/products/list' }}">All</a>
                <a class="collapse-item {{ (Request::is('admin/products/*add')) ? 'active' : '' }}" href="{{ '/admin/products/add' }}">Add New</a>
                <a class="collapse-item {{ (Request::is('admin/products/*categories')) ? 'active' : '' }}" href="{{ '/admin/products/categories' }}">Categories</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
