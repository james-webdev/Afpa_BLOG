<?php
class coreController extends core
{
	
	protected $load;
	protected $model;
	protected $data;

 function __construct($module, $action)
 {
 	//$this->module = $module;
 	//$this->action = $action;
 	$this->load = new coreView();
 	//$this->model = new Model($this->module);

 	//die($this->module . "/" . $this->action);
 	if(method_exists($this, $action)){

 		$this->$action();
 	//déjà $index est dans la class controller posts 

 	} else {

 		$this->page404();
 	}
 	
 }

 protected function page404()
	{
		define("PAGE_TITLE", "Erreur 404");
		$this->load->view("layout", "page404.php");
	}

	protected function coreRedirect($url, $flash = array())
	{
		if (isset($flash['notif'])) {
			$_SESSION['flash']['notif'] = $flash['notif'];
      $_SESSION['flash']['type'] = $flash['type'];
		}
		header("Location: " . $url);
		exit;
	}
	
	protected function corePrivate($url =null)
	{
		
		if(!isset($_SESSION['user'])){

			if($url != null){

			$_SESSION['redirect'] = $url;

				$this->coreRedirect("?module=users&action=login", array(
		      		"notif" => "Page privée!",
		      		"type" => "warning !"

	      	));
			}
		}
	}
}