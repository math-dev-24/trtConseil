<?php

require_once "./controllers/mainController.php";
require_once "./models/users/userManager.class.php";

class AdministrateurController extends MainController
{

    private $utilisateurManager;


    public function __construct()
    {
        $this->utilisateurManager = new UsersManager;
    }

    public function pageAjouterConsultant()
    {
        $data_page = [
            "view" => "./views/admin/ajoutConsultant.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function goUsers()
    {
        $data_page = [
            "utilisateurs" => $this->utilisateurManager->getAllUsers(),
            "view" => "./views/admin/utilisateur.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function goConsultants()
    {
        $data_page = [
            "consultants" => $this->utilisateurManager->getByGrade(3),
            "view" =>"./views/admin/consultant.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function delete_consultant($id){
        $this->utilisateurManager->delete_by_id($id);
        Toolbox::ajouterMessageAlerte("Consultant supprimé ", Toolbox::COULEUR_VERTE);
        header("location: ".URL."admin/consultants");
    }
    public function supprimer_user($id){
        $this->utilisateurManager->delete_by_id($id);
        Toolbox::ajouterMessageAlerte("Utilisateur supprimé",Toolbox::COULEUR_VERTE);
        header('location: '.URL."admin/users");
    }

    public function validation_inscription_consultant($nom,$prenom,$mail, $pass)
    {
        if ($this->utilisateurManager->verifEmailDispo($mail)) {
            if ($this->utilisateurManager->inscriptionUser($nom , $prenom,$mail, $pass, 3)) {
                Toolbox::ajouterMessageAlerte("Consultant ajouté ", Toolbox::COULEUR_VERTE);
                header("location: " . URL . "admin/consultants");
            }
        } else {
            Toolbox::ajouterMessageAlerte('Email déjà utilisé !', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "admin/ajouterConsultant");
        }
    }

    public function approuver_utilisateur($email){
        $this->utilisateurManager->approuver_by_email($email);
        Toolbox::ajouterMessageAlerte("Nouvelle utilisateur approuvé",Toolbox::COULEUR_VERTE);
        header('location: '.URL."admin/users");

    }
    public function modifier_type($id, $email)
    {
        $user = $this->utilisateurManager->getInformationUser($_SESSION['email']);
        if($user['idType'] == $id){
            Toolbox::ajouterMessageAlerte("Grade déjà en possession",Toolbox::COULEUR_ORANGE);
            header("location: ".URL."admin/users");
        }else{
            $this->utilisateurManager->modification_Bdd("idType", $id, $email);
            Toolbox::ajouterMessageAlerte("Grade modifié",Toolbox::COULEUR_VERTE);
            header('location: '.URL."admin./users");
        }
    }
}
