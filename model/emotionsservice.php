<?php

namespace model;

class emotionsservice
{

    /**
     * Renvoie toutes les emotions presentes dans la base de données.
     * @param pdo connexion à la base de données.
     */
    public static function getEmotions($pdo)
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
