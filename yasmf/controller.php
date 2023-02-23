<?php

/**
 * controller.php
 * @CheckYourMood 2022-2023
 */

namespace yasmf;

/**
 * Interface implémentée par tout les controllers
 * @package yasmf
 */
interface controller
{

    /**
     * Fonction à implémenter dans tous les controleurs. Appelée par défaut par le routeur lorsque l'action
     * d'un controleur n'est pas renseignée.
     * @param $pdo connexion à la base de données. Permet de "recycler" la connexion à la base de données
     * @return mixed vue envoyée au routeur
     */
    public function index($pdo);
}
