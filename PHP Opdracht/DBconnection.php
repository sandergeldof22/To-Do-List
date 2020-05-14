<?php

//Yavuz: Code ziet er goed uit, Comments zat. ik heb het gezien met en zonder framework en het werkt beide keren dus prima.


/*
Onderstaande functie opent de Database connectie door middel van PDO
*/
function openDatabaseConnection(){
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$dbname	= "To-Do-List";
	//database gegevens

	try {
    	$conn = new PDO("mysql:host=$servername;dbname=To-Do-List", $username, $password); //hij probeert een nieuwe connectie te openen met PDO
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    	return $conn;
    } //als bovenstaande code werkt, dan returnt hij de connectie, anders krijg je een errormelding
	catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    	}
}
/*
met deze functie wordt de database geopend, selecteert hij alles van Taken, prepareert en executeerd de statement, Daarna haalt hij
 alle data op
*/

function getAllTaken(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Taken";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();

} 
/*met deze functie wordt de database geopend, selecteert hij een specifieke taak, gebasseerd op ID. Deze prepareert hij en executeert hij
waarop hij daarna de resultaten ophaalt en teruggeeft
*/
function getTaak($id){
	
	$id = $_GET['id'];
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM Taken WHERE id = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$conn = null;

	return $stmt->fetch();
} 
/*
Onderstaande functie opent de Database connectie en probeert dan alleen taken te pakken waarvan de ID in Lijsten gelijk staat aan het lijst_id
(meestal wel) in Taken
*/

function getRelevantTaak(){

	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT lijst_id, naam FROM Taken WHERE lijst_id IN (SELECT id FROM Lijsten)");
	$stmt->bindParam(":id", $id);
	$stmt->bindParam(":lijst_id", $lijst_id);
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();

}
/*
Onderstaande taak creert een nieuwe taak door alle ingevulde values in de form door te geven aan de query en die deze daarna upload op de database
Hierna stuurt hij je naar de index pagina van taken. zodat de nieuwe taak zichtbaar is
*/

function createNewTaak(){
	$naam = $_POST["naam"];
	$beschrijving = $_POST["beschrijving"];
	$status = $_POST["status"];
	$duur = $_POST["duur"];
	$lijst_id = $_POST["lijst_id"];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		try{
			$conn = openDatabaseConnection();
			$stmt = $conn->prepare("INSERT INTO Taken (naam, beschrijving, status, duur, lijst_id) VALUES (:naam,:beschrijving,:status,:duur,:lijst_id)");
			$stmt->bindParam(":naam", $naam);
			$stmt->bindParam(":beschrijving", $beschrijving);
			$stmt->bindParam(":status", $status);
			$stmt->bindParam(":duur", $duur);	
			$stmt->bindParam(":lijst_id", $lijst_id);
			$stmt->execute();

			header("Location: taken.php");
		}

			catch(PDOException $e){

				echo "Connection failed: " . $e->getMessage();
			}
			$conn = null;
		}
} 
 /*met deze functie wordt een taak geupdate. Nadat er gesubmit is, pakt hij de ingevulde informatie en stopt deze in variabelen,
deze veriabelen worden ingevuld in een statement die uiteindelijk geprepareerd en geexucuteerd wordt. Indien dit niet gaat, krijg je een error
*/
function updateATaak($id){
	$id = $_POST["id"];
	$naam = $_POST["naam"];
	$beschrijving = $_POST["beschrijving"];
	$status = $_POST["status"];
	$duur = $_POST["duur"];
	$lijst_id = $_POST["lijst_id"];

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		try{
			$conn = openDatabaseConnection();	
			$stmt = $conn->prepare("UPDATE Taken SET naam = :naam, beschrijving = :beschrijving, status = :status, duur = :duur, lijst_id = :lijst_id WHERE id = :id");
			$stmt->bindParam(":id", $id);
			$stmt->bindParam(":naam", $naam);
			$stmt->bindParam(":beschrijving", $beschrijving);
			$stmt->bindParam(":status", $status);
			$stmt->bindParam(":duur", $duur);	
			$stmt->bindParam(":lijst_id", $lijst_id);	
			$stmt->execute();
			header('Location: taken.php');
		} 
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
			$conn = null;
		}
}
/* met deze functie wordt een taak gedelete, Hij opent de database connectie, zoekt een lijst gebasseerd op een specifieke ID en prepareert en executeerd deze statement, indien dit niet gaat, krijg je een error melding
*/

function deleteATaak($id){
	$id = $_GET['id'];
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		try{
			$conn = openDatabaseConnection();
			$stmt = $conn->prepare("DELETE FROM Taken WHERE id = :id");
			$stmt->bindParam("id", $id);
			$stmt->execute();
			header('Location: taken.php');
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
	}
} 

/*
//met deze functie wordt de database geopend, selecteert hij alles van Lijsten, prepareert en executeerd de statement, Daarna haalt hij
// alle data op
*/
function getAllLijsten(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Lijsten";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
} 
/*
met deze functie wordt de database geopend, selecteert hij een specifieke lijst, gebasseerd op ID. Deze prepareert hij en executeert hij waarop hij daarna de resultaten ophaalt en teruggeeft
*/
function getLijst($id){
	$id = $_GET['id'];
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM Lijsten WHERE id = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetch();
	return $result;
} 
/*
met deze functie wordt een nieuwe lijst gecreeerd. Nadat er gesubmit is, pakt hij de ingevulde informatie en stopt deze in variabelen,
deze veriabelen worden ingevuld in een statement die uiteindelijk geprepareerd en geexucuteerd wordt. Indien dit niet gaat, krijg je een error
*/
function createNewLijst(){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$naam = $_POST["naam"];
	try{
		$conn = openDatabaseConnection();
		$stmt = $conn->prepare("INSERT INTO Lijsten (naam) VALUES (:naam)");
		$stmt->bindParam(":naam", $naam);
		$stmt->execute();
		header("Location: lijsten.php");		
	}
	catch(PDOException $e){

		echo "Connection failed: " . $e->getMessage();
	}
		$conn = null;
	}
}
/*
met deze functie wordt een lijst geupdate. Nadat er gesubmit is, pakt hij de ingevulde informatie en stopt deze in variabelen,
deze veriabelen worden ingevuld in een statement die uiteindelijk geprepareerd en geexucuteerd wordt. Indien dit niet gaat, krijg je een error
*/
function updateALijst($id){
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$id = $_POST["id"];
		$naam = $_POST["naam"];

	try{
		$conn = openDatabaseConnection();	
		$stmt = $conn->prepare("UPDATE Lijsten SET naam = :naam WHERE id = :id");
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":naam", $naam);		
		$stmt->execute();
		header('Location: lijsten.php');
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	}
} 
/*
met deze functie wordt een lijst gedelete, Hij opent de database connectie, zoekt een lijst gebasseerd op een specifieke ID en prepareert en executeerd deze statement, indien dit niet gaat, krijg je een error melding
*/
function deleteALijst($id){
	$id = $_GET['id'];
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		try{
			$conn = openDatabaseConnection();
			$stmt = $conn->prepare("DELETE FROM Lijsten WHERE id = :id");
			$stmt->bindParam("id", $id);
			$stmt->execute();
			header('Location: lijsten.php');
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
	}
}
?>