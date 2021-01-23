<?php

class Model extends appModel
{
	public function commentDelete ($id)
	{
		try {	
			$query ="DELETE FROM blog_comments 
							WHERE comment_ID = :id";

			$req = $this->pdo->prepare($query);

			$req ->bindParam(":id", $id, PDO::PARAM_INT);
			
			$req ->execute();
			
			return true;

		} catch (Exception $e) {
			
			return false;
		}
	}
}