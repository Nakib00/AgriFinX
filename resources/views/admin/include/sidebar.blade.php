{{--  <!-- Sidebar -->  --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{--  <!-- Sidebar - Brand -->  --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">AgriFinx</div>
    </a>

    {{--  <!-- Divider -->  --}}
    <hr class="sidebar-divider my-0">

    {{--  <!-- Nav Item - Dashboard -->  --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{--  <!-- Divider -->  --}}
    <hr class="sidebar-divider">

    {{--  <!-- Heading -->  --}}
    <div class="sidebar-heading">
        Interface
    </div>

    {{--  <!-- Nav Item - -->  --}}
    {{--  Crod item  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <span>Crop Details</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('crop') }}">Add Crop</a>
                <a class="collapse-item" href="{{ route('crop.marcketprice') }}">Crop Marcket Price</a>
            </div>
        </div>
    </li>
    {{--  Farmer  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('farmer.show') }}">
            <span><b>Farmer</b></span></a>
    </li>
    {{--  Invistor officer  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('invistor.show') }}">
            <span><b>Invistor</b></span></a>
    </li>
    {{--  Agri org  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw"
            aria-expanded="true" aria-controls="collapseTw">
            <span>Agriculture organization</span>
        </a>
        <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('loanprovider.show') }}">Loan Provider</a>
                <a class="collapse-item" href="{{ route('insurance.show') }}">Insurance Provider</a>
                <a class="collapse-item" href="{{ route('investingorg.show') }}">Investing organization</a>
            </div>
        </div>
    </li>

    {{--  <!-- Divider -->  --}}
    <hr class="sidebar-divider d-none d-md-block">

    {{--  <!-- Sidebar Toggler (Sidebar) -->  --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
{{--  <!-- End of Sidebar -->  --}}
