<?php


namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\config;
use yasmf\httphelper;

/**
 * Class ErreurController
 * Permet d'indiquer une erreur
 * @package controllers
 */
class ErreurController implements controller
{
    /**
     * @param pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/pageerreur");

        $err = httphelper::getParam('err');
        $view->setVar('err', $err);
        
        return $view;
    }
}
