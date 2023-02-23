<?php

/**
 * indexController.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;

/**
 * Class indexController
 * Permet d'acceder a la page de connexion de l'application
 * @package controllers
 */
class indexController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/index");
        $view->setVar('RACINE', config::getRacine());

        return $view;
    }

}
