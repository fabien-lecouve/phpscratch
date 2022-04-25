<?php

require('model/class/EventType');

class EventTypeDao {
    // Attributs
    private $pdo;


    // Méthodes------
    public function __construct($unPDO)
    {
        $this->pdo = $unPDO;
    }

    public function findAll()
    {
        try
        {
            $connexion = $this->pdo;
            $sql = $connexion::getMyPdo()->prepare("SELECT * FROM event_type");
            $sql->execute();
            $i = 0;
            while( $data = $sql->fetch(PDO::FETCH_ASSOC) ) {
                $allEventTypes[$i] = new EventType($data["id_event_type"], $data["name"]);
                $i++;
            }
            return $allEventTypes;
        }
        catch ( PDOException $error )
        {
            $error->getMessage();
        }
    }

}   

