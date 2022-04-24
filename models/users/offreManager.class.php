<?php


require_once "./models/bdd.php";

class OffresManager extends Bdd
{
    private $offre;

    public function add_offre($intitule , $lieuDeTravail, $description){
        $req ="INSERT INTO offre(`intitule`,`emailUser`, `lieuDeTravail`,`description`,`approuverO`) VALUES (:intitule, :emailUser, :lieuDT, :description, :approuver)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":intitule", $intitule, PDO::PARAM_STR);
        $stmt->bindValue(":emailUser", $_SESSION['email'], PDO::PARAM_STR);
        $stmt->bindValue(":lieuDT", $lieuDeTravail, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":approuver", 0, PDO::PARAM_INT);
        $stmt->execute();
        $estAjouter = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estAjouter;
    }

        public function getAnnonce($email)
    {
        $req = "SELECT * FROM offre WHERE emailUser = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }
    public function getNonApprouver()
    {
        $req = "SELECT * FROM offre INNER JOIN user ON offre.emailUser = user.email  WHERE offre.approuverO = 0";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }
    public function getAppourver()
    {
        $req = "SELECT * FROM offre INNER JOIN user ON offre.emailUser = user.email  WHERE offre.approuverO = 1";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }
    public function approuver_offre_by_id($id){
        $req = "UPDATE offre SET approuverO = 1 WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }
    public function getOffreValide(){
        $req = "SELECT * FROM offre INNER JOIN user ON offre.emailUser = user.email WHERE offre.approuverO = 1";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }

    public function postuler($email , $idOffre){
        $req = "INSERT INTO postulant(`idOffre`,`emailP`,`approuverP`) VALUES(:idOffre, :emailP, :approuverP)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOffre", $idOffre, PDO::PARAM_INT);
        $stmt->bindValue(':emailP', $email, PDO::PARAM_STR);
        $stmt->bindValue(":approuverP",0,PDO::PARAM_INT); 
        $stmt->execute();
        $estAjouter = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estAjouter;
    }
    public function getCandidatures()
    {
        $req = "SELECT * FROM postulant INNER JOIN offre ON postulant.idOffreP = offre.id INNER JOIN user ON offre.emailUser = user.email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();   
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }

    public function approuverCandidature($emailP , $idOffre){
        $req = "UPDATE postulant SET approuverP = 1 WHERE postulant.emailP = :emailP AND postulant.idOffreP = :idOffreP";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':emailP',$emailP,PDO::PARAM_STR);
        $stmt->bindValue(':idOffreP', $idOffre, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function candidaturePerso($email)
    {
        $req = "SELECT * FROM postulant WHERE emailP = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }
    public function supprimerPostulant($idOffre){
        $req = "DELETE FROM postulant WHERE idOffreP = :idOffre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':idOffre',$idOffre,PDO::PARAM_INT);
        $stmt->execute();
        $estSupprimer = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estSupprimer;
    }
}