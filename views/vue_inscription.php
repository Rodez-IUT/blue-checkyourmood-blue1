<?php
require 'includes/header.php';
?>
<body>
    <div class="container-fluid text-center">
        <p class="espace1"></p>
        <div class="row">
            <div class="col">
                <h1>CheckYourMood</h1>
            </div>
        </div>
        <p class="espace0"></p>
        <div class="row">
            <div class="col">
                <h3>Creation d'un nouveau compte</h3>
            </div>
        </div>
        <p class="espace2"></p>
        <!-- Formulaire d'inscription a l'application -->
        <form action="/?controller=inscription&action=creation" method="POST">
            <!-- Si la creation s'est bien déroulée on affiche un message de validation -->
            <?php if($creation) { ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        Bienvenue sur CheckYourMood ! Votre compte a bien été enregistré.    
                        <br>                        
                        <a href="/?controller=index" class="alert-link">Vous pouvez vous connecter avec vos identifiants</a>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <?php } ?>
            <!-- Si l'identifiant est deja utilisé -->
            <?php if(!$creation && $identifiantDejaUtilise) { ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Erreur ! L'identifiant <?php echo ($nomUtilisateur);?> est deja utilisé.
                        <br>                        
                        <a href="/?controller=index"" class="alert-link">Cliquez ici si vous connecter</a>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <?php } ?>
            <!-- Si les 2 mots de passes ne correspondent pas -->
            <?php if($motDePasse1OK && !$motDePasse2OK) { ?>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <div class="alert alert-warning" role="alert">
                        Les 2 mots de passes ne correspondent pas.
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <?php } ?>
            <!-- Si l'email n'est pas valide -->
            <?php if($mail != null && !$mailOK) { ?>*
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <div class="alert alert-warning" role="alert">
                        Le format de l'adresse mail n'est pas valide. <br>
                        Une adresse mail doit avoir le format suivant : <b>xxxxx@xxxxxx.xx</b>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <?php } ?>
            <!-- Partie nom prénom -->
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5">
                    <label for="newNom"  class="form-label">Nom</label>
                    <input pattern="\w{2,80}" title="Le nom  ne doit pas depasser 80 caractere" name="newNom" value="<?php if ($nomOK) { echo $nom; } ?>" type="Text" placeholder="Saisissez votre nom" class="form-control <?php if ($nomOK) { echo 'is-valid'; } ?>" required>
                </div>
                <div class="col-5">
                    <label for="newPrenom" class="form-label">Prenom</label>
                    <input pattern="\w{2,80}" title="Le prenom ne doit pas depasser 80 caractere" name="newPrenom" value="<?php if ($prenomOK) { echo $prenom; } ?>" type="Text" placeholder="Saisissez votre prenom" class="form-control <?php if ($prenomOK) { echo 'is-valid'; } ?>" required>
                </div>
                <div class="col-1"></div>
            </div>
            <p class="espace0"></p>
            <!-- Partie nom d'utilisateur, et adresse mail -->
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5">
                    <label for="newNomUtilisateur" class="form-label">Nom d'utilisateur</label>
                    <input pattern="\w{2,80}" title="Le nom d'utilisateur ne doit pas depasser 80 caractere" name="newNomUtilisateur" value="<?php if ($nomUtilisateurOK) { echo $nomUtilisateur; } ?>" type="Text" placeholder="Saisissez votre nom d'utilisateur" class="form-control <?php if ($nomUtilisateurOK) { echo 'is-valid'; } ?>" required>
                </div>
                <div class="col-5">
                    <label for="newMail" class="form-label">Adresse Mail</label>
                    <input name="newMail" value="<?php if ($mailOK) { echo $mail; } ?>" type="Text" placeholder="Saisissez votre adresse mail" class="form-control <?php if ($mailOK) { echo 'is-valid'; } ?>" required>
                </div>
                <div class="col-1"></div>
            </div>
            <p class="espace0"></p>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5">
                    <label class="form-label">Mot de passe</label>
                    <input name="newMotDePasse1" value="<?php if ($motDePasse1OK) { echo $motDePasse1; } ?>" type="password" placeholder="Saisissez votre mot de passe" class="form-control <?php if ($motDePasse1OK) { echo 'is-valid'; } ?>" required>
                </div>
                <div class="col-5">
                    <label class="form-label">Confirmation de mot de passe</label>
                    <input name="newMotDePasse2" value="<?php if ($motDePasse2OK) { echo $motDePasse2; } ?>" type="password" placeholder="Confirmez votre mot de passe" class="form-control <?php if ($motDePasse2OK) { echo 'is-valid'; } ?>" required>
                </div>
                <div class="col-1"></div>
            </div>
            <p class="espace1"></p>
            <!-- Partie optionnelle genre, date de naissance -->
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <label class="form-label">Genre <i>(optionnel)</i></label>
                    <select class="form-select <?php if ($genreOK) { echo 'is-valid'; } ?>" name="newGenre">
                        <option value="">Veuillez renseigner un genre</option>
                        <option 
                                <?php if (isset($genre)) {
                                        if ($genre == 'Homme') {
                                            echo ('selected');
                                        }
                                    }
                                ?> value="Homme">Homme</option>
                        <option 
                                <?php if (isset($genre)) {
                                        if ($genre == 'Femme') {
                                            echo ('selected');
                                        }
                                    }
                                ?> value="Femme">Femme</option>
                        <option 
                                <?php if (isset($genre)) {
                                        if ($genre == 'Autre') {
                                            echo ('selected');
                                        }
                                    }
                                ?> value="Autre">Autre</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Date de naissance <i>(optionnel)</i></label>
                    <input name="newDateNaissance" value="<?php if ($dateNaissanceOK) { echo $dateNaissance; } ?>" type="date" class="form-control <?php if ($dateNaissanceOK) { echo 'is-valid'; } ?>">
                </div>
                <div class="col-1"></div>
            </div>
            <!-- variable caché (affichage) qui a une valeur égal a 0 au début et 1 après les première modifications de l'utilisateur -->
            <input name="affichage" type="hidden" value="1"></input>
            <p class="espace2"></p>
            <!-- Bouton s'inscrire -->
            <div class="row">
                <div class="col">
                    <input class="btn btn-primary btn-lg" type="submit" value="S'inscrire" >
                </div>
            </div>
            <p class="espace0"></p>
            <!-- Bouton pour aller se connecter -->
            <div class="row">
                <div class="col">
                    <a class="link-secondary" href="/?controller=index">J'ai déjà un compte</a>
                </div>
            </div>
            <p class="espace1"></p>
        </form>
    </div>
</body>
</html>