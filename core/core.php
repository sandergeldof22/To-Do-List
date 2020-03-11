<?php

// Functie om een database verbinding op te zetten. Hij geeft het database object terug
function openDatabaseConnection() 
{
	$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
	
	$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);

	return $db;
}


// De render functie ontvangt het gevraagde bestandsnaam en heeft een data array als niet verplichte variabele
// Daarna worden er 3 bestanden ingeladen. De templates/header.php, jouw gewenste pagina en de templates/footer.php.
function render($filename, $data = null)
{
	if ($data) {

		foreach($data as $key => $value) {
			$$key = $value;
		}
	} 

	require(ROOT . 'view/templates/header.php');
	require(ROOT . 'view/' . $filename . '.php');
	require(ROOT . 'view/templates/footer.php');
}