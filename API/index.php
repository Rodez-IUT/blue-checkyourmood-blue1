<?php

	// Inclusion des fichiers json.php et donnees.php
	require_once("json.php");
	require_once("donnees.php");

	// Récupération de la méthode de la requête HTTP (GET, POST, DELETE, PUT)
	$request_method = $_SERVER["REQUEST_METHOD"];

	// Traitement en fonction de la méthode de la requête
	switch ($_SERVER["REQUEST_METHOD"]) {
		case "GET":
			// Si la requête est de type GET
			if (!empty($_GET['demande'])) {
				// Si un paramètre 'demande' est passé dans l'URL
				$url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));

				// Traitement en fonction du premier élément de l'URL
				switch ($url[0]) {
					case 'emotions':
						// Récupérer les émotions
						getEmotions();
						break;
					case 'humeurs':
						// Récupérer les humeurs
						getHumeurs($url[1]);
						break;
					case 'login':
						// Récupérer les informations de connexion
						getLogin($url[1], $url[2]);
						break;
				}
			}
			break;
		case "POST":
			// Si la requête est de type POST
			if (!empty($_GET['demande'])) {
				// Si un paramètre 'demande' est passé dans l'URL
				$url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));

				// Traitement en fonction du premier élément de l'URL
				switch ($url[0]) {
					case 'addMood':
						// Ajout d'une humeur
						$donnees = json_decode(file_get_contents("php://input"), true);
						addMood($donnees);
						break;
				}
			}
			break;
		default:
			// Si la méthode de la requête n'est ni GET ni POST
			$infos['Statut'] = "KO";
			$infos['message'] = "URL non valide";
			sendJSON($infos, 404);
	}
?>
