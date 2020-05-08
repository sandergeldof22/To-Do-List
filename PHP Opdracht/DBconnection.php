<?php

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
    } //als bovenstaande code werkt, dan returnt hij de connectie anders krijg je een errormelding
	catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    	}
}

function getAllTaken(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Taken";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();

} //met deze functie wordt de database geopend, selecteert hij alles van Taken, prepareert en executeerd de statement, Daarna haalt hij
// alle data op

function getTaak($id){
	
	$id = $_GET['id'];
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM Taken WHERE id = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$conn = null;

	return $stmt->fetch();
} //met deze functie wordt de database geopend, selecteert hij een specifieke taak, gebasseerd op ID. Deze prepareert hij en executeert hij
//waarop hij daarna de resultaten ophaalt en teruggeeft

function createNewTaak(){
	$naam = $_POST["naam"];
	$beschrijving = $_POST["beschrijving"];
	$status = $_POST["status"];
	$duur = $_POST["duur"];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		try{
			$conn = openDatabaseConnection();
			$stmt = $conn->prepare("INSERT INTO Taken (naam, beschrijving, status, duur) VALUES (:naam,:beschrijving,:status,:duur)");
			$stmt->bindParam(":naam", $naam);
			$stmt->bindParam(":beschrijving", $beschrijving);
			$stmt->bindParam(":status", $status);
			$stmt->bindParam(":duur", $duur);	
			$stmt->execute();

			header("Location: taken.php");
		}

			catch(PDOException $e){

				echo "Connection failed: " . $e->getMessage();
			}
			$conn = null;
		}
} //met deze functie wordt een nieuwe taak gecreeerd. Nadat er gesubmit is, pakt hij de ingevulde informatie en stopt deze in variabelen,
//deze veriabelen worden ingevuld in een statement die uiteindelijk geprepareerd en geexucuteerd wordt. Indien dit niet gaat, krijg je een error

function updateATaak($id){
	$id = $_POST["id"];
	$naam = $_POST["naam"];
	$beschrijving = $_POST["beschrijving"];
	$status = $_POST["status"];
	$duur = $_POST["duur"];

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		try{
			$conn = openDatabaseConnection();	
			$stmt = $conn->prepare("UPDATE Taken SET naam = :naam, beschrijving = :beschrijving, status = :status, duur = :duur WHERE id = :id");
			$stmt->bindParam(":id", $id);
			$stmt->bindParam(":naam", $naam);
			$stmt->bindParam(":beschrijving", $beschrijving);
			$stmt->bindParam(":status", $status);
			$stmt->bindParam(":duur", $duur);		
			$stmt->execute();
			header('Location: taken.php');
		} 
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
			$conn = null;
		}
} //met deze functie wordt een taak geupdate. Nadat er gesubmit is, pakt hij de ingevulde informatie en stopt deze in variabelen,
//deze veriabelen worden ingevuld in een statement die uiteindelijk geprepareerd en geexucuteerd wordt. Indien dit niet gaat, krijg je een error

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
} // met deze functie wordt een taak gedelete, Hij opent de database connectie, zoekt een lijst gebasseerd op een specifieke ID en prepareert en executeerd deze statement, indien dit niet gaat, krijg je een error melding

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
		$taak_1 = $_POST["taak_1"];
		$taak_2 = $_POST["taak_2"];
		$taak_3 = $_POST["taak_3"];

	try{
		$conn = openDatabaseConnection();
		$stmt = $conn->prepare("INSERT INTO Lijsten (naam, taak_1, taak_2, taak_3) VALUES (:naam,:taak_1,:taak_2,:taak_3)");
		$stmt->bindParam(":naam", $naam);
		$stmt->bindParam(":taak_1", $taak_1);
		$stmt->bindParam(":taak_2", $taak_2);
		$stmt->bindParam(":taak_3", $taak_3);
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
		$taak_1 = $_POST["taak_1"];
		$taak_2 = $_POST["taak_2"];
		$taak_3 = $_POST["taak_3"];

	try{
		$conn = openDatabaseConnection();	
		$stmt = $conn->prepare("UPDATE Lijsten SET naam = :naam, taak_1 =:taak_1,  taak_2 = :taak_2, taak_3 = :taak_3 WHERE id = :id");
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":naam", $naam);
		$stmt->bindParam(":taak_1", $taak_1);
		$stmt->bindParam(":taak_2", $taak_2);
		$stmt->bindParam(":taak_3", $taak_3);		
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