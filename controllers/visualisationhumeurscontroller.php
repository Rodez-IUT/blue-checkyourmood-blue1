<?php

/**
 * visualisationHumeursController.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\verificationservice;
use model\stathumeurservice;

/**
 * Class de visualisationHumeursController
 * Permet a un utilisateur de visualiser ses humeurs dans le temps
 * @package controllers
 */
class visualisationHumeursController implements controller
{
    /**
     * @param pdo connexion à la base de données
     * @return view vue retournée au routeur
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_visualisationhumeurs");

        $view->setVar('choixVisualisation', httphelper::getParam('choixVisualisation'));
        
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');

        $view->setVar('humeursStat', stathumeurservice::getNbEmotion($pdo, $codeUtilisateur));
        

        $dateDebut = httphelper::getParam('dateDebut');
        $dateFin = httphelper::getParam('dateFin');
        $view->setVar('tableauDates', stathumeurservice::getDates($pdo, $dateDebut, $dateFin, $codeUtilisateur));

        $view->setVar('tableau1', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 1, $codeUtilisateur));
        $view->setVar('tableau2', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 2, $codeUtilisateur));
        $view->setVar('tableau3', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 3, $codeUtilisateur));
        $view->setVar('tableau4', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 4, $codeUtilisateur));
        $view->setVar('tableau5', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 5, $codeUtilisateur));
        $view->setVar('tableau6', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 6, $codeUtilisateur));
        $view->setVar('tableau7', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 7, $codeUtilisateur));
        $view->setVar('tableau8', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 8, $codeUtilisateur));
        $view->setVar('tableau9', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 9, $codeUtilisateur));
        $view->setVar('tableau10', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 10, $codeUtilisateur));
        $view->setVar('tableau11', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 11, $codeUtilisateur));
        $view->setVar('tableau12', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 12, $codeUtilisateur));
        $view->setVar('tableau13', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 13, $codeUtilisateur));
        $view->setVar('tableau14', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 14, $codeUtilisateur));
        $view->setVar('tableau15', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 15, $codeUtilisateur));
        $view->setVar('tableau16', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 16, $codeUtilisateur));
        $view->setVar('tableau17', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 17, $codeUtilisateur));
        $view->setVar('tableau18', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 18, $codeUtilisateur));
        $view->setVar('tableau19', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 19, $codeUtilisateur));
        $view->setVar('tableau20', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 20, $codeUtilisateur));
        $view->setVar('tableau21', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 21, $codeUtilisateur));
        $view->setVar('tableau22', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 22, $codeUtilisateur));
        $view->setVar('tableau23', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 23, $codeUtilisateur));
        $view->setVar('tableau24', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 24, $codeUtilisateur));
        $view->setVar('tableau25', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 25, $codeUtilisateur));
        $view->setVar('tableau26', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 26, $codeUtilisateur));
        $view->setVar('tableau27', stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, 27, $codeUtilisateur));

        return $view;
    }  

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function afficher($pdo)
    {

        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $humeurStat = stathumeurservice::getNbEmotion($pdo, $codeUtilisateur);

        return $this->index($pdo);
    }

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function getDatas($pdo)
    {
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $dateDebut = httphelper::getParam('dateDebut');
        $dateFin = httphelper::getParam('dateFin');
        $codeEmotion = 1;

        $tableauHumeursByDate = stathumeurservice::getNbHumeursParEmotions($pdo, $dateDebut, $dateFin, $codeEmotion, $codeUtilisateur);
        $tableauDates = stathumeurservice::getDates($pdo, $dateDebut, $dateFin, $codeUtilisateur);

        return $this->index($pdo);
    }

    /**
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function getHumeursByDate($pdo)
    {
        $codeUtilisateur = httphelper::getParam('codeUtilisateur');
        $dateDebut = httphelper::getParam('dateDebut');
        $dateFin = httphelper::getParam('dateFin');
        

        return $this->index($pdo);
    }

}

