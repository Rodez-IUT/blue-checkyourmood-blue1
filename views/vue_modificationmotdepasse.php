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
    <!-- Partie modification des données de l'utilisateur -->
    <div class="container-fluid text-center">
        <p class="espace1"></p>
        <h2>Modification de votre mot de passe</h2>
        <p class="espace1"></p>
        <?php
            if (isset($_GET['err'])) {
        ?>
        <!-- Affichage des erreurs -->
        <div class="row">
            <div class="col-3"></div>
                <?php
                    $err = htmlspecialchars($_GET['err']);

                    switch ($err) {
                        case 'mdp':
                ?>
                <div class="col alert alert-warning">
                    <strong>Mot de passe actuel incorrect</strong>
                </div>
                <?php
                    break;
                    case 'vide':
                ?>
                <div class="col alert alert-warning">
                    <strong>Veuillez remplir les champs</strong>
                </div>
                <?php
                    break;
                    case 'confirmer':
                ?>
                <div class="col alert alert-warning">
                    <strong>Les mots de passes ne correspondent pas</strong>
                </div>
                <?php
                    break;     
                    case 'nope':       
                ?>
                <div class="col alert alert-success">
                    <strong>Modification du mot de passe effectuée</strong>
                </div>
                <?php break; } ?>
                <div class="col-3"></div>
            </div>
        <?php } ?>
        <p class="espace1"></p>
        <!-- Formulaire pour modifier le mot de passe -->
        <form action="/?controller=modificationmotdepasse&action=modifierMotDePasse" method="POST">
            <div class="row">
                <div class="col-3"></div>
                <!-- Saisie du mot de passe actuel -->
                <div class="col gauche">    
                    <label for="motDePasseActuel">Saisissez votre mot de passe actuel</label>
                    <input name="motDePasseActuel" type="password" class="form-control" placeholder="Saisissez votre mot de passe actuel">
                </div>
                <div class="col-3"></div>
                <p class="espace1"></p>
                <div class="col-3"></div>
                <!-- Saisie du nouveau mot de passe -->
                <div class="col gauche">
                    <label for="nouveauMotDePasse">Saisissez votre nouveau mot de passe</label>
                    <input name="nouveauMotDePasse" type="password" class="form-control" placeholder="Saisissez votre nouveau mot de passe">
                </div>
                <!-- Confirmation du mot de passe -->
                <div class="col gauche">
                    <label for="confirmerMdp">Confirmer votre nouveau mot de passe</label>
                    <input name="confirmerMdp" type="password" class="form-control" placeholder="Saisissez votre nouveau mot de passe pour confirmer">
                </div>
                <div class="col-3"></div>
            </div>
            <p class="espace1"></p>
            <!-- ID de l'utilisateur caché -->
            <input hidden name="idUtilisateur" value="<?php echo($_SESSION['id']); ?>">
            <!-- Bouton pour valider la modification -->
            <input type="submit" value="Valider la modification" class="btn btn-primary">
        </form>
        <p class="espace0"></p>
        <!-- Lien pour annuler et retourner au profil -->
        <a  class="btn btn-danger" href="/?controller=profil">Annuler</a>
    </div>
</body>
</html>