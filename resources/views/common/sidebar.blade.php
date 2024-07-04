{{-- bg-gradient-primary --}}
<ul class="navbar-nav bg-gradient-primary  sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-2">
            {{-- DILP-MS --}} TUPAD
        </div>
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fa fa-hand-paper-o"></i> --}}
            <img src="{{asset('images/tupad-icon.png')}}" style="width: 52px; height: 40px;" alt="Thumbnail image">
        </div>
    </a>

    @auth

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Programs
        </div>

        <!-- Tupad -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tupad"
                aria-expanded="true" aria-controls="tupad">
                <i class="fa fa-users"></i>
                <span>Tupad Management</span>
            </a>
            <div id="tupad" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tupad:</h6>
                    <a class="collapse-item" href="{{ route('add-tupad-project-info-form') }}">Add Tupad Project</a>
                    <a class="collapse-item" href="{{ route('add-tupad-beneficiary-form') }}">Add Beneficiaries</a>
                    <a class="collapse-item" href="/dashboard/tupad-project-table">Tupad Project Table</a>
                    <a class="collapse-item" href="/dashboard/tupad-beneficiaries-table">Beneficiaries Table</a>
                    <a class="collapse-item" href="/dashboard/pending-tupad-project-table">Pending Project Table</a>
                </div>
            </div>
        </li>
        <!-- End -->

        <!-- DILP
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dileep"
                aria-expanded="true" aria-controls="tupad">
                <i class="fa fa-handshake-o"></i>
                <span>DILP Management</span>
            </a>
            <div id="dileep" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">DILP:</h6>
                    <a class="collapse-item" href="{{ route('add-tupad-project-info-form') }}">Add Tupad Project</a>
                    <a class="collapse-item" href="{{ route('add-tupad-beneficiary-form') }}">Add Beneficiaries</a>
                    <a class="collapse-item" href="/dashboard/tupad-project-table">Tupad Project Table</a>
                    <a class="collapse-item" href="/dashboard/tupad-beneficiaries-table">Beneficiaries Table</a>

                </div>
            </div>
        </li>-->
        <!-- End -->

        <!-- Heading -->
        <div class="sidebar-heading">
            Management
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
                aria-expanded="true" aria-controls="taTpDropDown">
                <i class="fas fa-user-alt"></i>
                <span>User Management</span>
            </a>
            <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User Management:</h6>
                    <a class="collapse-item" href="{{ route('users.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('users.create') }}">Add New</a>
                    <a class="collapse-item" href="{{ route('users.import') }}">Import Data</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin Section
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Masters</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Role & Permissions</h6>
                    <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                    <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    @endauth

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
