<?php

/**
 * mexprimercontroller.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\emotionsservice;
use model\humeurservice;

/**
 * Class mexprimerController
 * Permet a un utilisateur de saisir une humeur
 * @package controllers
 */
class mexprimerController implements controller
{
    /**
     * @param $pdo connexion à la base de données
     * @param $err message d'erreur
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_saisirhumeur");

        $view->setVar('tabEmotions', emotionsservice::getEmotions($pdo));

        $view->setVar('description', httphelper::getParam('newDescription'));
        $view->setVar('dateHeure', httphelper::getParam('newDateHeure'));
        $view->setVar('codeEmotion', httphelper::getParam('newCodeEmotion'));
        $view->setVar('codeUtilisateur', httphelper::getParam('newCodeUtilisateur'));

        $view->setVar('descriptionOK', httphelper::getParam('descriptionOK'));
        $view->setVar('dateHeureOK', httphelper::getParam('dateHeureOK'));
        $view->setVar('codeUtilisateurOK', httphelper::getParam('codeUtilisateurOK'));
        $view->setVar('codeEmotionOK', httphelper::getParam('codeEmotionOK'));
        $view->setVar('humeursaisie', httphelper::getParam('humeursaisie'));
        
        return $view;
    }

    /**
     * Ajout de l'humeur
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function exprimer($pdo)
    {
        // Récupération variable
        $description = httphelper::getParam('newDescription');
        $dateHeure = httphelper::getParam('newDateHeure');
        $codeEmotion = httphelper::getParam('newCodeEmotion');
        $codeUtilisateur = httphelper::getParam('newCodeUtilisateur');

        humeurservice::ajoutHumeur($pdo, $description, $dateHeure, $codeUtilisateur, $codeEmotion);

    return $this->index($pdo);
    }
}
