<?php
if(isset($_POST["email"])){
	$DB = new PDO('mysql:host=####;dbname=####;charset=utf8', '####', '####');
	
	$query = $DB->prepare("SELECT * FROM followers WHERE email=:mail");
	$query->bindValue(":mail", $_POST["email"]);
	$query->execute();
	
	if($query->rowCount() == 0){
		$query = $DB->prepare("INSERT INTO followers (email, status) VALUES (:mail, 1);");
		$query->bindValue(":mail", $_POST["email"]);
		$query->execute();

		echo "success";
	}else{
		echo "already";
	}
}else{
	echo "empty";
}