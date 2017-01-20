<?php

/*****************************************************************
 *  Contaclick 1.0.0
 *  Author and copyright (C): Marcello Vitagliano
 *  Web site: http://www.spacemarc.it
 *  License: GNU General Public License
 *
 *  This program is free software: you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License
 *  as published by the Free Software Foundation, either version 3
 *  of the License, or (at your option) any later version.
 *****************************************************************/
 
  //estensione dei file da scaricare
  $estensione = '.exe';
  
  //directory con i file di testo, compreso lo slash finale
  $counterdir = 'count/';
    
  //controllo che nell'url ci sia il nome del file da scaricare
  if (isset($_GET['name'])) {

	$nomefile = htmlentities($_GET['name']);
	
	//se il file richiesto esiste avviene il download
	if (@file_exists('../download/'.$nomefile.$estensione)) {
	  
		header('Location: ' . '../download/'.$nomefile.$estensione);
	
		//apro il file .txt relativo al download richiesto e lo incremento di 1
		
		
		// crea il nuovo oggetto DOMDocument
		$dom = new DOMDocument();

		// carica nel DOMDocument il contenuto del file XML
		$dom->loadXML(file_get_contents("../xml/database.xml"));

		// recupera un oggetto DOMElementsList che contiene tutti gli elementi con nome "title"
		$elements = $dom->getElementsByTagName("valore");

		// recupera il primo elemento del DOMElementsList
		$element = $elements->item(0);

		// cambia il valore del nodo
		$element->nodeValue = $element->nodeValue+1;


echo "<pre>";
$xmlfile = $dom->saveXML();
$dom->save('../xml/database.xml');
echo "</pre>";
	
	//se il file non esiste stampo un messaggio di errore
    } else {

		echo 'File non disponibile';
	}
} 
?>