<?php

/**
 * connexioncontroller.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\connexionservice;
use model\afficher;

/**
 * Class connexioncontroller
 * Permet a un utilisateur de se connecter a l'application
 * et d'acceder a la page d'accueil.
 * @package controllers
 */
class connexionController implements controller
{
    /**
     * @param pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/index");
        $view->setVar('RACINE', config::getRacine());
        return $view;
    }

    /**
     * Connexion à la base de données utilisateur.
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function connexion($pdo)
    {
        $err = "";
        $connect = false;

        if (httphelper::getParam('identifiant') != null && httphelper::getParam('motDePasse') != null) {
            
            $identifiant = httphelper::getParam('identifiant');
            $motDePasse = httphelper::getParam('motDePasse');

            if (connexionservice::identifiantExiste($pdo, $identifiant)) {
                if (connexionservice::motDePasseValide($pdo, $identifiant, $motDePasse)) {
                    $connect = true;
                } else {
                    $err = 'identifiantmdp';
                }
            } else {
                $err = 'identifiantmdp';
            }

        } else {
            $err = 'vide';
        }

        if ($connect) {
            
            session_start();
            $user = connexionservice::getUtilisateur($pdo, $identifiant);

            $_SESSION['numeroSession']=session_id();
            $_SESSION['id']=$user['ID_UTILISATEUR'];	
            $_SESSION['nom']=$user['NOM'];	
            $_SESSION['prenom']=$user['PRENOM'];
            $_SESSION['nom_utilisateur']=$user['NOM_UTILISATEUR'];
            $_SESSION['mail']=$user['MAIL'];	
            $_SESSION['genre']=$user['GENRE'];	
            $_SESSION['date_naissance']=$user['DATE_DE_NAISSANCE'];	

            header("Location: /?controller=accueil");
            exit();
        }

        $_GET['err'] = $err;

        return $this->index($pdo);
    }

    /**
     * Deconnexion 'un utilisateur.
     * @return view appel de la méthode index
     */
    public function deconnexion($pdo) 
    {
        //Récuperation de la session en cour pour la supprimer
        session_start();

        // suppression de la session en cours et de toutes les variables associées
        session_destroy();

        header("Location: /?controller=index");
        exit();
    }
}
