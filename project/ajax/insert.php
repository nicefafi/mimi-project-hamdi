<?php
	include('db.php');
include('function.php');


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add") {
		$image = '';
		if($_FILES["user_image"]["name"] != '') {
			$image = upload_image();
		}
		
		$statement = $connection->prepare("
			INSERT INTO users (first_name, last_name, image, email, tel, produit, adresse, ville, cp)
			VALUES (:first_name, :last_name, :image, :email, :tel, :produit, :adresse, :ville, :cp)
		");
		
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':email'	    =>	$_POST["email"],
				':tel'	      =>	$_POST["tel"],
				':produit'	  =>	$_POST["produit"],
				':adresse'	  =>	$_POST["adresse"],
				':ville'	    =>	$_POST["ville"],
				':cp'	        =>	$_POST["cp"],
				':image'		  =>	$image
			)
		);
		
		if(!empty($result)) {
			echo 'Données insérées';
		}
	}
	
	if($_POST["operation"] == "Edit") {
		$image = '';
		if($_FILES["user_image"]["name"] != '') {
			$image = upload_image();
		}
		else {
			$image = $_POST["hidden_user_image"];
		}
		
		$statement = $connection->prepare(
			"UPDATE users 
			SET first_name = :first_name,
			last_name = :last_name,
			image = :image,
			email = :email,
			tel = :tel,
			produit = :produit,
			adresse = :adresse,
			ville = :ville,
			cp = :cp
			WHERE id = :id
			"
		);
		
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':image'		  =>	$image,
				':email'	    =>	$_POST["email"],
				':tel'	      =>	$_POST["tel"],
				':produit'	  =>	$_POST["produit"],
				':adresse'	  =>	$_POST["adresse"],
				':ville'	    =>	$_POST["ville"],
				':cp'	        =>	$_POST["cp"],
				':id'			    =>	$_POST["user_id"]
			)
		);
		
		if(!empty($result)) {
			echo 'Mise à jour des données';
		}
	}
}

?>