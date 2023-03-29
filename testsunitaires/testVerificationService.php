<?php
use model\verificationservice;
use PHPUnit\Framework\TestCase;



class VerificationServiceTest extends TestCase {

    public function testNom() {
        $this->assertTrue(verificationservice::testNom("test"));
        $this->assertNotTrue(verificationservice::testNom(""));
        $this->assertNotTrue(verificationservice::testNom("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"));
        
    }

    public function testPrenom() {
        $this->assertNotTrue(verificationservice::testPrenom(""));
        $this->assertTrue(verificationservice::testPrenom("test"));
        $this->assertNotTrue(verificationservice::testPrenom("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"));
    }

    public function testMail() {
        $this->assertTrue(verificationservice::testMail("oskarmorel@gmail.com"));
        $this->assertNotTrue(verificationservice::testMail(""));
        $this->assertNotTrue(verificationservice::testMail("ozeejezroi.com"));
    }

    public function testNomUtilisateur() {
        $this->assertTrue(verificationservice::testNomUtilisateur("krxv"));
        $this->assertNotTrue(verificationservice::testNomUtilisateur("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"));
        $this->assertNotTrue(verificationservice::testNomUtilisateur(""));
    }

    public function testGenre() {
        $this->assertTrue(verificationservice::testGenre("female"));
        $this->assertNotTrue(verificationservice::testGenre(""));
        $this->assertNotTrue(verificationservice::testMail("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"));
    }

    public function testDateNaissance() {
        $this->assertTrue(verificationservice::testDateNaissance("05/07/2002"));
        $this->assertNotTrue(verificationservice::testDateNaissance(""));
    }

    public function testMotDePasse() {
        $this->assertTrue(verificationservice::testMotDePasse("motdepasse"));
        $this->assertNotTrue(verificationservice::testMotDePasse(""));
    }

    public function testMdpCorrespond() {
        $mdp1 = "mdp";
        $mdp2 = "mdp";
        $mdpVide = "";
        $mdpCorrespondPas = "RienAVoir";

        $this->assertTrue(verificationservice::testMdpCorrespond($mdp1, $mdp2));
        $this->assertTrue(verificationservice::testMdpCorrespond($mdp2, $mdp1));
        $this->assertNotTrue(verificationservice::testMdpCorrespond($mdp1, $mdpCorrespondPas));
        $this->assertNotTrue(verificationservice::testMdpCorrespond($mdp1, $mdpVide));
        $this->assertNotTrue(verificationservice::testMdpCorrespond($mdpVide, $mdp1));
    }

}
?>