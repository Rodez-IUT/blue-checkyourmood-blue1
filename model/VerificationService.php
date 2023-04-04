<?php

namespace model;

class VerificationService
{

    /**
     * Permet de verifier la valeur du nom d'un utilisateur
     * @return true si trouver sinon false
     */
    public  function verificationNom($nom) {
        if ($nom != null || $nom != "") {
            if (strlen($nom) < 80) {
                //$_GET['msgRetour'] = "test d'un msg retour";
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Permet de verifier la valeur du prenom d'un utilisateur
     * @return true si trouver sinon false
     */
    public function verificationPrenom($prenom) {
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
    public  function verificationMail($mail) {
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
    public function verificationNomUtilisateur($nomUtilisateur) {
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
    public  function verificationGenre($genre) {
        if ($genre == "female" && $genre == "male") {
                return true;
        } else {
            return false;
        }
    }

    /**
     * Permet de verifier la valeur d'une date de naissance est correcte
     * @return true si trouver sinon false
     */
    public function verificationDateNaissance($dateNaissance) {
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
    public function verificationMotDePasse($mdp) {

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
    public function verificationMdpCorrespond($mdp1, $mdp2)
    {
        if ($mdp1 != null && $mdp2 != null && $mdp1 != "" && $mdp1 != "") {
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
