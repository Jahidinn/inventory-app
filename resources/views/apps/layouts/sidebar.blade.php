<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Inventory App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('apps') ? 'active' : '' }}">
        <a class="nav-link" href="/apps">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        ITEMS MANAGEMENT
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('apps/items*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/apps/items">
            <i class="far fa-newspaper"></i>
            <span>Items (Barang)</span></a>
    </li>
    <li class="nav-item {{ Request::is('apps/categories*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/apps/categories">
            <i class="far fa-newspaper"></i>
            <span>Items category</span></a>
    </li>
    <li class="nav-item {{ Request::is('apps/unit*') ? 'active' : '' }}">
        <a class="nav-link" href="/apps/unit">
            <i class="far fa-newspaper"></i>
            <span>Items type</span></a>
    </li>

    
    {{-- Hanya bisa diakses oleh admin dengan gate autorization laravel --}}
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Transactions
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('apps/item_in*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/apps/item_in">
            <i class="fas fa-list"></i>
            <span>Item In</span></a>
    </li>
    <li class="nav-item {{ Request::is('apps/item_out*') ? 'active' : '' }}">
        <a class="nav-link" href="/apps/item_out">
            <i class="fas fa-list"></i>
            <span>Item Out</span></a>
    </li>
            
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Setting
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/myprofile">
            <i class="fas fa-user-cog"></i>
            <span>Profil</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->