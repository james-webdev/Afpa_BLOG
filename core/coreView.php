<?php 

class coreView extends core
{
	
	public function view($module, $view, $data = null)
	{
		$url = "app/view/" . $module . "/" . $view;

		if(file_exists($url)){

			include($url);

		} else {
			die("Vue inexistante !!!!!!!!!!!!!");
		}
	}

	private function flashDisplayBS()
	{
		 if (isset($_SESSION["flash"]['notif'])) { ?>

   <div style="position: fixed; top: 100px; left: 50px; z-index: 1000">
     <div class="alert alert-<?= $_SESSION['flash']['type'] ?>" alert-dismissible fade show role="alert">
       <?= $_SESSION['flash']['notif']; ?>
       <?php unset ($_SESSION['flash']); ?>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true"> &times;</span>
			  </button>
     </div>
   </div>

   <?php } 
	}
}