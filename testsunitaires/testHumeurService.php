<?php
use model\connexionservice;
use model\humeurservice;
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class HumeurServiceTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public function testGetHumeursUtilisateurFiltres() {
        $pdo = $this->getPDO();

        $aTester1 = humeurservice::getHumeursUtilisateurFiltres($pdo, 70, 1, '2023-01-01');
        $this->assertEquals('[{"DATE_HEURE":"2023-01-01 02:05:28","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla","CODE_EMOTION":1,"ID_HUMEUR":1884}]', json_encode($aTester1));

        //Est sensé renvoyer un tableau vide
        $aTester2 = humeurservice::getHumeursUtilisateurFiltres($pdo, 1, 30, 2023-01-01);
        $this->assertEquals('[]', json_encode($aTester2));

    }

    public function testGetHumeursUtilisateurDate() {
        $pdo = $this->getPDO();

        $aTester1 = humeurservice::getHumeursUtilisateurDate($pdo, 70, '2023-01-01');
        $this->assertEquals('[{"DATE_HEURE":"2023-01-01 09:56:16","EMOJI":"&#128535","NOM":"\u00c9merveillement","DESCRIPTION":"non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum","CODE_EMOTION":7,"ID_HUMEUR":1775},{"DATE_HEURE":"2023-01-01 02:05:28","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla","CODE_EMOTION":1,"ID_HUMEUR":1884},{"DATE_HEURE":"2023-01-01 00:40:29","EMOJI":"&#128562","NOM":"Int\u00e9r\u00eat \u00e9tonn\u00e9, intrigu\u00e9","DESCRIPTION":"libero nullam sit amet turpis elementum ligula vehicula consequat morbi a","CODE_EMOTION":15,"ID_HUMEUR":1700}]', json_encode($aTester1));

        //Est sensé renvoyer un tableau vide
        $aTester2 = humeurservice::getHumeursUtilisateurDate($pdo, 2, '2023-01-01');
        $this->assertEquals('[]', json_encode($aTester2));
        
    }

    public function testGetHumeursUtilisateurEmotion() {
        $pdo = $this->getPDO();

        $aTester1 = humeurservice::getHumeursUtilisateurEmotion($pdo, 70, 26);
        $this->assertEquals('[{"DATE_HEURE":"2023-01-16 08:29:00","EMOJI":"&#129397","NOM":"D\u00e9sir sexuel","DESCRIPTION":"","CODE_EMOTION":26,"ID_HUMEUR":2043},{"DATE_HEURE":"2023-01-16 08:29:00","EMOJI":"&#129397","NOM":"D\u00e9sir sexuel","DESCRIPTION":"","CODE_EMOTION":26,"ID_HUMEUR":2044},{"DATE_HEURE":"2023-01-16 08:29:00","EMOJI":"&#129397","NOM":"D\u00e9sir sexuel","DESCRIPTION":"","CODE_EMOTION":26,"ID_HUMEUR":2045}]', json_encode($aTester1));

        //Est sensé renvoyer un tableau vide
        $aTester2 = humeurservice::getHumeursUtilisateurEmotion($pdo, 2, '2023-01-01');
        $this->assertEquals('[]', json_encode($aTester2));
        
    }

    public function testGetHumeursUtilisateur() {
        $pdo = $this->getPDO();
        $aTester1 = humeurservice::getHumeursUtilisateur($pdo, 71);
        $this->assertEquals('[{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"Ouioui","CODE_EMOTION":1,"ID_HUMEUR":2024},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"Ouioui","CODE_EMOTION":1,"ID_HUMEUR":2025},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"Ouioui","CODE_EMOTION":1,"ID_HUMEUR":2026},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"Ouioui","CODE_EMOTION":1,"ID_HUMEUR":2027},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"test","CODE_EMOTION":1,"ID_HUMEUR":2030},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"test","CODE_EMOTION":1,"ID_HUMEUR":2032},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"test","CODE_EMOTION":1,"ID_HUMEUR":2034},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"test","CODE_EMOTION":1,"ID_HUMEUR":2036},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"test","CODE_EMOTION":1,"ID_HUMEUR":2038},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"test","CODE_EMOTION":1,"ID_HUMEUR":2040},{"DATE_HEURE":"2023-01-13 19:15:11","EMOJI":"&#129321","NOM":"Admiration","DESCRIPTION":"test","CODE_EMOTION":1,"ID_HUMEUR":2042},{"DATE_HEURE":"2023-01-13 11:12:00","EMOJI":"&#128545","NOM":"Col\u00e8re","DESCRIPTION":"je suis col\u00e8re","CODE_EMOTION":5,"ID_HUMEUR":2023},{"DATE_HEURE":"2023-01-13 11:09:00","EMOJI":"&#128525","NOM":"Adoration","DESCRIPTION":"test","CODE_EMOTION":2,"ID_HUMEUR":2022}]', json_encode($aTester1));

        // Est sensé renvoyer un tableau vide
        $aTester2 = humeurservice::getHumeursUtilisateur($pdo, 1);
        $this->assertEquals('[]', json_encode($aTester2));
    }

    public function testAjoutHumeur() {
        $pdo = $this->getPDO();
        //Test si une insertion ne se fait effectivement pas (l'id 72 n'existe pas)
        $this->assertNotTrue(humeurservice::ajoutHumeur($pdo, "test", "2023-01-13 19:15:11", 72, 1));
        //Test si la requete se fait effectivement car la requete renvoie null si elle se fait comme il faut
        $this->assertNull(humeurservice::ajoutHumeur($pdo, "test", "2023-01-13 19:15:11", 71, 1));
    }

    public function testSuppHumeursUtilisateur() {
        $pdo = $this->getPDO();
        //Test si une suppression ne se fait effectivement pas (l'id 72 n'existe pas)
        $this->assertNotTrue(humeurservice::suppHumeursUtilisateur($pdo, 72, 1, "2023-01-13 19:15:11"));
        //Test si la requete se fait effectivement car la requete renvoie null si elle se fait comme il faut
        $this->assertNull(humeurservice::suppHumeursUtilisateur($pdo, 72, 1, "2023-01-13 19:15:11"));
    }

    public function testSuppToutesHumeursutilisateur() {
        $pdo = $this->getPDO();
        //Test si la requete ne se fait effectivement pas (l'id 72 n'existe pas)
        $this->assertNotTrue(humeurservice::suppToutesHumeursUtilisateur($pdo, 72));
        //Test si la requete se fait effectivement car la requete renvoie null si elle se fait comme il faut
        $this->assertNull(humeurservice::suppToutesHumeursUtilisateur($pdo, 72));
    }

}
?>