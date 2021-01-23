<?php
	
	/**
	 * 
	 */
	class Mail 
	{
		private $_nom_expediteur;
		private $_mail_expediteur;
		private $_mail_replyto;
		private $_mails_destinataires;
		private $_mails_bcc;
		private $_objet;
		private $_texte;
		private $_html;
		private $_fichiers;

		private $_message;
		private $_frontiere;
		private $_headers;


		public function __construct($mail_expediteur, $nom_expediteur, $mail_replyto)
		{
			if(!self::_validateEmail($mail_expediteur))	{
				throw new InvalidArgumentException("Mail expéditeur invalide !", 1);
				
			}
			if(!self::_validateEmail($mail_replyto))	{
				throw new Exception("Mail replyto invalide !", 2);
				//ne deroule plus le code après, si y a problème.
			}

			$this->_nom_expediteur = $nom_expediteur;
			$this->_mail_expediteur = $mail_expediteur;			
			$this->_mail_replyto = $mail_replyto;
			$this->_mails_destinataires = "";
			$this->_mails_bcc = "";
			$this->_objet = "";
			$this->_texte = "";
			$this->_html = "";
			$this->_fichiers = "";
			$this->_message = "";
			$this->_frontiere =md5(uniqid(mt_rand()));
			$this->_headers = "";
		}

		private static function _validateEmail($email)
		{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

				return false;

			} else {

				return true; //si on dit pas returne true, il nous indique adresse email
			}
		}

		public function ajouter_destinataire ($mail)
		{
			if(!self::_validateEmail($mail))	{

				throw new InvalidArgumentException("Mail expéditeur invalide !", 3);
				
			}
			if($this->_mails_destinataires == "" )	{
				
				$this->_mails_destinataires = $mail;
			
			} else {
				$this->_mails_destinataires .= "," . $mail;
			}
		}

		public function ajouter_bcc ($mail)
		{
			if(!self::_validateEmail($mail))	{
				
				throw new InvalidArgumentException("Mail expéditeur invalide !", 4);
				
			}
			if($this->_mails_bcc == "" )	{
				
				$this->_mails_bcc = $mail;
			
			} else {
				$this->_mails_bcc .= "," . $mail;
			}
		}

		public function ajouter_pj ($fichier)
		{
			if(!file_exists($fichier))	{
				
				throw new InvalidArgumentException("Pièce jointe inexistante !", 5);
				
			}
			if($this->_fichiers == "" )	{
				
				$this->_fichiers = $fichier;
			
			} else {
				$this->_fichiers .= "," . $fichier;
			}
		}

		public function contenu ($objet, $texte, $html)
		{
			$this->_objet = $objet;
			$this->_texte = $texte;
			$this->_html = $html;
		}

		public function envoyer ()
		{
			$this->_headers = 'From: "' . $this->_nom_expediteur . '" <' . $this->_mail_expediteur . '>' . "\n";
			$this->_headers .= 'Return-Path: <' . $this->_mail_replyto . '>' . "\n";
			$this->_headers .= 'MIME-Version: 1.0'."\n";

			if($this->_mails_bcc !=""){

				$this->_headers .= "Bcc: ".$this->_mails_bcc."\n";
			}

			$this->_headers .='Content-Type: multipart/mixed; boundary="'.$this->_frontiere.'"';

			if($this->_texte !="") {
				$this->_message .= '--'.$this->_frontiere."\n";
				$this->_message .= 'Content-Type: text/plain; chartset="utf-8"'."\n";
				$this->_message .= 'Content-Transfer-Encoding: 8bit'."\n\n";//kekkou daiji kono slash n futatsu
				$this->_message .= $this->_texte."\n\n";
			}

			if($this->_html !="") {
				$this->_message .= '--'.$this->_frontiere."\n";
				$this->_message .= 'Content-Type: text/html; chartset="utf-8"'."\n";
				$this->_message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
				$this->_message .= $this->_html."\n\n";
			}

			if($this->_fichiers !="") {

				$tab_fichiers = explode(',', $this->_fichiers);
				$nb_fichiers = count($tab_fichiers);
				var_dump($tab_fichiers);

				$extensions = array(".jpg", ".jpeg", ".gif", ".png", ".pdf", ".doc", ".docx");

				for ($i=0; $i<$nb_fichiers; $i++){
					$mime = mime_content_type($tab_fichiers[$i]);

					$position = strrpos($tab_fichiers[$i], ".");

					$ext = substr($tab_fichiers[$i], $position);

					var_dump($ext);

					if($mime && in_array($ext, $extensions)) {

					$this->_message .= '--' . $this->_frontiere . "\n";
					$this->_message .= 'Content-Type:' . $mime . '; name="' . $tab_fichiers[$i] . '"'."\n";
					$this->_message .= 'Content-Transfer-Encoding: base64' . "\n";
					$this->_message .= 'Content-Disposition:attachement; filename="' . $tab_fichiers[$i] . '"' . "\n\n";
					$this->_message .= chunk_split(base64_encode(file_get_contents($tab_fichiers[$i]))) . "\n\n";
 					}
				}


			}
			if(!mail($this->_mails_destinataires, $this->_objet, $this->_message, $this->_headers)) 
				//mail($this->_mails_destinataires, $this->_objet, $this->texte)== false <- to onaji koto
			{
				throw new Exception("Envoi de mail échoué !");
				
			}
		}


 
	}