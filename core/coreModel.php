<?php
class coreModel extends core
{
	protected $pdo;
	protected $data;

	function __construct($module)
	{
		$this->module = $module;
		try {
	 		$dns = "mysql:host=" . DB_HOST .";dbname=" . DB_NAME . ";chartset=" . DB_CHARSET;		 		
	 		$option = array (
	 			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET,
	 			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

			$this->pdo = new PDO($dns, DB_USER , DB_PASSWORD, $option);	
			
	 	} catch (Exception $e) {
		 		
	 		die("connextion impossible! " . utf8_encode($e->getMessage()));
		}
	}

	public function coreModelCount($tab = null) {

		try {	
			if($tab == null) {
				//$table = DB_PREFIX . $_GET['module'];
				$table = DB_PREFIX . $this->module;
			 } else {
			 	$table = DB_PREFIX . $tab;
			 }
				$query = "SELECT count(*) AS nombre
										FROM " . $table;

				$req = $this->pdo->prepare($query);
				$req ->execute();
				$req->setFetchMode(PDO::FETCH_ASSOC);
				$this->data = $req->fetch();
				$req->closeCursor();

				return $this->data["nombre"];

		} catch (Exception $e) {
			return false;
		}
	}

	public function coreModelAll($options = array())
	{
		try {	
		
			if(!isset($options['table'])) {

				//$table = DB_PREFIX . $_GET['module'];
				$table = DB_PREFIX . $this->module;
			 } else {
			 	$table = DB_PREFIX . $options['table'];
			 }
			
				$query = "SELECT ";

				if(isset($options['columns'])) {
					$query .= $options['columns'];
				} else {
					$query .= "*";
				}
					$query .= " FROM " . $table;

				if(isset($options['where'])) {

					$query .= " WHERE " . $options['where'];

				}

				if(isset($options['order_column'])) {
					$query .= ' order by ' . $options['order_column'];
				}

				if(isset($options['order_direction'])) {
					$query .= ' ' . $options['order_direction'];
				}
										

				$req = $this->pdo->prepare($query);
				$req ->execute();
				$req->setFetchMode(PDO::FETCH_ASSOC);
				$this->data = $req->fetchAll();
				$req->closeCursor();

				return $this->data;

		} catch (Exception $e) {
			return false;
		}
	}
	 public function coreDelete($options = array()) {
    
      try {
        
        if (!isset($options['table'])) {
          $table = DB_PREFIX . $this->module;
        } else {
          $table = DB_PREFIX . $options['table'];
        }
        $query = "DELETE
                  FROM " . $table;
        if (isset($options['column'])) {
          if (!isset($options['value'])) {
            return false;
          }
          $query .= " WHERE " . $options['column'] . "=" . $options['value'];
        }
        $req = $this->pdo->prepare($query);
        $req->execute();
        return true;
      }
      
      catch (Exception $e) {
        return false;
      }
    }





	
	
}