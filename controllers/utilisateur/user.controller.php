<?php

require_once "./controllers/mainController.php";
require_once "./models/users/userManager.class.php";
require_once "./models/users/offreManager.class.php";

class UtilisateurController extends MainController{

    private $utilisateurManager;
    private $offreManager;


    public function __construct()
    {
        $this->utilisateurManager = new UsersManager;
        $this->offreManager = new OffresManager;
    }

    public function afficher_profil()
    {
        $data_page = [
            "utilisateur" => $this->utilisateurManager->getInformationUser($_SESSION['email']),
            "view" => "./views/utilisateur/profil.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    
    public function afficherAccueil()
    {
        $data_page = [
            "view" => "./views/utilisateur/accueil.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficher_all_offre_valide()
    {
        $data_page = [
            "candidatures" => $this->offreManager->candidaturePerso($_SESSION['email']),
            "offreValide" => $this->offreManager->getOffreValide(),
            "view" => "./views/utilisateur/offres.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficher_gestion_offre()
    {
        $data_page = [
            "nonApprouver" => $this->offreManager->getNonApprouver(),
            "Approuver" => $this->offreManager->getAppourver(),
            "view" => "./views/utilisateur/gestionOffres.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficherInscription(){
        $data_page = [
            "view" => "./views/utilisateur/inscription.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficherConnection(){
        $data_page = [
            "view" => "./views/utilisateur/connection.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficher_page_recrutement()
    {
        $data_page = [
            "offres" => $this->offreManager->getAnnonce($_SESSION['email']),
            "view" => "./views/utilisateur/recrutement.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficher_page_add_recrutement()
    {
        $data_page = [
            "view" => "./views/utilisateur/addRecrutement.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function ajouter_annonce(string $intitule ,string $lieuDeTravail ,string $description){
        if($this->offreManager->add_offre($intitule, $lieuDeTravail , $description)){
            Toolbox::ajouterMessageAlerte("Annonce Ajoutée",Toolbox::COULEUR_VERTE);
            header('location: '.URL. "annoncesDepose");
        }else{
            Toolbox::ajouterMessageAlerte("Erreur lors de l'ajout", Toolbox::COULEUR_ROUGE);
            header('location: '.URL."annoncesDepose");
        }
    }
    public function afficher_candidatures(){
        $data_page = [
            "candidatures" => $this->offreManager->getCandidatures(),
            "view" => "./views/utilisateur/candidatures.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function ne_plus_postuler(int $idOffre){
        if($this->offreManager->supprimerPostulant($idOffre)){
            Toolbox::ajouterMessageAlerte("Désistement, effectué", Toolbox::COULEUR_VERTE);
            header('location: ' . URL . "recrutement/offres");
        }
    }
    public function approuver_candidature(string $emailP ,int $idOffre){
        if($this->offreManager->approuverCandidature($emailP, $idOffre)){
            Toolbox::ajouterMessageAlerte("Candidature approuvé", Toolbox::COULEUR_VERTE);
            header('location: '.URL."candidatures");
        }else{
            Toolbox::ajouterMessageAlerte("Erreur lors de l'approbation",Toolbox::COULEUR_ORANGE);
            header("location: ".URL."candidatures");
        }
    }
    public function postuler_offre(int $idOffre)
    {
        if($this->offreManager->postuler($_SESSION['email'], $idOffre)){
            Toolbox::ajouterMessageAlerte("Vous venez de postuler !", Toolbox::COULEUR_VERTE);
            header("location: ".URL."recrutement/offres");
        }else{
            Toolbox::ajouterMessageAlerte("Erreur lors de l'ajout !", Toolbox::COULEUR_ORANGE);
            header('location: '.URL."recrutement/offres");
        }
    }
    public function approuver_offre(int $id){
        if($this->offreManager->approuver_offre_by_id($id)){
            Toolbox::ajouterMessageAlerte("Offre approuvé",Toolbox::COULEUR_VERTE);
            header("location: " . URL . "gestionOffres");
        }else{
            Toolbox::ajouterMessageAlerte("Erreur lors de l'approbation", Toolbox::COULEUR_ORANGE);
            header("location: ".URL."gestionOffres");
        }
    }
    public function ajouter_cv(string $adresse){
        $user = $this->utilisateurManager->getInformationUser($_SESSION['email']);
        if($user['cv'] != ""){
            $ancienFichier = $user['cv'];
            unlink($ancienFichier);
            $this->utilisateurManager->update_cv($adresse);
            Toolbox::ajouterMessageAlerte("Cv télécharger avec succès", Toolbox::COULEUR_VERTE);
            header("location: " . URL . "profil");
        }else{
            $this->utilisateurManager->update_cv($adresse);
            Toolbox::ajouterMessageAlerte("Cv téléchargé avec succès", Toolbox::COULEUR_VERTE);
            header("location: " . URL . "profil");
        }
    }

    public function modifcation_element($email, $name_item , $item){
        $user = $this->utilisateurManager->getInformationUser($email);
        if($name_item != "password"){
            $_SESSION[$name_item] = $item;
        }
        if ($user[$name_item] == $item) {
            Toolbox::ajouterMessageAlerte($name_item." actuel", Toolbox::COULEUR_ORANGE);
            header('location: ' . URL . 'profil');
        } else {
            if($this->utilisateurManager->modification_Bdd($name_item, $item, $_SESSION['email'])){
                Toolbox::ajouterMessageAlerte('Modification pris en compte !', Toolbox::COULEUR_VERTE);
                header('location: ' . URL . 'profil');
            }else{
                Toolbox::ajouterMessageAlerte('Erreur lors de la modification',Toolbox::COULEUR_ORANGE);
                header('location: '.URL."profil");
            }
        }
    }

    public function validation_connection(string $mail , string $password ){
        if($this->utilisateurManager->verifCombinaison($mail,$password)){
            $utilisateurData = $this->utilisateurManager->getInformationUser($mail);
            if($utilisateurData['approuver'] == 1){
                $_SESSION['connect']    = 1;
                $_SESSION['nom']        = $utilisateurData['nom'];
                $_SESSION['prenom']     = $utilisateurData['prenom'];
                $_SESSION['email']      = $utilisateurData['email'];
                $_SESSION['grade']      = $this->utilisateurManager->getType($utilisateurData['idType'])['designation'];

                Toolbox::ajouterMessageAlerte("Vous êtes maintenant connecté !", Toolbox::COULEUR_VERTE);
                header('location: ' . URL . "accueil");
            }else{
                Toolbox::ajouterMessageAlerte("Compte non approuvé !", Toolbox::COULEUR_ORANGE);
                header("location: ".URL."connection");
            }
        }else{
            Toolbox::ajouterMessageAlerte('Erreur lors de la connection', Toolbox::COULEUR_ORANGE);
            header('location: '.URL."connection");
        }

    }

    public function validation_inscription(string $nom, string $prenom, string $mail , string $pass, int $type){
        if ($this->utilisateurManager->verifEmailDispo($mail)){
            if ($this->utilisateurManager->inscriptionUser($nom, $prenom, $mail, $pass, $type)) {
                Toolbox::ajouterMessageAlerte("Félicitation attendez qu'un admin vous valide ! ", Toolbox::COULEUR_VERTE);
                header("location: " . URL . "accueil");
            }
        }else{
            Toolbox::ajouterMessageAlerte('Email déjà utilisé !', Toolbox::COULEUR_ROUGE);
            header('Location: '.URL."inscription");
        }
    }
    
    public function afficherPageNotFound(){
        $data_page = [
            "view" => "./views/utilisateur/pageNotFound.view.php",
            "template" => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }

}