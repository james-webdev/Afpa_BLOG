<?php
//on plus besoine de cette requête. on utilise la requête générique !
class Model extends appModel
{
	
/*
	public function userList()
	{
		try {	
			$query = "SELECT *
								FROM  blog_users";
							 	

			$req = $this->pdo->prepare($query);

			$req ->execute();
			
			$req->setFetchMode(PDO::FETCH_ASSOC);					

			$this->data = $req->fetchAll();

			$req->closeCursor();

			return $this->data;

		} catch (Exception $e) {
			
			return false;
		}
	}*/

	function verif_login ($form) {

		try {	
				$query ="SELECT *
									FROM blog_users
									WHERE user_login =:login
										AND user_pass =:password
										AND user_actif = 1";
										//die($query);
				$req = $this->pdo->prepare($query);

				$pass = md5($form["user_pass"]);

				$req ->bindParam(":login", $form["user_login"], PDO::PARAM_STR);
				$req ->bindParam(":password", $pass, PDO::PARAM_STR);
				
				$req ->execute();
				
				$req->setFetchMode(PDO::FETCH_ASSOC);
						

				$this->data = $req->fetch();
				
			
				$req->closeCursor();
				
				return $this->data;

		} catch (Exception $e) {
			
			return false;
		}
	}

	function register_add ($form, $token) {
	
		try {	
				$query ="INSERT INTO blog_users (user_login, user_pass, user_email, display_name, user_token) 
									VALUES ( :user_login, :user_pass, :user_email, :display_name, :user_token)";

				$req = $this->pdo->prepare($query);

				$pass = md5($form["user_pass"]);

				$req ->bindParam(":user_login", $form["user_login"], PDO::PARAM_STR);
				$req ->bindParam(":user_pass", $pass, PDO::PARAM_STR);
				$req ->bindParam(":user_email", $form["user_email"], PDO::PARAM_STR);
				$req ->bindParam(":display_name", $form["display_name"], PDO::PARAM_STR);
				$req ->bindParam(":user_token", $token, PDO::PARAM_STR);
				$req ->execute();
						
		

				return true;

		} catch (Exception $e) {
			
			return false;
		}
	}

	function confirm($token)
	{
		try {	
			$query ="UPDATE blog_users
								SET user_actif = 1,
										user_token = ''
								WHERE user_token =:token";
									
			$req = $this->pdo->prepare($query);

			$req ->bindParam(":token", $token, PDO::PARAM_STR);
			
			$req ->execute();
					
			
			return true;

		} catch (Exception $e) {
		
			return false;
		}
	}

}