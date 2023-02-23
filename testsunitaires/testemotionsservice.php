<?php
use model\connexionservice;
use model\emotionsservice;
use model\stathumeurservice;
use PHPUnit\Framework\TestCase;



class EmotionsServiceTest extends TestCase {

    public function getPDO() {
        try {
            $db = new PDO('mysql:host=localhost;port=3306;dbname=checkyourmood;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public function testGetEmotions() {
        $pdo = $this->getPDO();
        //test pas égal
        $aTester = emotionsservice::getEmotions($pdo);

        $this->assertNotEquals('Ne doit pas être égal', json_encode($aTester));
        $this->assertEquals('[{"ID_EMOTION":1,"EMOJI":"&#129321","NOM":"Admiration"},{"ID_EMOTION":2,"EMOJI":"&#128525","NOM":"Adoration"},{"ID_EMOTION":3,"EMOJI":"&#128522","NOM":"Appr\u00e9ciation esth\u00e9tique"},{"ID_EMOTION":4,"EMOJI":"&#129395","NOM":"Amusement"},{"ID_EMOTION":5,"EMOJI":"&#128545","NOM":"Col\u00e8re"},{"ID_EMOTION":6,"EMOJI":"&#128560","NOM":"Anxi\u00e9t\u00e9"},{"ID_EMOTION":7,"EMOJI":"&#128535","NOM":"\u00c9merveillement"},{"ID_EMOTION":8,"EMOJI":"&#128563","NOM":"Malaise (embarrassement)"},{"ID_EMOTION":9,"EMOJI":"&#128530","NOM":"Ennui"},{"ID_EMOTION":10,"EMOJI":"&#128528","NOM":"Calme (s\u00e9r\u00e9nit\u00e9)"},{"ID_EMOTION":11,"EMOJI":"&#128533","NOM":"Confusion"},{"ID_EMOTION":12,"EMOJI":"&#129316","NOM":"Envie (craving)"},{"ID_EMOTION":13,"EMOJI":"&#129314","NOM":"D\u00e9go\u00fbt"},{"ID_EMOTION":14,"EMOJI":"&#128543","NOM":"Douleur empathique"},{"ID_EMOTION":15,"EMOJI":"&#128562","NOM":"Int\u00e9r\u00eat \u00e9tonn\u00e9, intrigu\u00e9"},{"ID_EMOTION":16,"EMOJI":"&#129327","NOM":"Excitation (mont\u00e9e d\u2019adr\u00e9naline)"},{"ID_EMOTION":17,"EMOJI":"&#128552","NOM":"Peur"},{"ID_EMOTION":18,"EMOJI":"&#128561","NOM":"Horreur"},{"ID_EMOTION":19,"EMOJI":"&#129300","NOM":"Int\u00e9r\u00eat"},{"ID_EMOTION":20,"EMOJI":"&#128516","NOM":"Joie"},{"ID_EMOTION":21,"EMOJI":"&#129488","NOM":"Nostalgie"},{"ID_EMOTION":22,"EMOJI":"&#128524","NOM":"Soulagement"},{"ID_EMOTION":23,"EMOJI":"&#129392","NOM":"Romance"},{"ID_EMOTION":24,"EMOJI":"&#128546","NOM":"Tristesse"},{"ID_EMOTION":25,"EMOJI":"&#129303","NOM":"Satisfaction"},{"ID_EMOTION":26,"EMOJI":"&#129397","NOM":"D\u00e9sir sexuel"},{"ID_EMOTION":27,"EMOJI":"&#128558","NOM":"Surprise"}]', json_encode($aTester));
    }
}
?>