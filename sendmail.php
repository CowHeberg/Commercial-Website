<?php
if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["telephone"]) || empty($_POST["message"])){
	echo "Empty";
}else{
	 $subject = "[Site Commercial] " . $_POST['name'] . " a laissé un message";
	
	 $template = file_get_contents("template.html");
	 
	 $searchReplace = array(
    	'%message%' => $_POST["message"],
     );
 
	 $search  = array_keys($searchReplace);
	 $replace = array_values($searchReplace);
 
     $body = str_replace($search, $replace, $template);

	 $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     $headers .= 'To: Cow-Contact <contact@cow-heberg.fr>' . "\r\n";
     $headers .= 'From: ' . $_POST["name"] . ' <' . $_POST["email"] . '>' . "\r\n";
	
	if(mail("contact@cow-heberg.fr", $subject, $body, $headers)){
		echo "Sended";
	}else{
		echo "Error";
	}
}