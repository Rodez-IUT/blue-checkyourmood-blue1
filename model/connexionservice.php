<?php

namespace model;

class connexionservice
{

    /**
     * Chercher si l'identifiant existe dans la bd.
     * @param pdo connexion à la base de données.
     * @param identifiant le nom d'utilisateur entrée par un utilisateur voulant se connecter.
     * @return existeOk est true si le nom existe dans la base de données, sinon false
     */
    public static function identifiantExiste($pdo, $identifiant)
    {
        try {
            $existeOk = true;
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?");
            $stmt->execute([$identifiant]);
            $user = $stmt->fetch();
            if ($user == null) {
                $existeOk = false;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
        return $existeOk;
    }

    /**
     * Verifie que le mot de passe correspond à l'identifiant.
     * @param pdo connexion à la base de onnées.
     * @param identifiant le nom d'utilisateur.
     * @param motDePasse le mot de passe de l'utilisateur.
     * @return motDePasseCorrespondantOk est true si le mot de passe correspond, false sinon.
     */
    public static function motDePasseValide($pdo, $identifiant, $motDePasse)
    {
        try {$motDePasseCorrespondantOk = true;
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ? AND MOT_DE_PASSE = ?");
            $stmt->execute([$identifiant, sha1($motDePasse)]);
            $user = $stmt->fetch();
            if ($user == null) {
                $motDePasseCorrespondantOk = false;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
        return $motDePasseCorrespondantOk;
    }

    /**
     * Donne les infos de l'utilisateur sélectionné.
     * @param pdo connexion à la base de données.
     * @param identifiant le nom d'utilisateur.
     * @return user est true si les informations ont pu être données sinon false.
     */
    public static function getUtilisateur($pdo, $identifiant)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?");
            $stmt->execute([$identifiant]);
            $user = $stmt->fetch();
            return $user;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }

    /**
     * Donne les infos de l'utilisateur sélectionné.
     * @param pdo connexion à la basse de données.
     * @param identifiant le nom d'utilisateur.
     * @return user est true si les informations ont pu être données sinon false.
     */
    public static function getUtilisateurById($pdo, $identifiant)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE ID_UTILISATEUR = ?");
            $stmt->execute([$identifiant]);
            $user = $stmt->fetch();
            return $user;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }
}
