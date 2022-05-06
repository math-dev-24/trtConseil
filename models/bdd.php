<?php

abstract class Bdd
{
    private static $pdo;

    private static function setBdd()
    {
        $dbname = "recrutement";
        $identifiant = "root";
        $password = "";
        $port = 3306;
        $host = "localhost";


        self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $identifiant, $password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}

//Model

public function getAnnonce($email)
{
	//écriture de la requête dans une variable
    $req = "SELECT * FROM offre WHERE emailUser = :email";
	//préparation de la requête pour éviter les injections SQL -> permet au hacker de soutirer les informations de la base de données
    $stmt = $this->getBdd()->prepare($req);
	// Bind de(s) valeur(s) (associer une valeur a un paramètre)
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
	// execution de la requête SQL
    $stmt->execute();
	// permet de récuperer les informations des Tables dans la variable $data
    $data = $stmt->fetchAll();
	// toujours fermer la requête
    $stmt->closeCursor();
	// retour des $data au controller
    return $data;
}