<?php

/**
 * accueilController.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;

/**
 * Page d'accueil permet d'appeler la vue pour la page d'accueil de l'application
 * @package controllers
 */
class accueilController implements controller
{
    /**
     * @param pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_accueil");
        $view->setVar('RACINE', config::getRacine());

        return $view;
    }
}
