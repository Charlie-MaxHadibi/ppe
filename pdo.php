	<?php
		$user = 'root';
		$pass = '';
		$dsn = 'mysql:host=localhost;dbname=ppe';
		try { 
			$dbh= new PDO($dsn, $user, $pass);
		}
		catch (PDOException $e) { // Gestion des erreurs
			print "Erreur ! :".$e->getMessage()."<br/>";
			die();
		}
	?>