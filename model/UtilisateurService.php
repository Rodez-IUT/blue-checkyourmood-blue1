<?php

namespace model;
use PDO;

class UtilisateurService
{

    /**
     * Ajoute un utilisateur a la base de donnée
     * @return true si trouver sinon false
     */
    public function ajouterUtilisateur($pdo, $nom, $prenom, $mail, $nomUtilisateur, $genre, $dateNaissance, $motDePasse)
    {
        //Cryptage du mot de passe
        $mdp  = hash('sha1', htmlspecialchars($motDePasse));

        $sql ="INSERT INTO `utilisateur` (`NOM`, `PRENOM`, `NOM_UTILISATEUR`, `MOT_DE_PASSE`, `MAIL`, `GENRE`, `DATE_DE_NAISSANCE`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $nomUtilisateur, $mdp, $mail,  $genre, $dateNaissance]);
            $_GET['creation'] = true;
            $pdo->commit();

        } catch (\PDOException $e) {
            $code = $e -> getCode();
            if ($code == 23000) {
                $_GET['identifiantDejaUtilise'] = true;
            } else {
                $e->getMessage();
                $_GET['exception'] = $e;
            }
            $pdo->rollBack();
        } catch (\PDOException $e) {
            $_GET['creation'] = false;
            $e->getMessage();
            $_GET['exception'] = $e;
            var_dump($e);
            $pdo->rollBack();
        }
        return true;
    }

    /* Supprimer un utilisateur */
    public function suppUtilisateur($pdo, $codeUtilisateur)
    {
        $sql = "DELETE FROM `utilisateur` WHERE ID_UTILISATEUR = ?";
        $pdo->beginTransaction();
        try {

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codeUtilisateur]);
            $pdo->commit();
            return true;
        } catch (\PDOException $e) {
            $pdo->rollBack();
            $e -> getMessage();
            return false;
        }

    }

    /* Modifier profil */
    public function modifierProfil($pdo, $nom, $prenom, $nomUtilisateur, $mail, $genre, $dateNaissance, $codeUtilisateur)
    {

        $sql = "UPDATE utilisateur
        SET NOM = ?,
        PRENOM = ?,
        NOM_UTILISATEUR = ?,
        MAIL = ?,
        GENRE = ?,
        DATE_DE_NAISSANCE = ?	 
        WHERE ID_UTILISATEUR = ?";

        $pdo->beginTransaction();        

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $nomUtilisateur, $mail, $genre, $dateNaissance, $codeUtilisateur]);
            $_GET['modification'] = true;
            $pdo->commit();
            return true;
        } catch (\PDOException $e) {
            $code = $e -> getCode();
            if ($code == 23000) {
                $_GET['identifiantDejaUtilise'] = true;
            } else {
                $e->getMessage();
                $_GET['exception'] = $e;
            }
            $pdo->rollBack();
        } catch (\Exception $e) {
            $pdo->rollBack();
            $e->getMessage();
            $_GET['modification'] = false;
        }

        
    }

    /* Modifier profil */
    public function modifierMotDePasse($pdo, $motDePasse, $codeUtilisateur)
    {
        $motDePasse = sha1($motDePasse);

        $sql = "UPDATE utilisateur
        SET MOT_DE_PASSE = ?
        WHERE ID_UTILISATEUR = ?";

        $pdo->beginTransaction();     

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$motDePasse, $codeUtilisateur]);
            $_GET['modification'] = true;
            $pdo->commit();
        } catch (\Exception $e) {
            $pdo->rollBack();
            $e->getMessage();
            print $e;
            $_GET['modification'] = false;
        }
    }
    public function testModifierMotDePasseAvecSucces()
    {
        // GIVEN
        $codeUtilisateur = 1;
        $motDePasse = "test123";
        $motDePasseCrypte = sha1($motDePasse);

        $pdoStatementMock = $this->getMockBuilder(PDOStatement::class)
                                ->getMock();
        $pdoStatementMock->expects($this->once())
                        ->method('execute')
                        ->with([$motDePasseCrypte, $codeUtilisateur]);

        $pdoMock = $this->getMockBuilder(PDO::class)
                        ->disableOriginalConstructor()
                        ->getMock();
        $pdoMock->expects($this->once())
                ->method('beginTransaction');
        $pdoMock->expects($this->once())
                ->method('prepare')
                ->with($this->stringContains('UPDATE utilisateur'))
                ->willReturn($pdoStatementMock);
        $pdoMock->expects($this->once())
                ->method('commit');

        // WHEN
        $resultat = $this->utilisateurService->modifierMotDePasse(
            $pdoMock,
            $motDePasse,
            $codeUtilisateur
        );

        // THEN
        $this->assertTrue($resultat);
        $this->assertTrue(isset($_GET['modification']));
        $this->assertTrue($_GET['modification']);
    }
    
    public function testModifierMotDePasseAvecEchec()
    {
        // GIVEN
        $codeUtilisateur = 1;
        $motDePasse = "test123";
        $motDePasseCrypte = sha1($motDePasse);

        $pdoMock = $this->getMockBuilder(PDO::class)
                        ->disableOriginalConstructor()
                        ->getMock();
        $pdoMock->expects($this->once())
                ->method('beginTransaction');
        $pdoMock->expects($this->once())
                ->method('prepare')
                ->with($this->stringContains('UPDATE utilisateur'))
                ->will($this->throwException(new PDOException('Erreur SQL')));
        $pdoMock->expects($this->once())
                ->method('rollBack');

        // WHEN
        $resultat = $this->utilisateurService->modifierMotDePasse(
            $pdoMock,
            $motDePasse,
            $codeUtilisateur
        );

        // THEN
        $this->assertFalse($resultat);
        $this->assertTrue(isset($_GET['modification']));
        $this->assertFalse($_GET['modification']);
        $this->assertTrue(isset($_GET['exception']));
        }

    
}
