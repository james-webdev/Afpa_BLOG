<?php

include("app/model/post.php");


class Controller extends appController
{
	
	/*function __construct($module, $action)
	{
		parent::__construct($module, $action);
		
		//routage de l'action
		if(isset($_GET['page'])){

			if($_GET['page'] == 'article'){

				if(isset($_GET['id'])){
					$this->view($_GET['id']);
			
				} else {
					$this->page404();
				}

			} else {
				echo "Page !!!!!!! Autre page de 5 posts";
			}
			
		} else {
			$this->index(0,5);
		}
	}*/

protected function index()
	{
		$offset = 0;
		$limit = 5;
		if(isset($_GET['cat'])){

			$this->data['posts'] = $this->model->postList($limit, $offset, $_GET['cat']);
		} else {
			$this->data['posts'] = $this->model->postList($limit, $offset);
		}
	
		

		$this->data['nb'] = $this->model->coreModelCount();
		/*$this->data['categories'] = $this->model->coreModelAll(
			array(
				"table" => "categories",
				"columns" => "cat_descr, cat_id",
				"order_column" => "cat_descr",
				"order_direction" => "desc"
			));
		var_dump($this->data);*/
		define("PAGE_TITLE", "Liste articles");
		$this->load->view("posts", "index.php", $this->data);
	}

	protected function view() 
	{
		$id = $_GET['id'];
		$this->data['post'] = $this->model->postRead($id);

		$this->data['comments'] = $this->model->commentListByPost($id);
		$this->data['nb'] = $this->model->coreModelCount();
		
		define("PAGE_TITLE", $this->data['post']['post_title']);
		$this->load->view("posts", "view.php", $this->data);
	}

	

	
}