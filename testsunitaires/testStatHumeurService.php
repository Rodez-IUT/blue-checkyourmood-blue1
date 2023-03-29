<?php
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class StatHumeurServiceTest extends TestCase {

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
        $aTester1 = stathumeurservice::getNbEmotion($pdo, 70);
        $resultatAttendu = "[51,51,47,47,36,36,40,40,53,53,41,41,30,30,24,24,38,38,42,42,39,39,42,42,42,42,32,32,44,44,37,37,45,45,46,46,44,44,29,29,35,35,37,37,42,42,41,41,49,49,3,3,0,0]";
        $resultatNonAttendu = "Test pas egal";
        $this->assertEquals($resultatAttendu, $aTester1);
        $this->assertNotEquals($resultatNonAttendu, $aTester1);
    }

    public function testGetDates() {
        $pdo = $this->getPDO();
        
        $aTester1 = stathumeurservice::getDates($pdo, "2023-01-01", "2023-01-11", 70);
        $resultatAttendu = '["2023-01-01","2023-01-01","2023-01-10","2023-01-10"]';

        $resultatNonAttendu = "test pas egal";

        $this->assertEquals($resultatAttendu, $aTester1);
        $this->assertNotEquals($resultatNonAttendu, $aTester1);
    }

    public function testGetNbHumeursParEmotions() {
        $pdo = $this->getPDO();

        $this->assertEquals('[0,0]', stathumeurservice::getNbHumeursParEmotions($pdo, "2023-01-01", "2023-01-11", 1, 70)); 
    }

    public function testGetNbEmotionDates() {
        $pdo = $this->getPDO();

        $this->assertEquals('[1,1,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0]', stathumeurservice::getNbEmotionDates($pdo, 70, "2022-12-14"));
        $this->assertEquals('[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]', stathumeurservice::getNbEmotionDates($pdo, 70, "2023-12-14"));  
    }
}
?>