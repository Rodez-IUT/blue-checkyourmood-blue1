<?php
require 'includes/header.php';
?>
<body>
    <div class="container-fluid text-center">
        <p class="espace3"></p>
        <div class="row">
            <div class="col">
                <h1>CheckYourMood</h1>
            </div>
        </div>
        <p class="espace1"></p>
        <div class="row">
            <div class="col"></div>
                <div class="col-4">
                    <!-- Formulaire de connexion -->
                    <form action="/?controller=connexion&action=connexion" method="POST">
                        <div class="cadreConnexion">
                            <p class="espace1"></p>
                            <h5 class="texteGris">Bienvenue, saisissez vos identifiants</h5>
                            <p class="espace1"></p>
                            
                            <?php
                            if (isset($_GET['err'])) {
                            ?>
                            <!-- Affichage des erreurs -->
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col alert alert-warning">
                                <?php
                                $err = htmlspecialchars($_GET['err']);

                                switch ($err) {
                                    
                                    case 'identifiantmdp':
                                ?>
                                <strong>Identifiant ou mot de passe incorrect</strong>
                                <?php
                                    break;

                                    case 'vide':
                                ?>
                                <strong>Veuillez remplir les champs</strong>
                                <?php
                                    break;
                                }
                                ?>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <?php
                            }
                            ?>
                            <!-- Saisie de l'identifiant -->
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col gauche">
                                    <label>Identifiant</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <input name="identifiant" type="text" class="form-control" placeholder="Saisissez votre identifiant">
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <p class="espace1"></p>
                            <!-- Saisie du mot de passe -->
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col gauche">
                                    <label>Mot de passe</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <input name="motDePasse" type="password" class="form-control" placeholder="Saisissez votre mot de passe">
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <p class="espace1"></p>
                            <!-- Bouton pour se connecter -->
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <div class="d-grid">
                                        <input type="submit" value="Se connecter" class="btn btn-primary">
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <p class="espace0"></p>
                            <!-- Lien pour s'inscrire sur l'application -->
                            <div class="row">
                                <div class="col">Pas encore inscrit ? <a class="rougeClair" href="/?controller=inscription">Cliquez ici !</a></div>
                            </div>
                            <p class="espace1"></p>
                        </div>
                    </form>
                </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>
