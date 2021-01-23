<?php
include("app/model/users.php");

class Controller extends appController
{
	
/*
	public function __construct($module)
	{
		parent::__construct($module);

		//routage de l'action
		$this->index();
		
	}
*/
	protected function index()
	{
		$this->corePrivate('?module=users&action=index');

		$this->data['users'] = $this->model->coreModelAll();
		$this->data['nb'] = $this->model->coreModelCount();
		define("PAGE_TITLE", "Liste des users");
		$this->load->view("users", "index.php", $this->data);
	}

	protected function page404()
	{
		define("PAGE_TITLE", "Erreur 404");
		$this->load->view("layout", "ma_page404.php");
	}

	protected function login()
	{

		if($_SERVER["REQUEST_METHOD"] == "GET"){
		define("PAGE_TITLE", "Page Login");
		$this->load->view("users", "login.php", $this->data);

		} else {
			//traitement
			$this->data['user'] =$this->model->verif_login($_POST);

	
			if ($this->data['user']) {

				$_SESSION["user"] = $this->data['user'];
				


				if (!setcookie("track", $la_date, time()+3600*24*31))
				{ 
					die("cookie not saved!");

				}


				if(isset($_SESSION['redirect'])){

					$url = $_SESSION['redirect'];
					unset($_SESSION['redirect']);

				} else {
					$url = 'index.php';
				}
				if(isset($_POST["remember"])){
					
					setcookie("remember", serialize($_POST),time()+3600*1);

				}

				$this->coreRedirect($url, array(
					"notif" => "Connexion réussie !",
					"type" => "success"
				));
			} else {
				$this->coreRedirect('index.php?module=users&action=login', array(
					"notif" => "Erreur de login/password !",
					"type" => "warning"
				));
			}
		}
	}	

	protected function logout()
	{
		unset($_SESSION["user"]);
		setcookie("remember");
		$this->coreRedirect("index.php" , array(
					"notif" => "Déconnecté !",
					"type" => "success"));

	}

	protected function confirm()
	{

		if(isset($_GET['token'])){
			
			if($this->model->confirm($_GET['token'])) {

				$this->coreRedirect('index.php?module=users&action=login', array(
					"notif" => "Bienvenu !",
					"type" => "success"
				));

			} else {
				$this->coreRedirect('index.php?module=users&action=login', array(
					"notif" => "Erreur de login/password !",
					"type" => "warning"
				));
			}
		} else {
			die('Accès refusé');
		}
	}

	protected function register()
	{
		if($_SERVER["REQUEST_METHOD"] == "GET"){
		define("PAGE_TITLE", "Page Register");
		$this->load->view("users", "register.php", $this->data);
		
		} else {
		//traitement aveugle

			$token = md5(uniqid(mt_rand()));
			
			if ($this->model->register_add($_POST, $token)) {
				
				$this->mail->ajouter_destinataire($_POST['user_email']);
				
				$url = BASE_DIR;
				//$html = file_get_contents("../app/view/utilisateur/mail.base.html");
				include("app/view/users/mail.base.php");
			

				$this->mail->contenu("Confirmation d'inscripion","",$html);
				//var_dump($this->mail);exit;
				$this->mail->envoyer();
		
				$this->coreRedirect('?module=users&action=login', array(
					"notif" => "Merci pour votre inscription !<br> Merci de valider dans le mail !",
					"type" => "success"
				));

			} else {
				$this->coreRedirect('?module=users&action=register', array(
							"notif" => "Votre inscripion a échoué ! !",
							"type" => "danger"
						));
			}
		}


	}
			
}