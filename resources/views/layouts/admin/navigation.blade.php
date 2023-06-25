    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center justify-content-between ps-3 pe-3">
        {{-- <div class="d-flex align-items-center justify-content-evenly"> --}}

        <h1 class="logo ms-3"><img src="{{ asset('assets/images/logo.png') }}" alt=""></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar  me-5">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('home') }}">Page des visiteurs</a></li>
                <li><a class="nav-link scrollto" href="{{ route('profile.edit') }}">Profile</a></li>
                {{-- side bar links --}}
                <li class="admin-links"><a class="nav-link scrollto" href="{{ route('admin.index') }}">Accueil</a></li>
                <li class="admin-links"><a class="nav-link scrollto"
                        href="{{ route('admin.organisation_modulaire.index') }}">Organisation
                        modulaire</a></li>
                <li class="admin-links"><a class="nav-link scrollto" href="{{ route('admin.pfe_types.index') }}">PFE
                        Types</a></li>
                <li class="admin-links"><a class="nav-link scrollto"
                        href="{{ route('admin.pfe_exemples.index') }}">Exemples PFE</a></li>
                <li>
                    <form class="m-0 p-0" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="fw-bold nav-link scrollto">Log Out</button>
                    </form>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        {{-- </div> --}}
    </header>
