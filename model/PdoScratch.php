<?php

use PDO as GlobalPDO;

class PdoScratch{
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=phpscratch';   		
    private static $user='root' ;    		
    private static $mdp='' ;	
    private static $monPdo;
	private static $myPdoScratch=null;

    private function __construct(){
        self::$monPdo = new GlobalPDO(self::$serveur . ';' . self::$bdd, self::$user, self::$mdp);
        self::$monPdo->query("SET CHARACTER SET utf8");
    }
    
    public function __destruct()
    {
        self::$monPdo = null;
    }

    public static function getPdoScratch(){
        if ( self::$myPdoScratch == null ){
            self::$myPdoScratch = new PdoScratch();
        }
        return self::$myPdoScratch;
    }

    public static function getMyPdo(){
        return self::$monPdo;
    }
}