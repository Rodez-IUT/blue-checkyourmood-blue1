<?php

namespace model;

class VerificationService
{

    /**
     * Permet de verifier la valeur du nom d'un utilisateur
     * @return true si trouver sinon false
     */
    public function testNom($nom) {
        if ($nom != null || $nom != "") {
            if (strlen($nom) < 80) {
                //$_GET['msgRetour'] = "test d'un msg retour";
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    /**
     * Permet de verifier la valeur du prenom d'un utilisateur
     * @return true si trouver sinon false
     */
    public function testPrenom($prenom) {
        if ($prenom != null || $prenom != "") {
            if (strlen($prenom) < 80) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Permet de verifier la valeur d'une adresse mail
     * @return true si trouver sinon false
     */
    public function testMail($mail) {
        if ($mail != null || $mail != "") {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Permet de verifier la valeur d'une adresse mail
     * @return true si trouver sinon false
     */
    public function testNomUtilisateur($nomUtilisateur) {
        if ($nomUtilisateur != null || $nomUtilisateur != "") {
            if (strlen($nomUtilisateur) < 80) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * Permet de verifier la valeur d'un genre est correcte
     * @return true si trouver sinon false
     */
    public  function testGenre($genre) {
        if ($genre != null || $genre != "") {
            if (strlen($genre) < 80) {
                return true;
            }
        } else {
            return false;
        }
        return false;
    }

    /**
     * Permet de verifier la valeur d'une date de naissance est correcte
     * @return true si trouver sinon false
     */
    public function testDateNaissance($dateNaissance) {
        if ($dateNaissance != null || $dateNaissance != "") {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Permet de verifier la valeur d'un genre est correcte
     * @return true si trouver sinon false
     */
    public function testMotDePasse($mdp) {

        if ($mdp != null || $mdp != "") {
            return true;
        } else {
            return false;
        }
    }

    /** 
     * Test le mot de passe avec une regex et avec le champ vérification de mdp
     * @param mdp1 mot de passe renseignée par l'utilisateur
     * @param mdp2 deuxième saisie du mot de passe renseignée par l'utilisateur
     */
    public function testMdpCorrespond($mdp1, $mdp2)
    {
        if ($mdp1 != null && $mdp2 != null) {
            if ($mdp1 == $mdp2) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
            
    }
}
