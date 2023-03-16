<?php

/**
 * inscriptioncontroller.php
 * @author Info2 IUT Rodez Oskar Morel, Simon Launay, Rémi Jauzion, Antoine Gouzy, Gauthier Jalbaud
 * @CheckYourMood 2022-2023
 */

namespace controllers;

use yasmf\view;
use yasmf\controller;
use yasmf\httphelper;
use yasmf\config;
use model\verificationservice;
use model\utilisateurservice;

/**
 * Permet a un utilisateur de s'inscrire sur l'application
 * @package controllers
 */
class inscriptionController implements controller
{
    /**
     * @param pdo connexion à la base de données.
     * @return view vue retournée au routeur.
     */
    public function index($pdo)
    {
        $view = new view(config::getRacine() . "views/vue_inscription");

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
        $view->setVar('motDePasse1OK', httphelper::getParam('motDePasse1OK'));
        $view->setVar('motDePasse2OK', httphelper::getParam('motDePasse2OK'));
        $view->setVar('creation', httphelper::getParam('creation'));
        $view->setVar('identifiantDejaUtilise', httphelper::getParam('identifiantDejaUtilise'));

        return $view;
    }  

    /**
     * Tentative de creation d'un utilisateur.
     * @param pdo connexion à la base de données
     * @return view appel de la méthode index
     */
    public function creation($pdo)
    {

        if (!empty(httphelper::getParam('affichage'))) {

            // Récupération variable
            $nom = httphelper::getParam(htmlspecialchars('newNom'));
            $prenom = httphelper::getParam(htmlspecialchars('newPrenom'));
            $mail = httphelper::getParam(htmlspecialchars('newMail'));
            $nomUtilisateur = httphelper::getParam(htmlspecialchars('newNomUtilisateur'));
            $genre = httphelper::getParam(htmlspecialchars('newGenre'));
            $dateNaissance = httphelper::getParam(htmlspecialchars('newDateNaissance'));
            $motDePasse1 = httphelper::getParam(htmlspecialchars('newMotDePasse1'));
            $motDePasse2 = httphelper::getParam(htmlspecialchars('newMotDePasse2'));

            // Test des variables
            $_POST['nomOK'] = $nomOK = verificationservice::testNom($nom);
            $_POST['prenomOK'] = $prenomOK = verificationservice::testPrenom($prenom);
            $_POST['mailOK'] = $mailOK = verificationservice::testMail($mail);
            $_POST['nomUtilisateurOK'] = $nomUtilisateurOK = verificationservice::testNomUtilisateur($nomUtilisateur);
            $_POST['genreOK'] = $genreOK = verificationservice::testGenre($genre);
            $_POST['dateNaissanceOK'] = $dateNaissanceOK = verificationservice::testDateNaissance($dateNaissance);

            $_POST['motDePasse1OK'] = $motDePasse1OK = verificationservice::testMotDePasse($motDePasse1);
            $_POST['motDePasse2OK'] = $motDePasse2OK = verificationservice::testMdpCorrespond($motDePasse1, $motDePasse2);
            
            if (!$dateNaissanceOK) {
                $dateNaissance = null;
            }

            if (!$genreOK) {
                $genre = null;
            }
            
            // Si toutes les variables sont valides alors on ajoute à la base de donnée
            if ($nomOK && $prenomOK && $mailOK && $nomUtilisateurOK && $motDePasse1OK && $motDePasse2OK) {
                utilisateurservice::ajouterUtilisateur($pdo, $nom, $prenom, $mail, $nomUtilisateur, $genre, $dateNaissance, $motDePasse2);
            }

        } else {

            // Test des variables
            $_POST['nomOK'] = false;
            $_POST['prenomOK'] = false;
            $_POST['mailOK'] = false;
            $_POST['nomUtilisateurOK'] = false;
            $_POST['genreOK'] = false;
            $_POST['dateNaissanceOK'] = false;
            $_POST['motDePasse1OK'] = false;
            $_POST['motDePasse2OK'] = false;
        }

        return $this->index($pdo);
    }
}

