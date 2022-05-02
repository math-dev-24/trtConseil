<?php
session_start();


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require "./controllers/function.php";
require_once "./controllers/utilisateur/user.controller.php";
require_once "./controllers/admin/admin.controller.php";
$adminController = new AdministrateurController;
$userController = new UtilisateurController;




try {
	if (empty($_GET['page'])) {
		$userController->afficherAccueil();
	} else {
		$url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

		switch ($url[0]) {
			case "accueil":
				$_SESSION['page'] = "accueil";
				$userController->afficherAccueil();
				break;

			case "inscription":
				if (est_connecter()) {
					header('location: ' . URL . "accueil");
				} else {
					$userController->afficherInscription();
				}
				break;
				case "goInscription";
				if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['pass2']) || empty($_POST['pass1']) || empty($_POST['type'])) {
					Toolbox::ajouterMessageAlerte("Donnée(s) d'entrée(s) manquante(s) ou erronnée(s)", Toolbox::COULEUR_ORANGE);
					header("location: " . URL . "/inscription");
				} else {
					if(verification_mail(dataSecure($_POST['email']))){
						$nom 		= dataSecure($_POST['nom']);
						$prenom 	= dataSecure($_POST['prenom']);
						$email 		= dataSecure($_POST['email']);
						$password 	= cryptageMdp(dataSecure($_POST['pass1']));
						$password2	= cryptageMdp(dataSecure($_POST['pass2']));

						if($password === $password2){
							$userController->validation_inscription($nom, $prenom, $email, $password, $_POST['type']);
						}else{

							Toolbox::ajouterMessageAlerte('Les mots de passe ne correspondent pas !', Toolbox::COULEUR_ORANGE);
							header('location: '.URL.'inscription');
						}
					}else{
						Toolbox::ajouterMessageAlerte("Veuillez rentre un email valide !",Toolbox::COULEUR_ORANGE);
						header('location: '.URL."/inscription");
					}
				}
				break;
			case "connection":
				if (est_connecter()) {
					header('location: ' . URL . "accueil");
				} else {
					$userController->afficherConnection();
				}
				break;
			case "goConnection":
				if (empty($_POST['mail']) || empty($_POST['pass'])) {
					Toolbox::ajouterMessageAlerte("Donnée(s) Manquante(s) !", Toolbox::COULEUR_ORANGE);
					header("location: " . URL . "connection");
				} else {
					$mail = dataSecure($_POST['mail']);
					$password = cryptageMdp(dataSecure($_POST['pass']));
					$userController->validation_connection($mail, $password);
				}
			break;
			case "postuler":
				if(mon_grade() == "Candidat"){
					if(isset($url[1])){
						$_SESSION['page'] = "postuler";
						$userController->postuler_offre($url[1]);
					}
				}else{
					Toolbox::ajouterMessageAlerte("Vous devez être candidat", Toolbox::COULEUR_ORANGE);
					header("location: ".URL."accueil");
				}
			break;
			case "candidatures":
				$_SESSION['page'] = "candidatures";
				if (mon_grade() != "Recruteur" && mon_grade() != "Candidat"){
					if(isset($url['2']) && isset($url['3'])){
						$userController->approuver_candidature(dataSecure($url["2"]),dataSecure($url['3']));
					}else{
						$userController->afficher_candidatures();
					}
				}else{
					Toolbox::ajouterMessageAlerte("Droit Administrateur ou Consultant obligatoire", Toolbox::COULEUR_ROUGE);
					header("location: " . URL . "accueil");
				}
			break;
			case "gestionOffres":
				$_SESSION['page'] = "gestionOffres";
				if(mon_grade() != "Recruteur" && mon_grade() != "Candidat"){
					if(!isset($url[1])){
						$userController->afficher_gestion_offre();
					}else{
						$userController->approuver_offre($url[1]);
					}
				}else{
					Toolbox::ajouterMessageAlerte("Droit Administrateur ou Consultant obligatoire",Toolbox::COULEUR_ROUGE);
					header("location: ".URL."accueil");
				}
			break;
			case "deconnexion":
				require "./views/utilisateur/logout.php";
			break;

			case "profil" :
				$_SESSION['page'] = "profil";
				if(est_connecter()){
					if(empty($url[1])){
						$userController->afficher_profil();
					}else{
						$email = $_SESSION['email'];
						if($url[1] == "nom"){
							$userController->modifcation_element($email, $url[1], dataSecure($_POST['nom']));
						}else if($url[1] == "prenom"){
							$userController->modifcation_element($email, $url[1] , dataSecure($_POST['prenom']));
						}else if($url[1] == "password"){
							$userController->modifcation_element($email, $url[1], cryptageMdp(dataSecure($_POST['pass'])));
						}else if($url[1] == "adresse"){
							$userController->modifcation_element($email, $url[1], dataSecure($_POST['adresse']));
						}else if($url[1] == "nomEntreprise"){
							$userController->modifcation_element($email,$url[1],dataSecure($_POST['nomEntreprise']));
						}else if($url[1] == "cv"){
							if(($_FILES['cv']['size']/1000000) < 5){
								$information = pathinfo($_FILES['cv']['name']);
								$extension = $information['extension'];
								if($extension == "pdf"){
									$adresse ="public/cv/CV-".$_SESSION['nom']."-".$_SESSION['prenom']."-".time().".pdf";
									move_uploaded_file($_FILES['cv']['tmp_name'],$adresse);
									$userController->ajouter_cv($adresse);
								}else{
									Toolbox::ajouterMessageAlerte("Extension .pdf requis",Toolbox::COULEUR_ORANGE);
									header("location: ".URL."profil");
								}
							}else {
								Toolbox::ajouterMessageAlerte("5 Mo maximum",Toolbox::COULEUR_ROUGE);
								header("location: ".URL."profil");
							}
						}
					}
				}else{
					Toolbox::ajouterMessageAlerte("Vous devez être connecté",Toolbox::COULEUR_ORANGE);
					header('location: '.URL."accueil");
				}
			break;
			case "offresDispo":
				if(est_connecter() && mon_grade() != "Recruteur"){
					$_SESSION['page'] = "offresDispo";
					$userController->afficher_all_offre_valide();
				}else{
					Toolbox::ajouterMessageAlerte("droit requis", Toolbox::COULEUR_ORANGE);
					header("location: " . URL . "accueil");
				}
			break;
			case "annoncesDepose":
				if (est_connecter() && mon_grade() != "Candidat") {
					$_SESSION['page'] = "annoncesDepose";
					$userController->afficher_page_recrutement();
				}else{
					Toolbox::ajouterMessageAlerte("Droit requis", Toolbox::COULEUR_ORANGE);
					header("location: " . URL . "accueil");
				}
			break;
			case "deposerAnnonce":
				$userController->afficher_page_add_recrutement();
			break;


			case "recrutement" :
				if(isset($url['1']) && !isset($url['2'])){

				}else{
					if(isset($url['2'])){
						if($url['2'] == "addr"){
							if(empty($_POST['intitule']) || empty($_POST['lieuDT']) || empty($_POST['description'])){
								Toolbox::ajouterMessageAlerte("Donnée(s) d'entrée(s) manquante(s)",Toolbox::COULEUR_ORANGE);
								header("location: ".URL."recrutement/annonces/add");
							}else{
								$intitule		= dataSecure($_POST['intitule']);
								$lieuDt			= dataSecure($_POST['lieuDT']);
								$description	= dataSecure($_POST['description']);
								$userController->ajouter_annonce($intitule, $lieuDt , $description);
							}
						} else if ($url['1'] == "retrait" && isset($url['2'])) {
							$userController->ne_plus_postuler($url['2']);
						}
					}else{
						$userController->afficherAccueil();
					}
				}
			break;
			
			case "gestionUsers" :
				if(!est_connecter() && mon_grade() != "Administrateur"){
					Toolbox::ajouterMessageAlerte("Droit Admin requis", Toolbox::COULEUR_ROUGE);
					header('location: ' . URL . "accueil");
				}else{
					$_SESSION['page'] = "gestionUsers";
					if (empty($url[1])) {
						$adminController->goUsers();
					} else {
						if ($url[1] == "supprimer") {
							$adminController->supprimer_user($url['2']);
						}
					}
				}
			break;
			case "gestionConsultants":
				if(!est_connecter() && mon_grade() != "Administrateur"){
					Toolbox::ajouterMessageAlerte("Droit Admin requis", Toolbox::COULEUR_ROUGE);
					header('location: ' . URL . "accueil");
				}else{
					$_SESSION['page'] = "gestionConsultants";
					$adminController->goConsultants();
				}
			break;
			case "ajoutConsultant":
				if (!est_connecter() && mon_grade() != "Administrateur") {
					Toolbox::ajouterMessageAlerte("Droit Admin requis", Toolbox::COULEUR_ROUGE);
					header('location: ' . URL . "accueil");
				} else {
					$_SESSION['page'] = "gestionConsultants";
					$adminController->pageAjouterConsultant();
				}
			break;

			case "addConsultant":
				if (!est_connecter() && mon_grade() != "Administrateur") {
					Toolbox::ajouterMessageAlerte("Droit Admin requis", Toolbox::COULEUR_ROUGE);
					header('location: ' . URL . "accueil");
				} else {
					if (empty($_POST['emailConsultant']) || empty($_POST['passwordTempoConsultant']) || empty($_POST['nomConsultant']) || empty($_POST['prenomConsultant'])) {
						Toolbox::ajouterMessageAlerte("Donnée(s) manquante(s)", Toolbox::COULEUR_ORANGE);
						header('location: ' . URL . "admin/consultants");
					} else {
						if (verification_mail($_POST['emailConsultant'])) {
							$nom		= dataSecure($_POST['nomConsultant']);
							$prenom		= dataSecure($_POST['prenomConsultant']);
							$email 		= dataSecure($_POST['emailConsultant']);
							$pass  = cryptageMdp(dataSecure($_POST['passwordTempoConsultant']));
							$adminController->validation_inscription_consultant($nom, $prenom, $email, $pass);
						} else {
							Toolbox::ajouterMessageAlerte("Veuillez rentrer un email valide !", Toolbox::COULEUR_ORANGE);
							header("location: " . URL . "admin/ajouterConsultant");
						}
					}
				}
				break;

			case "admin":
				if(mon_grade() == "Administrateur"){
					switch ($url[1]) {
						case "consultants":
							if (isset($url[2])) {
								$adminController->pageAjouterConsultant();
							} else {
								$adminController->goConsultants();
							}
							break;
						case "approuver":
							if (empty($_POST['email'])) {
								header('location: ' . URL . "gestionUsers");
							} else {
								$email = dataSecure($_POST['email']);
								$adminController->approuver_utilisateur($email);
							}
							break;
						case "deleteConsultant":
							$adminController->delete_consultant($url[2]);
							break;
						case "grade":
							if (isset($_POST['grade']) && isset($url[2])) {
								$adminController->modifier_type(dataSecure($_POST['grade']), dataSecure($url[2]));
							} else {
								Toolbox::ajouterMessageAlerte("problèmes survenue", Toolbox::COULEUR_ORANGE);
								header('location: ' . URL . "admin/users");
							}
							break;
						default:
							$userController->afficherPageNotFound();
					}
				}else{
					Toolbox::ajouterMessageAlerte("Droit Admin requis", Toolbox::COULEUR_ROUGE);
					header('location: ' . URL . "accueil");
				}
				break;

			default:
				$userController->afficherPageNotFound();
		}
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
