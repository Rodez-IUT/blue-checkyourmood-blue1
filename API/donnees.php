<?php
	// Fonction pour obtenir une connexion à la base de données
	function getPDO(){
		// Paramètres de connexion
		$host='localhost';	// Serveur de BD
		$db='checkyourmood';	// Nom de la BD
		$user='root';		// Utilisateur
		$pass='root';		// Mot de passe
		$charset='utf8mb4';	// charset utilisé

		// Constitution variable DSN
		$dsn="mysql:host=$host;dbname=$db;charset=$charset";

		// Réglage des options
		$options=[																				 
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES=>false];

		// Tentative de connexion à la base de données
		try{
			$pdo=new PDO($dsn,$user,$pass,$options);
			return $pdo ;			
		} catch(PDOException $e){
			// Gestion des erreurs de connexion
			$infos['Statut']="KO";
			$infos['message']="Problème connexion base de données";
			sendJSON($infos, 500) ;
			die();
		}
	}

	// Fonction pour récupérer les humeurs d'un utilisateur
	function getHumeurs($userId) {
		$pdo = getPDO();
		$sql = "SELECT * FROM humeur WHERE CODE_UTILISATEUR = :user_id ORDER BY DATE_HEURE DESC LIMIT 5";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam('user_id', $userId);
		$stmt->execute();

		// Vérification si des humeurs sont trouvées
		if ($stmt->rowCount() > 0) {
			$humeurs = array();
			while ($row = $stmt->fetch()) {
				array_push($humeurs, $row);
			}
			sendJSON($humeurs, 200);
		} else {
			$infos['Statut'] = "KO";
			$infos['message'] = "Aucune humeur trouvée pour cet utilisateur.";
			sendJSON($infos, 404);
		}
	}

	// Fonction pour récupérer toutes les émotions
	function getEmotions() {
		$pdo = getPDO();

		$sql = "SELECT * FROM emotion";
		$result = $pdo->query($sql);

		// Vérification si des émotions sont trouvées
		if ($result->rowCount() > 0) {
			$emotions = array();
			while ($row = $result->fetch()) {
				array_push($emotions, $row);
			}
			sendJSON($emotions, 200);
		} else {
			$infos['Statut'] = "KO";
			$infos['message'] = "Aucune émotion trouvée.";
			sendJSON($infos, 404);
		}
	}

	// Fonction pour vérifier les identifiants de connexion d'un utilisateur
	function getLogin($nom, $pass) {
		$pdo = getPDO();

		// Encoder le mot de passe en MD5
		$hashedPass = md5($pass);

		// Préparer la requête SQL pour vérifier si l'utilisateur existe
		$sql = "SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = :nom AND MOT_DE_PASSE = :pass";
		$stmt = $pdo->prepare($sql);

		// Exécuter la requête avec les paramètres
		$stmt->execute([':nom' => $nom, ':pass' => $hashedPass]);

		// Vérification si l'utilisateur existe
		if ($stmt->rowCount() > 0) {
			$user = $stmt->fetch();
			$infos['ID_UTILISATEUR'] = $user['ID_UTILISATEUR'];
			sendJSON($infos, 200);
		} else {
			$infos['Statut'] = "KO";
			$infos['message'] = "Nom d'utilisateur ou mot de passe incorrect.";
			sendJSON($infos, 404);
		}
	}

	// Fonction pour ajouter une nouvelle humeur
	function addMood($donnees) {
		// Vérifier si l'ID utilisateur et le code émotion sont présents et non vides
		if (!isset($donnees['ID']) || $donnees['ID'] === "" ||
			!isset($donnees['EMOTION']) || $donnees['EMOTION'] === "") {

			$infos['Statut'] = "KO";
			$infos['message'] = "Erreur : Veuillez fournir une description, un ID utilisateur et un code émotion.";
			sendJSON($infos, 400);
			return;
		}
		$pdo = getPDO();

		// Préparer la requête SQL pour insérer une nouvelle humeur
		$sql = "INSERT INTO humeur (DESCRIPTION, DATE_HEURE, CODE_UTILISATEUR, CODE_EMOTION) VALUES (:description, NOW(), :userId, :emotionCode)";
		$stmt = $pdo->prepare($sql);

		// Exécuter la requête avec les paramètres
		$stmt->execute([':description' => $donnees['DESCRIPTION'], ':userId' => $donnees['ID'], ':emotionCode' => $donnees['EMOTION']]);

		// Vérification si l'insertion a réussi
		if ($stmt->rowCount() > 0) {
			$infos['Statut'] = "OK";
			$infos['message'] = "Humeur ajoutée avec succès.";
			sendJSON($infos, 200);
		} else {
			$infos['Statut'] = "KO";
			$infos['message'] = "Erreur lors de l'ajout de l'humeur.";
			sendJSON($infos, 500);
		}
	}
?>
		