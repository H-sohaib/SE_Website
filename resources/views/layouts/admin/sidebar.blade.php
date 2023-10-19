<nav id="sidebarMenu" class="hide-sidebar d-lg-block sidebar bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">



            <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Accueil</span>
            </a>

            <a href="{{ route('admin.organisation_modulaire.index') }}"
                class="list-group-item list-group-item-action py-2 ripple d-flex" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Table des modules</span>
            </a>

            <a href="{{ route('admin.pfe_exemples.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Gestion des PFEs</span>
            </a>

            <a href="{{ route('admin.pfe_types.index') }}"
                class="list-group-item list-group-item-action py-2 ripple d-flex" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Gestion des types des PFEs</span>
            </a>

            <a href="{{ route('admin.admin_management.index') }}"
                class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Gestion des admins</span>
            </a>



        </div>
    </div>
</nav>
