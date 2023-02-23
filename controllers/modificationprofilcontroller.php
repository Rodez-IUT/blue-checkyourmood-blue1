<?php

/**
 * ModificationProfil.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use model\connexionservice;
use model\verificationservice;
use yasmf\view;
use yasmf\controller;
use yasmf\config;
use yasmf\httphelper;
use model\humeurservice;
use model\utilisateurservice;

/**
 * Class ModificationProfil
 * Permet a un utilisateur de modifier ses informations
 * @package controllers
 */
class ModificationProfilController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_modifierprofil");
        $view->setVar('RACINE', config::getRacine());
        $view->setVar('modification', httphelper::getParam('modification'));

        $view->setVar('nom', httphelper::getParam('newNom'));
        $view->setVar('prenom', httphelper::getParam('newPrenom'));
        $view->setVar('mail', httphelper::getParam('newMail'));
        $view->setVar('nomUtilisateur', httphelper::getParam('newNomUtilisateur'));
        $view->setVar('genre', httphelper::getParam('newGenre'));
        $view->setVar('dateNaissance', httphelper::getParam('newDateNaissance'));
        $view->setVar('motDePasse1', httphelper::getParam('newMotDePasse1'));
        $view->setVar('motDePasse2', httphelper::getParam('newMotDePasse2'));

        $view->setVar('nomOK', httphelper::getParam('nomOK'));
        $view->setVar('prenomOK', httphelper::getParam('prenomOK'));
        $view->setVar('mailOK', httphelper::getParam('mailOK'));
        $view->setVar('nomUtilisateurOK', httphelper::getParam('nomUtilisateurOK'));
        $view->setVar('genreOK', httphelper::getParam('genreOK'));
        $view->setVar('dateNaissanceOK', httphelper::getParam('dateNaissanceOK'));
        $view->setVar('creation', httphelper::getParam('creation'));
        $view->setVar('identifiantDejaUtilise', httphelper::getParam('identifiantDejaUtilise'));
        $view->setVar('motDePasse1OK', httphelper::getParam('motDePasse1OK'));
        $view->setVar('motDePasse2OK', httphelper::getParam('motDePasse2OK'));

        return $view;
    }

    /**
     * Modifie le profil de l'utilisateur
     */
    public function modifierProfil($pdo)
    {
        $nom = httphelper::getParam('newNom');
        $prenom = httphelper::getParam('newPrenom');
        $mail = httphelper::getParam('newMail');
        $nomUtilisateur = httphelper::getParam('newNomUtilisateur');
        $genre = httphelper::getParam('newGenre');
        $dateNaissance = httphelper::getParam('newDateNaissance');
        $codeUtilisateur = httphelper::getParam('idUtilisateur');

        // Test des variables
        $_POST['nomOK'] = $nomOK = verificationservice::testNom($nom);
        $_POST['prenomOK'] = $prenomOK = verificationservice::testPrenom($prenom);
        $_POST['mailOK'] = $mailOK = verificationservice::testMail($mail);
        $_POST['nomUtilisateurOK'] = $nomUtilisateurOK = verificationservice::testNomUtilisateur($nomUtilisateur);
        $_POST['genreOK'] = $genreOK = verificationservice::testGenre($genre);
        
        // Si toutes les variables sont valides alors on ajoute à la base de donnée
        if ($nomOK && $prenomOK && $mailOK && $nomUtilisateurOK && $genreOK) {
            if ($dateNaissance == "") {
                utilisateurservice::modifierProfil($pdo, $nom, $prenom, $nomUtilisateur, $mail, $genre, null, $codeUtilisateur);
            } else {
                utilisateurservice::modifierProfil($pdo, $nom, $prenom, $nomUtilisateur, $mail, $genre, $dateNaissance, $codeUtilisateur);
            }
            
        }

        error_reporting(0);
        session_start();
        $user = connexionservice::getUtilisateurById($pdo, $codeUtilisateur);
        $_SESSION['nom']=$user['NOM'];	
        $_SESSION['prenom']=$user['PRENOM'];
        $_SESSION['nom_utilisateur']=$user['NOM_UTILISATEUR'];
        $_SESSION['mail']=$user['MAIL'];	
        $_SESSION['genre']=$user['GENRE'];	
        $_SESSION['date_naissance']=$user['DATE_DE_NAISSANCE'];

        return $this->index($pdo);
    }

    /**
     * Modifie le mot de passe de l'utilisateur
     */
    public function modifierMotDePasse($pdo)
    {

        $motDePasse1 = httphelper::getParam('newMotDePasse1');
        $motDePasse2 = httphelper::getParam('newMotDePasse2');

        $_POST['motDePasse1OK'] = $motDePasse1OK = verificationservice::testMotDePasse($motDePasse1);
        $_POST['motDePasse2OK'] = $motDePasse2OK = verificationservice::testMdpCorrespond($motDePasse1, $motDePasse2);
        

        return $this->index($pdo);
    }
}
