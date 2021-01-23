<?php
include("app/model/comments.php");

class Controller extends appController
{

	protected function index()
	{
		$this->corePrivate();

		$this->data['nb'] = $this->model->coreModelCount();
		$this->data['comments'] = $this->model->coreModelAll(
			array(
				"table" => "comments, blog_users",
				"where" => "comment_author=ID",
				"order_column" => "comment_date",
				"order_direction" => "desc"
			));
	
		define("PAGE_TITLE", "Liste des commentaires");
		$this->load->view("comments", "index.php", $this->data);
		
	}	

	/*protected function supprimer() 
	{
		$id = $_GET['id'];
	 $this->model->commentDelete($id);
		
<<<<<<< HEAD
		$this->index();
	
	}
=======

		$data['comments'] = $this->model->coreModelAll(
			array(
				"table" => "comments",
				"order_column" => "comment_date",
				"order_direction" => "desc"
			));
		
		define("PAGE_TITLE", "Liste des commentaires");
		$this->load->view("comments", "index.php", $data);
	}*/

	protected function delete() {

		$this->corePrivate();
     
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $retour = $this->model->coreDelete(array(
          "column" => "comment_ID",
          "value" => $id
          ));
       /* if ($retour) {
          header ("Location: index?module=comments&notif=ok");
        } else {
          header ("Location: index?module=comments&notif=nok");
        }
      }*/

	      if ($retour) {
	      	$this->coreRedirect("?module=comments", array(
	      		"notif" => "Commentaire supprimé !",
	      		"type" => "success"

	      	));

	      } else {
	      	$this->coreRedirect("?module=comments", array(
	      		"notif" => "Commentaire non supprimé !",
	      		"type" => "warning !"

      	));
      	}
      } else {
    	die('Accés interdit');
    }
  }

>>>>>>> 6cc91769fcbf2ce18a73420653d61a6151d43748
}