<?php
use model\connexionservice;
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class ConnexionServiceTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public function testVerifIdentifiant() {
        $pdo = $this->getPDO();
        $aTester1 = connexionservice::identifiantExiste($pdo, "simon");
        $aTester2 = connexionservice::identifiantExiste($pdo, "existePas");
        $this->assertTrue($aTester1);
        $this->assertNotTrue($aTester2);
    }

    public function testMotDePasse() {
        $pdo = $this->getPDO();
        $motDePasseValide = sha1("123");
        $aTester1 = connexionservice::motDePasseValide($pdo, "simon", $motDePasseValide);
        $this->assertNotTrue($aTester1);
    }

    public function testMotDePasseValide() {
        $pdo = $this->getPDO();
        $motDePasseValide = sha1("123");
        $aTester1 = connexionservice::motDePasseValide($pdo, "simon", $motDePasseValide);
        $this->assertNotTrue($aTester1);
    }


    public function testGetUtilisateur() {
        $pdo = $this->getPDO();
        $aTester1 = connexionservice::getUtilisateur($pdo, "simon");
        $this->assertEquals('{"ID_UTILISATEUR":70,"0":70,"NOM":"Launay","1":"Launay","PRENOM":"Simon","2":"Simon","NOM_UTILISATEUR":"simon","3":"simon","MOT_DE_PASSE":"40bd001563085fc35165329ea1ff5c5ecbdbbeef","4":"40bd001563085fc35165329ea1ff5c5ecbdbbeef","MAIL":"launay.simon@outlook.com","5":"launay.simon@outlook.com","GENRE":"homme","6":"homme","DATE_DE_NAISSANCE":"2002-10-10","7":"2002-10-10"}', json_encode($aTester1));
    }

    public function testGetUtilisateurById() {
        $pdo = $this->getPDO();
        $aTester1 = connexionservice::getUtilisateurById($pdo, "70");
        $this->assertEquals('{"ID_UTILISATEUR":70,"0":70,"NOM":"Launay","1":"Launay","PRENOM":"Simon","2":"Simon","NOM_UTILISATEUR":"simon","3":"simon","MOT_DE_PASSE":"40bd001563085fc35165329ea1ff5c5ecbdbbeef","4":"40bd001563085fc35165329ea1ff5c5ecbdbbeef","MAIL":"launay.simon@outlook.com","5":"launay.simon@outlook.com","GENRE":"homme","6":"homme","DATE_DE_NAISSANCE":"2002-10-10","7":"2002-10-10"}', json_encode($aTester1));

        //l'ID "1" n'existe pas dans la base de données
        $aTester2 = connexionservice::getUtilisateurById($pdo, "1");
        $this->assertNotEquals('Ne doit pas être égal', json_encode($aTester2));

    }
}
?>