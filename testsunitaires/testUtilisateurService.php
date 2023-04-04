<?php
use model\UtilisateurService;
use PHPUnit\Framework\TestCase;

class testUtilisateurService extends TestCase {

    // Déclare une propriété qui stockera le PDO simulé
    private PDO $pdo;

    private UtilisateurService $utilisateurService;
    
    // Avant chaque test, crée un PDO simulé
    protected function setUp() : void {
        parent::setUp();
        $this->pdo = $this->getMockBuilder(PDO::class)
        ->disableOriginalConstructor()
        ->getMock();
        $this->utilisateurService = new UtilisateurService();
    }
    // Test ajouterUtilisateur() avec des valeurs normales
    public function testAjouterUtilisateurAvecValeursNormales()
    {
        // GIVEN les données rélatives à un utilisateur 
        $nom = "Doe";
        $prenom = "John";
        $mail = "johndoe@example.com";
        $nomUtilisateur = "johndoe";
        $genre = "M";
        $dateNaissance = "1990-01-01";
        $motDePasse = "motdepasse";

        $pdoStatementMock = $this->getMockBuilder(PDOStatement::class)
                                ->getMock();
        $pdoStatementMock->expects($this->once())
                         ->method('execute')
                         ->with([$nom, $prenom, $nomUtilisateur, sha1($motDePasse), $mail, $genre, $dateNaissance]);

        $pdoMock = $this->getMockBuilder(PDO::class)
                        ->disableOriginalConstructor()
                        ->getMock();
        $pdoMock->expects($this->once())
                ->method('beginTransaction');
        $pdoMock->expects($this->once())
                ->method('prepare')
                ->with($this->stringContains('INSERT INTO `utilisateur`'))
                ->willReturn($pdoStatementMock);
        $pdoMock->expects($this->once())
                ->method('commit');

        // WHEN l'appelle à la méthode ajouter Utilisateur 
        $resultat = $this->utilisateurService->ajouterUtilisateur(
            $pdoMock,
            $nom,
            $prenom,
            $mail,
            $nomUtilisateur,
            $genre,
            $dateNaissance,
            $motDePasse
        );

        // THEN l'utilisateur est ajouté
        $this->assertTrue($resultat);
    }
    
    // Test suppUtilisateur() avec un ID existant
    public function testSuppUtilisateurNominal()
    {
        // Given
        $pdoStatement = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['execute'])
            ->getMock();
        $pdoStatement->expects($this->once())->method('execute')->willReturn(true);

        $this->pdo->expects($this->once())->method('prepare')->willReturn($pdoStatement);
        $this->pdo->expects($this->once())->method('beginTransaction')->willReturn(true);
        $this->pdo->expects($this->once())->method('commit')->willReturn(true);

        // When
        $result = $this->utilisateurService->suppUtilisateur($this->pdo, 1);

        // Then
        $this->assertTrue($result);
    }
}
?>