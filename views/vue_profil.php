<?php
require 'includes/header.php';

if (!isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) {
    header('Location: /?controller=index');
}
?>
<body>
    <!-- Barre de navigation -->
    <?php
        require 'includes/navbar.php';
    ?>
    <div class="container-fluid text-center">
        <p class="espace2"></p>
        <!-- Formulaire avec les input disabled pour afficher les informations de l'utilisateur -->
        <form action="/?controller=profil&action=modifierProfil" method="POST">
            <div class="row">
                <div class="col"></div>
                <!-- Partie Nom, Prenom, Genre -->
                <div class="col">
                    <div class="gauche">
                        <label class="form-label">Nom</label>
                        <input disabled value="<?php echo($_SESSION['nom']); ?>" type="Text" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Prenom</label>
                        <input disabled value="<?php echo($_SESSION['prenom']); ?>" type="Text" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Genre</label>
                        <select disabled class="form-select">
                            <?php if ($_SESSION['genre'] == "homme") { ?>
                            <option value="homme" selected>homme</option>
                            <option value="femme">femme</option>
                            <option value="autre">autre</option>
                            <?php } else if ($_SESSION['genre'] == "femme") { ?>
                            <option value="homme">homme</option>
                            <option value="femme" selected>femme</option>
                            <option value="autre">autre</option>
                            <?php } else { ?>
                            <option value="homme">homme</option>
                            <option value="femme">femme</option>
                            <option value="autre" selected>autre</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- Partie Adresse Mail, Nom d'utilisateur, date de naissance-->
                <div class="col">
                    <div class="gauche">
                        <label class="form-label">E-Mail</label>
                        <input disabled value="<?php echo($_SESSION['mail']); ?>" type="email" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Nom d'utilisateur</label>
                        <input disabled value="<?php echo($_SESSION['nom_utilisateur']); ?>" type="text" class="form-control">
                    </div>
                    <p class="espace0"></p>
                    <div class="gauche">
                        <label class="form-label">Date de naissance</label>
                        <input disabled value="<?php echo($_SESSION['date_naissance']); ?>" type="date" class="form-control">
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <p class="espace1"></p>

            <!-- Id de l'utilisateur caché -->
            <input hidden name="idUtilisateur" value="<?php echo($_SESSION['id']); ?>">

            <!-- Boutons pour modifier ses informations ou modifier son mot de passe -->
            <div class="row">
                <div class="col"></div>
                <div class="col-2"><a href="/?controller=modificationProfil" class="btn btn-primary">Modifier mes informations</a></div>
                <div class="col-2"><a href="/?controller=modificationMotDePasse" class="btn btn-secondary">Modifier mon mot de passe</a></div>
                <div class="col"></div>
            </div>
        </form>
        <p class="espace0"></p>
        
        <!-- Boutton pour afficher le modal contenant le formulaire de desinscription -->
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeinscription">Me désinscrire</button>

        <!-- Modal contenant le formulaire de deinscription et qui appelle le controller profil et l'action supprimer profil -->
        <div class="modal fade" id="modalDeinscription">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation de déinscription </h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Vous etes sur le point de vous déinscrire de CheckYourMood. <br><br>
                        En cliquant sur <b>me déinscrire de CheckYourMood</b> vous ne pourrez plus acceder au services de CheckYourMood et vos données personnelles seront supprimées.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <!-- Formulaire avec un input caché qui contient l'id de l'utilisateur -->
                        <form action="/?controller=profil&action=supprimerProfil" method="POST">
                            <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id']); ?>">
                            <input id="confirmationSupp" type="submit" value="Me déinscrire de CheckYourMood" data-bs-dismiss="modal" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification si l'utilisateur à decider de se désincrire de l'application -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="confirmationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">CheckYourMood</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Vous avez bien été déinscrit de CheckYourMood.
                </div>
            </div>
        </div>

        <!-- Script pour appeler la notification si l'utilisateur s'est deinscrit de checkyourmood -->
        <script>
            const toastTrigger = document.getElementById('confirmationSupp');
            const toastConfirmation = document.getElementById('confirmationToast');

            if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastConfirmation);

                toast.show();
            })
            }
        </script>

    </div>
</body>
</html>