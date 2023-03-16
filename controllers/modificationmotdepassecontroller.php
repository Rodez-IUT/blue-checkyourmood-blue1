<?php

/**
 * connexioncontroller.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use model\utilisateurservice;
use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\connexionservice;
use model\afficher;

/**
 * Class modificationMotDePasseController
 * Permet a un utilisateur de modifier son mot de passe
 * @package controllers
 */
class modificationMotDePasseController implements controller
{
    /**
     * @param pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_modificationmotdepasse");
        $view->setVar('RACINE', config::getRacine());
        return $view;
    }

    /**
     * Modification du mot de passe
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function modifierMotDePasse($pdo)
    {

        if (httphelper::getParam('motDePasseActuel') != null && httphelper::getParam('nouveauMotDePasse') != null) {
            error_reporting(0);
            session_start();
            $identifiant = $_SESSION['nom_utilisateur'];
            $motDePasseActuel = httphelper::getParam(htmlspecialchars('motDePasseActuel'));
            $nouveauMotDePasse = httphelper::getParam(htmlspecialchars('nouveauMotDePasse'));
            $confirmerMdp = httphelper::getParam(htmlspecialchars('confirmerMdp'));
            $codeUtilisateur = httphelper::getParam('idUtilisateur');

            if (connexionservice::motDePasseValide($pdo, $identifiant, $motDePasseActuel)) {
                if ($nouveauMotDePasse == $confirmerMdp) {
                    utilisateurservice::modifierMotDePasse($pdo, $nouveauMotDePasse, $codeUtilisateur);
                    $err = 'nope';
                } else {
                    $err = 'confirmer';
                }
            } else {
                $err = 'mdp';
            }
        } else {
            $err = 'vide';
        }

        $_GET['err'] = $err;

        return $this->index($pdo);
        
    }
}
