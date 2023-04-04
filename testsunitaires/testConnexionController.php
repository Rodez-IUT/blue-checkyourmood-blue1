<?php
use model\ConnexionService;
use controllers\ConnexionController;
use PHPUnit\Framework\TestCase;
use yasmf\config;

class testConnexionController extends TestCase
{
    private ConnexionController $controller;
    private ConnexionService $connexionService;
    private PDO $pdo;
    private PDOStatement $pdoStatement;

    public function setUp(): void
    {
        parent::setUp();
        // given a connexion service
        $this->connexionService = $this->createStub(ConnexionService::class);
        // and a pdo and a pdo statement
        $this->pdo = $this->createStub(PDO::class);
        $this->pdoStatement = $this->createStub(PDOStatement::class);
        // and a connexion controller
        $this->controller = new ConnexionController($this->connexionService);
    }

    public function testIndex()
    {
        self::assertNotNull($this->connexionService);
        self::assertNotNull($this->controller);
        // when call to index
        $view = $this->controller->index($this->pdo);
        // then the view point to the expected view file
        self::assertEquals("views/index", $view->getRelativePath());
    }

}
?>