<?php

/*
Met de route functie wordt bepaald welke controller en welke action er moet worden ingeladen
*/
function route()
{
	// Hier wordt de functie aangeroepen die de URL op splitst op het standaard seperatie teken (in PHP is dit een /)
	$url = splitUrl();
	// Er wordt een variable opgemaakt uit de URL, de eerste variabele wordt geplaatst in de key controller, de tweede wordt in de key action geplaatst. De overige worden in params geplaatst (als array)
	// Als die niet bestaat, gaat hij de standaard controller inladen, welke in config.php is aangemaakt. 
	// Hierna roept hij standaard de index functie aan.
	if (!$url['controller']) {
		require(ROOT . 'controller/' . DEFAULT_CONTROLLER . 'Controller.php');
		call_user_func('index');
	// Als dat niet het geval is, dus als er wel een controller is, kijkt hij of het bestand bestaat. 
	//	Vervolgens laad hij dat bestand in
	} elseif (file_exists(ROOT . 'controller/' . $url['controller'] . '.php')) {
		require(ROOT . 'controller/' . $url['controller'] . '.php');
		// Vervolgens wordt er gekeken of er een functie met de naam bestaat die in de key action zit. 
		if (function_exists($url['action'])) {
			// Wanneer die bestaat wordt er gekeken of je parameters hebt meegegeven bestaan. Als die bestaan worden die aan de functie meegegeven
			if ($url['params']) {
				call_user_func_array($url['action'], $url['params']);
			} else {
				// Als ze niet bestaan, wordt alleen de functie uitgevoerd
				call_user_func($url['action']);
			}
		} else {
			// Wanneer de action niet bestaat, wordt de errorpagina getoond
			require(ROOT . 'controller/ErrorController.php');
			call_user_func('error_404');
		}
	} else {
		// Wanneer de controller niet bestaat, wordt de errorpagina getoond
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');
	}
}
/*
Met deze functie worden de url's gegenereerd en teruggegeven aan de functie
*/
function splitUrl()
{
	if (isset($_GET['url'])) {

			
		// Trim haalt slashes weg

		$tmp_url = trim($_GET['url'], "/");

		// Dit haalt de vreemde karakters weg
		$tmp_url = filter_var($tmp_url, FILTER_SANITIZE_URL);

		// Met explode splits je een string op. Elk gedeelte voor de "/" wordt in een nieuwe index van een array gestopt.
		$tmp_url = explode("/", $tmp_url);

		// Hier worden op basis van de eerder opgegeven variable $tmp_url de keys controller en action gevuld
		$url['controller'] = isset($tmp_url[0]) ? ucwords($tmp_url[0] . 'Controller') : null;
		$url['action'] = isset($tmp_url[1]) ? $tmp_url[1] : 'index';

		// Die twee waarden worden uit de array gehaald
		unset($tmp_url[0], $tmp_url[1]);

		// De overige variabelen worden in de key params gestopt
		$url['params'] = array_values($tmp_url);

		// Dit wordt teruggegeven aan de functie
		return $url;	
	}	
}
