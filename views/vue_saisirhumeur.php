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
        <p class="espace1"></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <h3>Que ressentez vous ?</h3>
            </div>
            <div class="col-1"></div>
        </div>
        <p class="espace2"></p>

        <!-- Si la creation s'est bien déroulée on affiche un message de validation -->
        <?php if(isset($humeursaisie) && $humeursaisie) { ?>
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        Votre humeur a bien été enregistrée.
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        <?php } ?>

        <!-- Description incorrete on affiche un message pour preciser le format attendu -->
        <?php if(isset($descriptionOK) && !$descriptionOK) { ?>
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Description invalide, la déscription d'une humeur ne doit pas dépasser 3000 caractères.
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        <?php } ?>

        <!-- Heure incorrete on affiche un message pour preciser le format attendu -->
        <?php if(isset($dateHeureOK) && !$dateHeureOK) { ?>
            <p class="espace1"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Heure incorrecte, vous ne pouvez renseigner au maximum une période de 2 heures auparavant.
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        <?php } ?>
        <p class="espace1"></p>

        <!-- Formulaire pour reseigner une humeur -->
        <form action="/?controller=mexprimer&action=exprimer" method="POST">
            <div class="row">
                <div class="col-2"></div>
                <!-- Liste déroulante pour choisir les émotions -->
                <div class="col-5">
                    <label>Votre émotion</label>
                    <select name="newCodeEmotion" class="form-select" required>
                        <option value="">Saisir une émotion</option>
                        <?php 
                        foreach ($tabEmotions as $emotion){
                        ?>
                        <option <?php if (isset($codeEmotion)) {if ($codeEmotion == $emotion['ID_EMOTION']) {echo ('selected');}}?> 
                                value="<?php echo $emotion['ID_EMOTION']?>"><?php echo($emotion['EMOJI'].' - '.$emotion['NOM']) ?>
                        </option>
                        <?php
                        }  
                        ?>
                    </select>
                </div>

                <!-- Partie pour saisir l'heure -->
                <div class="col-3">
                    <label>Moment (depuis les 2 dernières heures)</label><br>
                    <input class="form-control" name="newDateHeure" type="datetime-local" required value="<?php echo date('Y-m-d\TH:i'); ?>">
                </div>
                <div class="col-2"></div>
            </div>
            <p class="espace1"></p>

            <!-- Partie pour saisir une description -->
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <label>Description (3000 caractères)</label>
                    <div class="form-floating">
                        <textarea name="newDescription" class="form-control" placeholder="Description"><?php  if (isset($description)) {echo($description);}?></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <p class="espace1"></p>
            
            <!-- Input caché pour le code utilisateur -->
            <input type="text" name="newCodeUtilisateur" value="<?php echo ($_SESSION['id']);?>" hidden>
            <div class="row">
                <div class="col-1"></div>
                <!-- Bouton pour valider la saisie -->
                <div class="col">
                    <input type="submit" value="Envoyer" class="btn btn-primary">
                </div>
                <div class="col-1"></div>
            </div>
        </form>
        <p class="espace4"></p>
    </div>
</body>
</html>
