<?php
/**
 * testaccueilcontroller.php                                               03/2023
 * @author INFO2 IUT de Rodez, Blanchard Jules, Cozatti Thibauld, Daamouch Amine, Faussurier Matéo
 */

use ..\..\yasmf\controller;
use ..\..\yasmf\config;
use ..\..\yasmf\view;
use ..\..\PHPUnit\Framework\TestCase;

class TestAccueilController extends TestCase
{
    /**
     * Crée une connexion à la base de données avant chaque méthodes de tests.
     */
    protected function setUp() : void
    {
        //Given on crée une connexion avec la base de données.
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
    }

    public function testIndex()
    {
        //When on crée une vue de la page d'accueil.
        $controller = new controllers\accueilcontroller();
        $view = $controller->index($pdo);
        //Then
        $this->assertInstanceOf('yasmf\view', $view); // On vérifie si la méthode inde du controlleur retourne un objet de la classe view.
        $this->assertStringContainsString(config::getRacine(), $view->render()); // Vérifie si la vue contient bien la racine configurée dans le fichier de configuration
    }
}
?>