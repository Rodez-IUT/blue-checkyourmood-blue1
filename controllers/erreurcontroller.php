<?php

/**
 * erreurcontroller.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;
use yasmf\httphelper;

/**
 * Permet d'indiquer une erreur dans les controlleurs.
 * @package controllers
 */
class erreurController implements controller
{
    /**
     * @param pdo connexion à la base de données.
     * @return view vue retournée au routeur.
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/pageerreur");

        $err = httphelper::getParam('err');
        $view->setVar('err', $err);
        
        return $view;
    }
}
