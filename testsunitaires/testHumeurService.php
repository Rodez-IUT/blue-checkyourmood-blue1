<?php
use PHPUnit\Framework\TestCase;
use model\HumeurService;

class testHumeurService extends TestCase
{
    private $pdo;
    private $humeurService;

    protected function setUp(): void
    {
        $this->pdo = $this->getMockBuilder(\PDO::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->humeurService = new HumeurService();
    }

    public function testGetHumeursUtilisateurFiltres(): void
    {
        //GIVEN un code utilisateur, un code émotion et une date-heure
        $codeUtilisateur = 1;
        $codeEmotion = 2;
        $dateHeure = '2023-04-01';

        $stmtMock = $this->getMockBuilder(\PDOStatement::class)
            ->getMock();
        $stmtMock->expects($this->once())
            ->method('execute')
            ->with([$codeUtilisateur, $codeEmotion, $dateHeure.'%']);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with($this->stringContains('SELECT'))
            ->willReturn($stmtMock);

        // When on appelle la méthode getHumeursUtilisateurFiltres avec ces paramètres et une instance de PDO
        $result = $this->humeurService->getHumeursUtilisateurFiltres($this->pdo, $codeUtilisateur, $codeEmotion, $dateHeure);

        // Thenon s'assure que le résultat retourné est un tableau vide, et que la méthode execute a été appelée sur le mock de PDOStatement avec les paramètres attendus.
        $this->assertIsArray($result);
        $this->assertCount(0, $result);
    }

    public function testGetHumeursUtilisateurDate(): void
    {
        // Given un code utilisateur et une date-heure
        $codeUtilisateur = 1;
        $dateHeure = '2023-04-01';

        $stmtMock = $this->getMockBuilder(\PDOStatement::class)
            ->getMock();
        $stmtMock->expects($this->once())
            ->method('execute')
            ->with([$codeUtilisateur, $dateHeure.'%']);

        $this->pdo->expects($this->once())
            ->method('prepare')
            ->with($this->stringContains('SELECT'))
            ->willReturn($stmtMock);

        // When on appelle la méthode getHumeursUtilisateurDate avec ces paramètres et une instance de PDO
        $result = $this->humeurService->getHumeursUtilisateurDate($this->pdo, $codeUtilisateur, $dateHeure);

        // Then on s'assure que le résultat retourné est un tableau vide, et que la méthode execute a été appelée sur le mock de PDOStatement avec les paramètres attendus.
        $this->assertIsArray($result);
        $this->assertCount(0, $result);
    }
    public function testGetHumeursUtilisateurFiltres_EmptyResult()
    {
        // Given un code utilisateur, un code émotion et une date-heure, et un mock de PDOStatement qui retourne false lorsqu'on appelle sa méthode execute
        $codeUtilisateur = 1;
        $codeEmotion = 2;
        $dateHeure = '2022-01-01';
        $stmt = $this->getMockBuilder(\PDOStatement::class)
            ->getMock();
        $stmt->method('execute')
            ->willReturn(false);
        $this->pdo->method('prepare')
            ->willReturn($stmt);

        // When on appelle la méthode getHumeursUtilisateurFiltres avec ces paramètres et une instance de PDO
        $result = $this->humeurService->getHumeursUtilisateurFiltres($this->pdo, $codeUtilisateur, $codeEmotion, $dateHeure);

        // Then on s'assure que le résultat retourné est un tableau vide, et que la méthode execute a été appelée sur le mock de PDOStatement avec les paramètres attendus.
        $this->assertEmpty($result);
    }
    public function testGetHumeursUtilisateurDate_EmptyResult()
    {
        // Given
        $codeUtilisateur = 1;
        $dateHeure = '2022-01-01';
        $stmt = $this->getMockBuilder(\PDOStatement::class)
            ->getMock();
        $stmt->method('execute')
            ->willReturn(false);
        $this->pdo->method('prepare')
            ->willReturn($stmt);

        // When
        $result = $this->humeurService->getHumeursUtilisateurDate($this->pdo, $codeUtilisateur, $dateHeure);

        // Then
        $this->assertEmpty($result);
    }
    public function testGetHumeursUtilisateurEmotion_EmptyResult()
    {
        // Given un code utilisateur, un code émotion et une date-heure, et un mock de PDOStatement qui retourne false lorsqu'on appelle sa méthode execute
        $codeUtilisateur = 1;
        $codeEmotion = 2;
        $stmt = $this->getMockBuilder(\PDOStatement::class)
            ->getMock();
        $stmt->method('execute')
            ->willReturn(false);
        $this->pdo->method('prepare')
            ->willReturn($stmt);

        // When on appelle la méthode getHumeursUtilisateurFiltres avec ces paramètres et une instance de PDO
        $result = $this->humeurService->getHumeursUtilisateurEmotion($this->pdo, $codeUtilisateur, $codeEmotion);

        // Then on s'assure que le résultat retourné est un tableau vide, et que la méthode execute a été appelée sur le mock de PDOStatement avec les paramètres attendus.
        $this->assertEmpty($result);
    }
    public function testGetHumeursUtilisateur_EmptyResult()
    {
        // Given un code utilisateur et une date-heure, et un mock de PDOStatement qui retourne false lorsqu'on appelle sa méthode execute
        $codeUtilisateur = 1;
        $stmt = $this->getMockBuilder(\PDOStatement::class)
            ->getMock();
        $stmt->method('execute')
            ->willReturn(false);
        $this->pdo->method('prepare')
            ->willReturn($stmt);

        // When on appelle la méthode getHumeursUtilisateurDate avec ces paramètres et une instance de PDO
        $result = $this->humeurService->getHumeursUtilisateur($this->pdo, $codeUtilisateur);

        // Then on s'assure que le résultat retourné est un tableau vide, et que la méthode execute a été appelée sur le mock de PDOStatement avec les paramètres attendus.
        $this->assertEmpty($result);
    }

   
}
?>