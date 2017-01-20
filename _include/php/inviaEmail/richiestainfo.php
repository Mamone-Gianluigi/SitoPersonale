<?php

  // richiamo la funzione phpmailer che avrò caricato sul mio server
	require_once('class.phpmailer.php');
	
  // recupero i dati dai campi del form
  
	$to              = "mamonegianluigi@gmail.com";
    $from            = $_POST['email'];
	$subject         = $_POST['oggetto'];
	$body            = $_POST['messaggio'];
	$mail = new PHPMailer(false); 
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	
	$mail->IsSMTP(); 
	
	try {
	  $mail->Host       = "smtp.gmail.com";                    // DA PERSONALIZZARE
	  $mail->SMTPDebug  = 0;                     
	  $mail->SMTPAuth   = true;                  
	 $mail->Port       = 25;                    
	  
	  $mail->Mailer = "smtp";
	//$mail->Host = "ssl://smtp.gmail.com";
	//$mail->Port = 465;
	  $body =$body."<br/><br/><br/>Nome : ".$nome." - Cognome : ".$cognome."<br/>Email : ".$from;
	  
	  $mail->Username   = "mamonegianluigi@gmail.com";      // DA PERSONALIZZARE
	  $mail->Password   = "gigi2828";                            // DA PERSONALIZZARE
	  $mail->AddReplyTo($from, $from);
	  $mail->AddAddress($to);
	  $mail->SetFrom($from, $from);
	  $mail->AddReplyTo($from, $from);
	  $mail->Subject = $subject;
	  $mail->AltBody = $body; 
	  $mail->MsgHTML($body);
	  $ris = $mail->Send();
	} catch (phpmailerException $e) {
	  echo $e->errorMessage(); //Pretty error messages from PHPMailer
	} catch (Exception $e) {
	  echo $e->getMessage(); //Boring error messages from anything else!
	}
  
  if($ris) {
  	echo "<h2>Il tuo messaggio è stato inviato correttamente.</h2>";
  } else {
  	echo "<br /><br />Ritenta l’invio tornando alla pagina del modulo.";
  }


?>