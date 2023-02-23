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
        <p class="espace2"></p>
        <!-- Affichage du message d'erreur -->
        <div class="row">
            <div class="col">
                <img src="../images/imgerreurbd.png" class="img-fluid" alt="Image de la base de donnée injoignable">
                <br>
                <h3>La base de donnée semble injoignable pour le moment</h3>
                <p>Nos équipes travaillent à résoudre le problème, essayez d'acceder a la <a href="/?controller=index">page de connexion</a> dans quelques minutes.</p>
            </div>
            
        </div>
    </div>
</body>
</html>