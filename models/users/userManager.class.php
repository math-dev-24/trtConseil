<?php

require_once "./models/users/users.class.php";
require_once "./models/users/type.class.php";
require_once "./models/bdd.php";

class UsersManager extends Bdd{

    public function verifEmailDispo($mail){
        $utilisateur = $this->getInformationUser($mail);
        return empty($utilisateur);
    }
    public function verifCombinaison($mail, $pass){
        $passwordDb = $this->getPassword($mail);
        return $passwordDb === $pass ;
    }

    public function getPassword($mail){
        return $this->getInformationUser($mail)['password'];
    }
    public function update_cv($adresse)
    {
        $req = "UPDATE users SET cv = :cv WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':cv',$adresse,PDO::PARAM_STR);
        $stmt->bindValue(':email',$_SESSION['email'],PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function getByGrade($idType){
        $req = "SELECT * FROM users WHERE idType = :idType";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':idType', $idType,PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        $stmt->closeCursor();
        return $resultat;
    }

    public function getAllUsers(){
        $req = "SELECT * FROM users u LEFT JOIN type ON u.idType = type.id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        $stmt->closeCursor();
        return $resultat;
    }

    public function getInformationUser($mail){
        $req = "SELECT * FROM users u LEFT JOIN type ON u.idType = type.id WHERE  u.email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':email',$mail, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }

    public function getType($id){
        $req = "SELECT * FROM type WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
    public function delete_by_id($id)
    {
        $req = "DELETE FROM users u WHERE u.id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
    public function modification_Bdd($name_item, $item, $email)
    {
        $req = "UPDATE users u SET ".$name_item." = :item WHERE u.email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':item',$item);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }
    public function approuver_by_email($email)
    {
        $req = "UPDATE users SET approuver = 1 WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function inscriptionUser(string $nom,string $prenom,string $mail,string $pass,int $idType){
        $req = "INSERT INTO users (`email`, `password`,`approuver`,`idType`, `nom` , `prenom`) VALUES (:mail, :password, :approuver, :idType, :nom, :prenom)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
        $stmt->bindValue(":password", $pass , PDO::PARAM_STR);
        $stmt->bindValue(":approuver", 0 , PDO::PARAM_INT);
        $stmt->bindValue(':idType', $idType, PDO::PARAM_INT);
        $stmt->bindValue(':nom',$nom,PDO::PARAM_STR);
        $stmt->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $stmt->execute();
        $estAjouter = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estAjouter;
    }
}