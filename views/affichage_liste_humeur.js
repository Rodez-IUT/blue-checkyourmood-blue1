/**
 * affichage_liste_humeur
 * Affiche la liste des humeurs possibles associées à une couleur. Elles servent à la 
 * légende des graphique situés sur la même page.
 */

function affichageLegendeGraphiqueVisualisationHumeurs() {
    new Chart(document.getElementById("lineChart"), {
        type: 'line',
        data: {
            labels: php echo $tableauDates; ,
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
}