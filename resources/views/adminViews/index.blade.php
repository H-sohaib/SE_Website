<x-admin-layout>
    <div>
        <h4>Bienvenue {{ $user->name }} sur le tableau de bord</h4>
        <p>
            Ici, vous avez un contrôle total sur le contenu des différentes sections du site web.
            Vous pouvez créer, mettre à jour ou supprimer du contenu pour personnaliser l'expérience utilisateur..</p>
        <hr />
        <h4>Exemples PFE</h4>
        <p>Dans cette section, vous pouvez ajouter un nouvel exemple de PFE pour l'afficher dans la section "Quelques
            réalisations PFE" de la page des visiteurs. Vous pouvez également supprimer ou mettre à jour un exemple de
            PFE existant. Lors de la création, vous pouvez définir le nom du PFE, sa description (facultative), une
            image, le rapport du projet ou tout autre fichier PDF expliquant les détails du projet. Enfin, vous pouvez
            spécifier un type de PFE. Nous utilisons ce type pour créer un filtre permettant de séparer les projets en
            fonction du domaine du projet (WEB, Arduino, etc.) par exemple.</p>
        <hr />
        <h4>PFE Types</h4>
        <p>Dans cette section, vous pouvez ajouter les éléments du filtre (type de PFE) dont nous avons parlé dans la
            section "Exemples PFE". Vous pouvez supprimer ou ajouter un nouveau type, et il apparaîtra automatiquement
            dans les sélecteurs de filtres en haut.</p>
        <h4>Organisation modulaire</h4>
        <p>Dans cette section, vous contrôlez le contenu du tableau des modules dans la section "Organisation modulaire"
            de la page des visiteurs.</p>
        <h4>Gestion des admins</h4>
        <p>Dans cette section, vous pouvez ajouter d'autres comptes d'administrateurs pour accéder à ce tableau de bord
            ou supprimer un compte existant.
        </p>
    </div>

</x-admin-layout>
