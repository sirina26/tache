<?php
	function getBDD(){

		return new PDO("mysql:host=localhost;dbname=tache;charset=utf8", "utilisateur2", "root", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	}
?>
