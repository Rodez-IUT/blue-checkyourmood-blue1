<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Boutons pour revenir a l'accueil -->
        <a class="navbar-brand" href="/?controller=accueil">
            <img src="..\..\images\logo.png" alt="Logo CheckYourMood" width="35%">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <!-- Boutons pour afficher le profil et se déconnecter-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/?controller=profil"><i class="fa-solid fa-user"></i>&nbsp;Profil</a>
                </li>
                <li>
                    <a class="nav-link" href="/?controller=connexion&action=deconnexion"> <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>