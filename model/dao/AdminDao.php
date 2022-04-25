<?php

require('model/class/admin.php');

class AdminDao {
    // Attributs
    private $pdo;


    // Méthodes------
    public function __construct($unPDO)
    {
        $this->pdo = $unPDO;
    }

    public function add($firstname, $lastname, $email, $hashpassword, $idRole)
    {
        try
        {
            $date = date("Y-m-d H:i:s");
            $connexion = $this->pdo;
            $sql = $connexion::getMyPdo()->prepare("INSERT INTO admin (lastname, firstname, email, password, creation_time, id_role) VALUES(:lastname, :firstname, :email, :hashpassword, :creationTime, :idRole)");
            $sql->bindParam(":lastname", $lastname);
            $sql->bindParam(":firstname", $firstname);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":hashpassword", $hashpassword);
            $sql->bindParam(":creationTime", $date);
            $sql->bindParam(":idRole", $idRole);
            $sql->execute();
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    public function findByEmail($email)
    {
        try
        {
            $admin = [];
            $connexion = $this->pdo;
            $sql = $connexion::getMyPdo()->prepare("SELECT * FROM admin WHERE email = :email");
            $sql->bindParam(":email", $email);
            $sql->execute();
            $admin = $sql->fetch(PDO::FETCH_ASSOC);
            
            if ( $admin )
            {
                $anAdmin = new Admin($admin["id_admin"], $admin["lastname"], $admin["firstname"], $admin['email'], $admin["password"], $admin["creation_time"], $admin['id_role'], $admin['id_promoter']);

                $idRole = $admin['id_role'];
                $idpromoter = $admin['id_promoter'];

                $req = $connexion::getMyPdo()->prepare("SELECT * FROM role R, promoter P WHERE R.id_role = :idRole AND P.id_promoter = :idPromoter");
                $req->bindParam(":idRole", $idRole);
                $req->bindParam(":idPromoter", $idpromoter);
                $req->execute();

                while ( $joinData = $req->fetch(PDO::FETCH_ASSOC))
                {
                    $aRole = new Role($joinData['id_role'], $joinData['name']);
                    $aPromoter = new Promoter($joinData['id_promoter'], $joinData['name'], $joinData['address'], $joinData['zip'], $joinData['city'], $joinData['country'], $joinData['siret'], $joinData['legal_status'], $joinData['creation_time']);
                    $anAdmin->setRole($aRole);
                    $anAdmin->setPromoter($aPromoter);
                }
                return $anAdmin;
            }
            
        }
        catch ( PDOException $error )
        {
            $error->getMessage();
        }
    }

}