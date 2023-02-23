<?php
require 'includes/header.php';

if (!isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) {
    header('Location: /?controller=index');
}
?>
<body>
    <?php
        require 'includes/navbar.php';
        if ($choixVisualisation == "") {
            $choixVisualisation = "graphique";
        }
    ?>
    <div class="container-fluid text-center">   
        <!-- Bouton pour choisir comment visualiser ses humeurs -->
        <p class="espace1"></p>
        <h3>Choisissez comment vous visualiser vos humeurs</h3><br>
        <p class="espace0"></p>
        <div class="row">
            <div class="col">
                <form action="/?controller=visualisationhumeurs&action=afficher" method="POST">
                    <input hidden name="choixVisualisation" value="graphique" type="text" id="graphique">
                    <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">
                    <input type="submit" value="En ligne" class="col-2 btn btn<?php if(isset($choixConsultation)) {if($choixConsultation != 'graphique') {echo('-outline');}}?>-secondary">
                </form>
            </div>
            <p class="espace0"></p>
            <div class="col">
                <form action="/?controller=visualisationhumeurs&action=afficher" method="POST">
                    <input hidden name="choixVisualisation" value="camembert" type="text" id="camembert">
                    <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">
                    <input type="submit" value="En camembert" class="col-2 btn btn<?php if(isset($choixConsultation)) {if($choixConsultation != 'camembert') {echo('-outline');}}?>-secondary">
                </form>
            </div>
            <p class="espace0"></p>
            <div class="col">
                <form action="/?controller=visualisationhumeurs&action=afficher" method="POST">
                    <input hidden name="choixVisualisation" value="baton" type="text" id="baton">
                    <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">
                    <input type="submit" value="En baton" class="col-2 btn btn<?php if(isset($choixConsultation)) {if($choixConsultation != 'baton') {echo('-outline');}}?>-secondary">
                </form>
            </div>
            <p class="espace0"></p>
        </div>
        <p class="espace0"></p>
        <!-- On affiche le diagramme en camembert-->
        <?php 
            if ($choixVisualisation == 'camembert') {   
        ?>    
        <div class="row centrer">
            <div class="col-3"></div>
            <div class="col">
                <canvas id="camembertChart"></canvas>
            </div>
            <div class="col-3"></div>
        </div>
        <script>
            new Chart(document.getElementById("camembertChart"), {
                type: 'pie',
                data: {
                labels: ["Admiration", "Adoration", "Appréciation esthétique", "Amusement", "Colère", "Anxiété", 
                "Émerveillement", "Malaise", "Ennui", "Calme", "Confusion", "Envie", "Dégoût", "Douleur empathique", 
                "étonné", "Excitation", "Peur", "Horreur", "Intérêt", "Joie", "Nostalgie", "Soulagement", 
                "Romance", "Tristesse", "Satisfaction", "Désir sexuel", "Surprise", ],
                datasets: [{
                    label: "Ajout",
                    backgroundColor: ["#d7a7ff", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a48ce4","#b6d7a8","#8cace4",
                    "#e48c8c","#f7df7c","#2f90a8","#e32b2b","#351431","#eee7cf","#4b5e20","#c9b9ad","#8700ff","#3e95cd","#f2cfb4","	#fc7a08","#000000","#98d400",
                    "#f50b86","#1d2564","#05f9e2","#e2f705","#ff6f00"],
                    data: <?php echo $humeursStat ?>
                }]
                },
                options: {
                title: {
                    display: true,
                    text: 'Moyenne de vos humeurs'
                }
                }
            });
        </script>
        <!-- On affiche le diagramme en baton-->
        <?php 
            } else if ($choixVisualisation == 'baton') {
        ?>
        <div class="row">
            <div class="col-3"></div>
            <div class="col">
                <canvas id="barChart"></canvas>
            </div>
            <div class="col-3"></div>
        </div>
        <script>
            new Chart(document.getElementById("barChart"), {
                type: 'bar',
                data: {
                labels: ["Admiration", "Adoration", "Appréciation esthétique", "Amusement", "Colère", "Anxiété", 
                "Émerveillement", "Malaise", "Ennui", "Calme", "Confusion", "Envie", "Dégoût", "Douleur empathique", 
                "étonné", "Excitation", "Peur", "Horreur", "Intérêt", "Joie", "Nostalgie", "Soulagement", 
                "Romance", "Tristesse", "Satisfaction", "Désir sexuel", "Surprise", ],
                datasets: [
                    {
                    label: "Ajout",
                    backgroundColor: ["#d7a7ff", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#a48ce4","#b6d7a8","#8cace4",
                    "#e48c8c","#f7df7c","#2f90a8","#e32b2b","#351431","#eee7cf","#4b5e20","#c9b9ad","#8700ff","#3e95cd","#f2cfb4","	#fc7a08","#000000","#98d400",
                    "#f50b86","#1d2564","#05f9e2","#e2f705","#ff6f00"],
                    data: <?php echo $humeursStat ?>
                    }
                ]
                },
                options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Visualisation des humeurs'
                }
                }
            });
        </script>
        <!-- On affiche le diagramme en ligne-->
        <?php
            } else if ($choixVisualisation == 'graphique') {
                if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                    $dateDebut = $_POST['dateDebut'];
                    $dateFin = $_POST['dateFin'];
                }
        ?>
            <!-- formulaire pour saisir les dates de début et les dates de fins du graphique en lignes -->
            <form action="/?controller=visualisationhumeurs&action=getDatas" method="POST"> 
                <div class="row">
                    <div class="col"></div>
                    <div class="gauche col-2">
                        <label for="dateDebut">Entrez la date de début</label>
                        <input type="date" name="dateDebut" id="dateDebut" class="form-control" value="
                        <?php 
                            if (isset($_POST['dateDebut'])) {
                                echo $_POST['dateDebut'];
                            }
                        ?>">
                    </div>
                    <div class="gauche col-2">
                        <label for="dateFin">Entrez la date de fin</label>
                        <input type="date" name="dateFin" id="dateFin" class="form-control" value="
                        <?php 
                            if (isset($_POST['dateFin'])) {
                                echo $_POST['dateFin'];
                            }
                        ?>">   
                    </div>
                    <div class="col"></div>
                    <p class="espace0"></p>
                    <div class="col"></div>
                    <div class="col">
                        <!-- Id de l'utilisateur pour recuperer seulement ses humeurs -->
                        <input hidden name="codeUtilisateur" value="<?php echo($_SESSION['id'])?>">
                        <input type="submit" value="Valider" class="btn btn-success">
                    </div>
                    <div class="col"></div>
                </div>
            </form>
            <!-- On affiche le diagramme en ligne-->
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="col-9"></div>
            </div>
            <script>
                new Chart(document.getElementById("lineChart"), {
                    type: 'line',
                    data: {
                        labels: <?php echo $tableauDates; ?>,
                        datasets: [{ 
                            data: <?php echo $tableau1; ?>,
                            label: "Admiration",
                            borderColor: "#d7a7ff",
                            fill: false
                        }, {
                            data: <?php echo $tableau2; ?>,
                            label: "Adoration",
                            borderColor: "#8e5ea2",
                            fill: false
                        }, { 
                            data: <?php echo $tableau3; ?>,
                            label: "Apréciation esthétique",
                            borderColor: "#3cba9f",
                            fill: false
                        }, { 
                            data: <?php echo $tableau4; ?>,
                            label: "Amusement",
                            borderColor: "#e8c3b9",
                            fill: false
                        }, { 
                            data: <?php echo $tableau5; ?>,
                            label: "Colère",
                            borderColor: "#c45850",
                            fill: false
                        }, { 
                            data: <?php echo $tableau6; ?>,
                            label: "Anxiété",
                            borderColor: "#a48ce4",
                            fill: false
                        }, { 
                            data: <?php echo $tableau7; ?>,
                            label: "Émerveillement",
                            borderColor: "#b6d7a8",
                            fill: false
                        }, { 
                            data: <?php echo $tableau8; ?>,
                            label: "Malaise",
                            borderColor: "#8cace4",
                            fill: false
                        }, { 
                            data: <?php echo $tableau9; ?>,
                            label: "Ennui",
                            borderColor: "#e48c8c",
                            fill: false
                        }, { 
                            data: <?php echo $tableau10; ?>,
                            label: "Calme (sérénité)",
                            borderColor: "#f7df7c",
                            fill: false
                        }, { 
                            data: <?php echo $tableau11; ?>,
                            label: "Confusion",
                            borderColor: "#2f90a8",
                            fill: false
                        }, { 
                            data: <?php echo $tableau12; ?>,
                            label: "Envie",
                            borderColor: "#e32b2b",
                            fill: false
                        }, { 
                            data: <?php echo $tableau13; ?>,
                            label: "Dégoût",
                            borderColor: "#351431",
                            fill: false
                        }, { 
                            data: <?php echo $tableau14; ?>,
                            label: "Douleur empathique",
                            borderColor: "#eee7cf",
                            fill: false
                        }, { 
                            data: <?php echo $tableau15; ?>,
                            label: "Intérêt étonné, intrigué",
                            borderColor: "#4b5e20",
                            fill: false
                        }, { 
                            data: <?php echo $tableau16; ?>,
                            label: "Excitation (montée d'adrénaline)",
                            borderColor: "#c9b9ad",
                            fill: false
                        }, { 
                            data: <?php echo $tableau17; ?>,
                            label: "Peur",
                            borderColor: "#8700ff",
                            fill: false
                        }, { 
                            data: <?php echo $tableau18; ?>,
                            label: "Horreur",
                            borderColor: "#3e95cd",
                            fill: false
                        }, { 
                            data: <?php echo $tableau19; ?>,
                            label: "Intérêt",
                            borderColor: "#f2cfb4",
                            fill: false
                        }, { 
                            data: <?php echo $tableau20; ?>,
                            label: "Joie",
                            borderColor: "#fc7a08",
                            fill: false
                        }, { 
                            data: <?php echo $tableau21; ?>,
                            label: "Nostalgie",
                            borderColor: "#000000",
                            fill: false
                        }, { 
                            data: <?php echo $tableau22; ?>,
                            label: "Soulagement",
                            borderColor: "#98d400",
                            fill: false
                        }, { 
                            data: <?php echo $tableau23; ?>,
                            label: "Romance",
                            borderColor: "#f50b86",
                            fill: false
                        }, { 
                            data: <?php echo $tableau24; ?>,
                            label: "Tristesse",
                            borderColor: "#1d2564",
                            fill: false
                        }, { 
                            data: <?php echo $tableau25; ?>,
                            label: "Satisfaction",
                            borderColor: "#05f9e2",
                            fill: false
                        }, { 
                            data: <?php echo $tableau26; ?>,
                            label: "Désir sexuel",
                            borderColor: "#e2f705",
                            fill: false
                        }, { 
                            data: <?php echo $tableau27; ?>,
                            label: "Surprise",
                            borderColor: "#ff6f00",
                            fill: false
                        }
                        ]
                    },
                    options: {
                        title: {
                        display: true
                        }
                    }
                    });
            </script>
        <?php
            }
        ?>
    </div>
</body>
</html>
