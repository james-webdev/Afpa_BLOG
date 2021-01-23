<?php
class appController extends coreController
{

	protected $mail;
	
	function __construct($module, $action)
 {
 	
 	

 	$this->module = $module;
 	$this->action = $action;
 	include('lib/mail.class.php');
 	$this->mail = new Mail(MAIL_EXPE, NOM_EXPE, MAIL_EXPE);
	$this->model = new Model($this->module);

	if(isset($_COOKIE["remember"])){
 	if(!isset($_SESSION["user"])){
 		$remember = unserialize($_COOKIE["$remember"]);
 		
 		$this->data['user'] =$this->model->verif_login($remember);
 		var_dump($remember);
 		exit;
 		}
 	}
 	$this->data['categories'] = $this->model->coreModelAll(
			array(
				"table" => "categories",
				"columns" => "cat_descr, cat_id",
				"order_column" => "cat_descr",
				"order_direction" => "desc"
			));

 	parent::__construct($module, $action);

 }

}