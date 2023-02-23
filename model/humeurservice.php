<?php

namespace model;

class humeurservice
{

    /* Recupération des humeurs selon un utilisateur et selon l'émotion voulue et selon une date */
    public static function getHumeursUtilisateurFiltres($pdo, $codeUtilisateur, $codeEmotion, $dateHeure)
    {
        try{
            $sql = "SELECT *
                    FROM `humeur`
                    JOIN `emotion` ON humeur.CODE_EMOTION = emotion.ID_EMOTION
                    WHERE humeur.CODE_UTILISATEUR = ? AND humeur.CODE_EMOTION = ? AND humeur.DATE_HEURE LIKE ? 
                    ORDER BY `DATE_HEURE` DESC
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codeUtilisateur, $codeEmotion, $dateHeure."%"]);

            $tabHumeurs = array();
            while ($row = $stmt->fetch()) {
                $tabHumeurs[] = array(
                    'DATE_HEURE' => $row['DATE_HEURE'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM'], 'DESCRIPTION' => $row['DESCRIPTION'],
                    'CODE_EMOTION' => $row['CODE_EMOTION'], 'ID_HUMEUR' => $row['ID_HUMEUR']
                );
            }
            return $tabHumeurs;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }

    /* Recupération des humeurs selon un utilisateur et selon une date */
    public static function getHumeursUtilisateurDate($pdo, $codeUtilisateur, $dateHeure)
    {
        try {
            $sql = "SELECT *
                    FROM `humeur`
                    JOIN `emotion` ON humeur.CODE_EMOTION = emotion.ID_EMOTION
                    WHERE humeur.CODE_UTILISATEUR = ? AND humeur.DATE_HEURE LIKE ? 
                    ORDER BY `DATE_HEURE` DESC
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codeUtilisateur, $dateHeure."%"]);

            $tabHumeurs = array();
            while ($row = $stmt->fetch()) {
                $tabHumeurs[] = array(
                    'DATE_HEURE' => $row['DATE_HEURE'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM'], 'DESCRIPTION' => $row['DESCRIPTION'], 'CODE_EMOTION' => $row['CODE_EMOTION'], 'ID_HUMEUR' => $row['ID_HUMEUR']
                );
            }
            return $tabHumeurs;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }

    /* Recupération des humeurs selon un utilisateur et selon l'émotion voulue */
    public static function getHumeursUtilisateurEmotion($pdo, $codeUtilisateur, $codeEmotion)
    {
        try {
            $sql = "SELECT *
                    FROM `humeur`
                    JOIN `emotion` ON humeur.CODE_EMOTION = emotion.ID_EMOTION
                    WHERE humeur.CODE_UTILISATEUR = ? AND humeur.CODE_EMOTION = ? 
                    ORDER BY `DATE_HEURE` DESC
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codeUtilisateur, $codeEmotion]);

            $tabHumeurs = array();
            while ($row = $stmt->fetch()) {
                $tabHumeurs[] = array(
                    'DATE_HEURE' => $row['DATE_HEURE'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM'], 'DESCRIPTION' => $row['DESCRIPTION'], 'CODE_EMOTION' => $row['CODE_EMOTION'], 'ID_HUMEUR' => $row['ID_HUMEUR']
                );
            }
            return $tabHumeurs;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }

    /* Recupération des humeurs selon un utilisateur */
    public static function getHumeursUtilisateur($pdo, $codeUtilisateur)
    {
        try {
            $sql = "SELECT *
                    FROM `humeur`
                    JOIN `emotion` ON humeur.CODE_EMOTION = emotion.ID_EMOTION
                    WHERE humeur.CODE_UTILISATEUR = ? 
                    ORDER BY `DATE_HEURE` DESC
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codeUtilisateur]);

            $tabHumeurs = array();
            while ($row = $stmt->fetch()) {
                $tabHumeurs[] = array(
                    'DATE_HEURE' => $row['DATE_HEURE'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM'], 'DESCRIPTION' => $row['DESCRIPTION'], 'CODE_EMOTION' => $row['CODE_EMOTION'], 'ID_HUMEUR' => $row['ID_HUMEUR']
                );
            }
            return $tabHumeurs;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }

    /* Ajout d'une humeur */
    public static function ajoutHumeur($pdo, $description, $dateHeure, $codeUtilisateur, $codeEmotion)
    {

        $sql = "INSERT INTO `humeur` (`DESCRIPTION`, `DATE_HEURE`, `CODE_UTILISATEUR`, `CODE_EMOTION`) 
                VALUES (?, ?, ?, ?)";

        $pdo->beginTransaction();  

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$description, $dateHeure, $codeUtilisateur, $codeEmotion]);
            $_GET['humeursaisie'] = true;
            $pdo->commit();

        } catch (\PDOException $e) {
            $code = $e -> getCode();
            if ($code == 78945) {
                $_GET['dateHeureOK'] = false;
            } else if ($code == 22001) {
                $_GET['descriptionOK'] = false;
            } else {
                $e->getMessage();
                $_GET['exception'] = $e;
            }
            $pdo->rollBack();
        } catch (\Exception $e) {
            $_GET['exception'] = $e->getMessage();
        }

    }

    /* Suppression d'une humeur */
    public static function suppHumeursUtilisateur($pdo, $codeUtilisateur, $idHumeur)
    {
        $pdo->beginTransaction(); 

        try {

            $stmt = $pdo->prepare("DELETE FROM humeur WHERE CODE_UTILISATEUR = ? AND ID_HUMEUR = ?");

            $stmt->execute([$codeUtilisateur, $idHumeur]);
            $pdo->commit(); 

            $_GET['humeurSupp'] = true;
        } catch (\Exception $e) {
            $pdo->rollBack();
            $e -> getMessage();
            $_GET['humeurSupp'] = false;
        }
    }

    /* Suppression d'une humeur */
    public static function suppToutesHumeursUtilisateur($pdo, $codeUtilisateur)
    {
        $pdo->beginTransaction(); 
        
        try {

            $stmt = $pdo->prepare("DELETE FROM humeur WHERE CODE_UTILISATEUR = ?");

            $stmt->execute([$codeUtilisateur]);
            $pdo->commit();
        } catch (\Exception $e) {
            $pdo->rollBack();
            $e -> getMessage();
        }
    }
}
