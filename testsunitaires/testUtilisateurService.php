<?php
use model\utilisateurservice;
use PHPUnit\Framework\TestCase;

class UtilisateurServiceTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public function testAfficher() {
        $pdo = $this->getPDO();
        $this->assertNull(utilisateurservice::ajouterUtilisateur($pdo, "Test", "test", "test@test.test", "LeTesteurFouDu12", "autre", "2002-02-02", "HjeEu32eXjdEZiitestkejEDhE3843JdJeu"));
        $this->assertNotTrue(utilisateurservice::ajouterUtilisateur($pdo, "Test", "test", "test@test.test", "LeTesteurFouDu12", "autre", "pasbonformatDate", "HjeEu32eXjdEZiitestkejEDhE3843JdJeu"));
    }

    public function testSuppUtilisateur() {
        $pdo = $this->getPDO();
        $this->assertNull(utilisateurservice::suppUtilisateur($pdo, 72));
        $this->assertNotTrue(utilisateurservice::suppUtilisateur($pdo, 1));
    }

    public function testModifUtilisateur() {
        $pdo = $this->getPDO();
        $this->assertNull(utilisateurservice::modifierProfil($pdo, "Maurel", "Oskar", "test@test.test", "krxv", "autre", "2002-02-02", 71));
        $this->assertNotTrue(utilisateurservice::modifierProfil($pdo, "Maurel", "Oskar", "test@test.test", "krxv", "autre", "DatePasBonne", 71));
    }

    public function testModifierMotDePasse() {
        $pdo = $this->getPDO();
        $this->assertNull(utilisateurservice::modifierMotDePasse($pdo, "test", 71));
        //Je remet mon mot de passe initial
        $this->assertnull(utilisateurservice::modifierMotDePasse($pdo, "lemotdepasse", 71));
        //code d'utilisateur pas connu
        $this->assertNotTrue(utilisateurservice::modifierMotDePasse($pdo, "lemotdepasse", 1));
        //code d'utilisateur pas au bon format
        $this->assertNotTrue(utilisateurservice::modifierMotDePasse($pdo, "lemotdepasse", "test"));
    }

}
?>