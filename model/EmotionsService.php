<?php

namespace model;

class EmotionsService
{

    /**
     * Renvoie toutes les emotions presentes dans la base de donnée
     */
    public function getEmotions($pdo)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM emotion");
            $stmt->execute();

            $tabEmotions = array();
            while ($row = $stmt->fetch()) {
                $tabEmotions[] = array(
                    'ID_EMOTION' => $row['ID_EMOTION'], 'EMOJI' => $row['EMOJI'], 'NOM' => $row['NOM']
                );
            }
            return $tabEmotions;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }
}
