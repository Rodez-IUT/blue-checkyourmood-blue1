<?php

use PHPUnit\Framework\TestCase;
use model\StatHumeurService;

class testStatHumeurService extends TestCase
{
    private $pdo;
    private $statHumeurService;

    protected function setUp(): void
    {
        $this->pdo = $this->getMockBuilder(\PDO::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->statHumeurService = new StatHumeurService();
    }

    
    public function testGetNbEmotionAvecAucuneEmotion()
    {
        // Given : un PDO avec une requête qui renvoie 0 émotion
        $stmtMock = $this->createMock(\PDOStatement::class); // On crée un mock de PDOStatement
        $stmtMock->method('execute')->willReturn(false);
        $stmtMock->method('fetch')->willReturn(false);

        $pdoMock = $this->createMock(\PDO::class);
        $pdoMock->method('prepare')->willReturn($stmtMock); // On configure le mock de PDO pour qu'il renvoie notre mock de PDOStatement
        $codeUtilisateur = 1;

        // When : appel de la méthode getNbEmotion
        $result = $this->statHumeurService->getNbEmotion($pdoMock, $codeUtilisateur);

        // Then : vérification que la méthode renvoie une chaîne JSON vide
        $this->assertEquals("[]", $result);
    }
    
    public function testGetDatesAvecAucuneHumeur()
    {
        // Given : un PDO avec une requête qui ne renvoie aucune humeur
        $stmtMock = $this->createMock(\PDOStatement::class);
        $stmtMock->method('execute')->willReturn(false);
        $stmtMock->method('fetch')->willReturn(false);

        $this->pdo->method('prepare')->willReturn($stmtMock);
        $dateDebut = "2023-04-01";
        $dateFin = "2023-04-03";
        $codeUtilisateur = 1;

        // When : appel de la méthode getDates
        $result = $this->statHumeurService->getDates($this->pdo, $dateDebut, $dateFin, $codeUtilisateur);

        // Then : vérification que la méthode renvoie une chaîne JSON vide
        $this->assertEquals("[]", $result);
    }
    public function testGetNbEmotionAvecDesEmotions()
    {
        // Given : un PDO avec une requête qui renvoie plusieurs émotions et des humeurs correspondantes
        $stmtMock = $this->createMock(\PDOStatement::class);
        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('fetch')->willReturnOnConsecutiveCalls(
            [1], // Émotion 1
            [3], // Émotion 2
            [2]  // Émotion 3
        );
    
        $recupNbHumeurMock = $this->createMock(\PDOStatement::class);
        $recupNbHumeurMock->method('execute')->willReturn(true);
        $recupNbHumeurMock->method('fetch')->willReturnOnConsecutiveCalls(
            [0], // 0 humeur pour émotion 1
            [4], // 4 humeurs pour émotion 2
            [2]  // 2 humeurs pour émotion 3
        );
    
        $pdoMock = $this->createMock(\PDO::class);
        $pdoMock->method('prepare')->willReturnOnConsecutiveCalls(
            $stmtMock, // 1ère requête pour récupérer les émotions
            $recupNbHumeurMock, // 1ère requête pour récupérer le nb d'humeurs pour émotion 1
            $recupNbHumeurMock, // 2ème requête pour récupérer le nb d'humeurs pour émotion 2
            $recupNbHumeurMock  // 3ème requête pour récupérer le nb d'humeurs pour émotion 3
        );
    
        $codeUtilisateur = 1;
    
        // When : appel de la méthode getNbEmotion
        $result = $this->statHumeurService->getNbEmotion($pdoMock, $codeUtilisateur);
    
        // Then : vérification que la méthode renvoie le résultat attendu
        $expectedResult = '[0,4,2]';
        $this->assertEquals($expectedResult, $result);
    }
    
    
    
    
}
?>