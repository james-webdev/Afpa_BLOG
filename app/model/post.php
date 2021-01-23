<?php

class Model extends appModel
{

	
	public function postList($limit, $offset, $options = null)
	{
		try {	
			$query = "SELECT post_title, DATE_FORMAT(post_date,'%M %d %Y') AS date, LEFT(post_content,". POST_TR . ") AS post_content, post_img_url, post_ID, post_category, display_name, cat_descr, cat_id
								FROM blog_posts, blog_users, blog_categories
								WHERE post_author=ID 
								AND post_category= cat_id";

			if($options != null){
				$query .= " AND post_category= " . $options;
			}

			$query .=		" ORDER BY post_date DESC
							 		LIMIT :offset, :limit";

			$req = $this->pdo->prepare($query);

			$req ->bindParam(":offset", $offset, PDO::PARAM_INT);
			$req ->bindParam(":limit", $limit, PDO::PARAM_INT);
			$req ->execute();
			
			$req->setFetchMode(PDO::FETCH_ASSOC);					

			$this->data = $req->fetchAll();

			$req->closeCursor();

			return $this->data;

		} catch (Exception $e) {
			
			return false;
		}
	}

	public function postRead ($id)
	{
		try {	
			$query ="SELECT * 
							 FROM blog_posts A, blog_users B, blog_categories
							 WHERE A.post_author = B.ID 
						 		AND post_category=cat_id
						 		AND post_ID=:id";

			$req = $this->pdo->prepare($query);

			$req ->bindParam(":id", $id, PDO::PARAM_INT);
			
			$req ->execute();
			
			$req->setFetchMode(PDO::FETCH_ASSOC);
					

			$this->data = $req->fetch();

			$req->closeCursor();

			return $this->data;

		} catch (Exception $e) {
			
			return false;
		}
	}

	public function commentListByPost($id_article)
	{
		try {	
				$query = "SELECT comment_content, display_name, DATE_FORMAT(comment_date,'%M %d %Y') AS date
										FROM blog_users, blog_comments
										WHERE comment_author=ID
										  AND comment_post_ID=:id_article
										ORDER BY date DESC";

				$req = $this->pdo->prepare($query);

				$req ->bindParam(":id_article", $id_article, PDO::PARAM_INT);
				
				$req ->execute();
				
				$req->setFetchMode(PDO::FETCH_ASSOC);
						

				$this->data = $req->fetchAll();
				
				
				$req->closeCursor();

				return $this->data;

		} catch (Exception $e) {
			
			return false;
		}
	}
}