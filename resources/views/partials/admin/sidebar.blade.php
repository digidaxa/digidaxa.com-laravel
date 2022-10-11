<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ '/' }}">
        <div class="sidebar-brand-icon">
            <img src="{{ '/img/logo.webp' }}" class="w-100 h-100" alt="logo Digidaxa">
        </div>
        <div class="sidebar-brand-text ml-3">
            Digidaxa
        </div>
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (Request::is('/')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ '/' }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        3D Model Management
    </div>

    <li class="nav-item {{ (Request::is('products/*')) ? 'active' : ''; }}">
        <a class="nav-link {{ (Request::is('products/*')) ? '' : 'collapsed'; }}" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-box"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse {{ (Request::is('products/*')) ? 'show' : ''; }}" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Products:</h6>
                <a class="collapse-item {{ (Request::is('products/*list')) ? 'active' : '' }}" href="{{ '/products/list' }}">All</a>
                <a class="collapse-item {{ (Request::is('products/*add')) ? 'active' : '' }}" href="{{ '/products/add' }}">Add New</a>
                <a class="collapse-item {{ (Request::is('products/*categories')) ? 'active' : '' }}" href="{{ '/products/categories' }}">Categories</a>
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
