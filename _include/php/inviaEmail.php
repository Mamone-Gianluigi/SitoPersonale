<?php
 
	 	
		$destinatario  = "infomamonegianluigi@gmail.com";
		$nome = $_POST["nome"];
		$cognome = $_POST["cognome"];
		$email = $_POST["email"];
		$oggetto = $_POST["oggetto"];
		$messaggio = $_POST["messaggio"];
		$headers = 'From: '.$email. "\r\n" .
		'CC:'.$email. "\r\n" .
           'Reply-To: '.$email. "\r\n" .
           'X-Mailer: PHP/' . phpversion();
		mail($destinatario, $oggetto, $messaggio, $headers);
	
		header("location: ../../conferma.html"); 


	?>
	
	