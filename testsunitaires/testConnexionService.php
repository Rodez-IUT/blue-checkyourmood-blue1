<?php 


use model\ConnexionService;
use PHPUnit\Framework\TestCase;
/**Refactoring de la classe de test
 * Respect de la trame GIVEN WHEN THEN 
 * Analyse php stan level 8
 */
class testConnexionService extends TestCase
{
    private $pdo;
    private $connexionService;

    protected function setUp(): void
    {
        // GIVEN  un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo = $this->getMockBuilder(\PDO::class)
                          ->disableOriginalConstructor()
                          ->getMock();

        $this->connexionService = new ConnexionService();
    }
    /* Test cas nominale pour un identifiant existant */
    public function testIdentifiantExisteValide()
    {
        // GIVEN un utilisateur existant
        $identifiant = 'utilisateur_test';

        // AND un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                    ->getMock();

        // AND les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
            ->method('execute')
            ->with([$identifiant])
            ->willReturn(true);

        // AND les expectations pour la méthode fetch du mock PDOStatement
        $stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(['id_utilisateur' => 1, 'nom_utilisateur' => 'utilisateur_test']);

        // AND un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?')
                ->willReturn($stmt);

        // WHEN l'appelle de la méthode identifiantExiste avec les mocks PDO et PDOStatement
        $resultat = $this->connexionService->identifiantExiste($this->pdo, $identifiant);

        // THEN la méthode retourne true car l'utilisateur existe
        $this->assertTrue($resultat);
    }


    /**Test cas d'erreur : on cherche à tester le cas où la basse de données est down ou l'echec de la requete */
    public function testIdentifiantExisteErreur()
    {
        // GIVEN un nom d'utilisateur inexistant
        $identifiant = 'utilisateur_inexistant';

        // AND un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                 ->getMock();

        // AND les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
            ->method('execute')
            ->with([$identifiant])
            ->willReturn(true);

        // AND les expectations pour la méthode fetch du mock PDOStatement
        $stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(null);

        // WHEN on Créer un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?')
                ->willReturn($stmt);

        // THEN Appele de la méthode identifiantExiste avec les mocks PDO et PDOStatement
        $resultat = $this->connexionService->identifiantExiste($this->pdo, $identifiant);

        // AND la méthode retourne false car l'utilisateur n'existe pas
        $this->assertFalse($resultat);
    }

    /** méthode de teste pour le cas où l'identifiant et le mot de passe sont valides. */
    public function testMotDePasseValideCasNominal()
    {
        // GIVEN un identifiant et un mot de passe valides
        $identifiant = 'utilisateur_test';
        $motDePasse = 'motdepasse_test';
        $hashedPassword = sha1($motDePasse);

        // AND un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                    ->getMock();

        // AND les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
            ->method('execute')
            ->with([$identifiant, $hashedPassword])
            ->willReturn(true);

        // AND les expectations pour la méthode fetch du mock PDOStatement
        $stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(['id_utilisateur' => 1, 'nom_utilisateur' => 'utilisateur_test', 'mot_de_passe' => $hashedPassword]);

        // AND un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ? AND MOT_DE_PASSE = ?')
                ->willReturn($stmt);

        // WHEN Appel de la méthode motDePasseValide avec les mocks PDO et PDOStatement
        $resultat = $this->connexionService->motDePasseValide($this->pdo, $identifiant, $motDePasse);

        // THEN La méthode retourne true car le mot de passe est valide
        $this->assertTrue($resultat);
    }
    
    /* Teste le cas où l'identifiant est valide, mais le mot de passe est incorrect.*/
    public function testMotDePasseValideCasLimite()
    {
        // GIVEN un identifiant valide mais un mot de passe incorrect
        $identifiant = 'utilisateur_test';
        $motDePasse = 'motdepasse_incorrect';
        $hashedPassword = sha1($motDePasse);

        // AND un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                    ->getMock();

        // AND les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
            ->method('execute')
            ->with([$identifiant, $hashedPassword])
            ->willReturn(true);

        // AND les expectations pour la méthode fetch du mock PDOStatement
        $stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(null);

        // AND un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ? AND MOT_DE_PASSE = ?')
                ->willReturn($stmt);

        // WHEN Appel de la méthode motDePasseValide avec les mocks PDO et PDOStatement
        $resultat = $this->connexionService->motDePasseValide($this->pdo, $identifiant, $motDePasse);
        
        // THEN La méthode retourne true car le mot de passe est valide
        $this->assertFalse($resultat);

    }

    /* Test le cas où utilisateur existant est recherché et ses informations sont retournées.*/
    public function testGetUtilisateurCasNominale(){
        // GIVEN un utilisateur existant
        $identifiant = 'utilisateur_test';

        // AND un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                    ->getMock();

        // AND les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
            ->method('execute')
            ->with([$identifiant])
            ->willReturn(true);

        // AND les expectations pour la méthode fetch du mock PDOStatement
        $stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(['id_utilisateur' => 1, 'nom_utilisateur' => 'utilisateur_test']);

        // AND un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?')
                ->willReturn($stmt);

        // WHEN l'appelle de la méthode getUtilisateur avec les mocks PDO et PDOStatement
        $resultat = $this->connexionService->getUtilisateur($this->pdo, $identifiant);

        // THEN la méthode retourne les informations de l'utilisateur
        $this->assertEquals(['id_utilisateur' => 1, 'nom_utilisateur' => 'utilisateur_test'], $resultat);
    }


    /* Test le cas où utilisateur inexistant est recherché */
    public function testGetUtilisateurCasLimite()
    {
        // GIVEN un utilisateur inexistant
        $identifiant = 'utilisateur_inexistant';

        // AND un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                ->getMock();

        // AND les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
            ->method('execute')
            ->with([$identifiant])
            ->willReturn(true);

        // AND les expectations pour la méthode fetch du mock PDOStatement
        $stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(null);

        // AND  un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?')
                ->willReturn($stmt);

        // WHEN l'appelle de la méthode getUtilisateur avec les mocks PDO et PDOStatement
        $resultat = $this->connexionService->getUtilisateur($this->pdo, $identifiant);

        // THEN la méthode retourne null car l'utilisateur n'existe pas
        $this->assertNull($resultat);
    }
    /**Test cas d'erreur : on cherche à tester le cas où la basse de données est down ou l'echec de la requete */
    public function testGetUtilisateurCasErreur()
    {
        // GIVEN un utilisateur test
        $identifiant = 'utilisateur_test';

        // Créer un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                      ->getMock();

        // WHEN les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
             ->method('execute')
             ->with([$identifiant])
             ->willThrowException(new \Exception("Erreur lors de l'exécution de la requête getUtilisateur."));

        // AND Créer un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE NOM_UTILISATEUR = ?')
                ->willReturn($stmt);

        // Then  On s'attend à ce qu'une exception soit levé
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Erreur lors de l'exécution de la requête getUtilisateur.");

        // Then  l'appelle de la méthode getUtilisateur avec les mocks PDO et PDOStatement retourne une exception
        
        $resultat = $this->connexionService->getUtilisateur($this->pdo, $identifiant);
    }


    public function testGetUtilisateurByIdCasNominal()
    {
        // GIVEN un utilisateur existant
        $id = 1;

        // AND un mock de PDOStatement pour simuler la requête SQL
        $stmt = $this->getMockBuilder(\PDOStatement::class)
                    ->getMock();

        // AND les expectations pour la méthode execute du mock PDOStatement
        $stmt->expects($this->once())
            ->method('execute')
            ->with([$id])
            ->willReturn(true);

        // AND les expectations pour la méthode fetch du mock PDOStatement
        $stmt->expects($this->once())
            ->method('fetch')
            ->willReturn(['id_utilisateur' => $id, 'nom_utilisateur' => 'utilisateur_test']);

        // AND  un mock de PDO pour éviter d'accéder à la base de données réelle
        $this->pdo->expects($this->once())
                ->method('prepare')
                ->with('SELECT * FROM utilisateur WHERE ID_UTILISATEUR = ?')
                ->willReturn($stmt);

        // WHEN l'appelle de la méthode getUtilisateurById avec les mocks PDO et PDOStatement
        $resultat = $this->connexionService->getUtilisateurById($this->pdo, $id);

        // THEN la méthode retourne les informations de l'utilisateur
        $this->assertEquals(['id_utilisateur' => $id, 'nom_utilisateur' => 'utilisateur_test'], $resultat);
    }
}

?>