<?php

namespace model;

class ConnexionService
{




    /**
     * Chercher si l'identifiant existe dans la bd
     * @return true si trouver sinon false
     */
    public function identifiantExiste($pdo, $identifiant)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?");
            $stmt->execute([$identifiant]);
            $user = $stmt->fetch();
            if ($user == null) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }

    /**
     * Verifie que le MDP correspond a l'identifiant
     */
    public function motDePasseValide($pdo, $identifiant, $motDePasse)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ? AND MOT_DE_PASSE = ?");
            $stmt->execute([$identifiant, sha1($motDePasse)]);
            $user = $stmt->fetch();
            if ($user == null) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
               
    }

    /**
     * Donne les infos de l'utilisateur sélectionné
     * retourne vrai si les informations ont pu être données sinon faux
     */
    public function getUtilisateur($pdo, $identifiant)
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
     * Donne les infos de l'utilisateur sélectionné
     * retourne vrai si les informations ont pu être données sinon faux
     */
    public function getUtilisateurById($pdo, $id)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE ID_UTILISATEUR = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch();
            return $user;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }
}
