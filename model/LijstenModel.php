<?php

function getAllLijsten(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Lijsten";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
} //met deze functie wordt de database geopend, selecteert hij alles van Lijsten, prepareert en executeerd de statement, Daarna haalt hij
// alle data op

function getLijst($id){
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM Lijsten WHERE id = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetch();
	return $result;
} //met deze functie wordt de database geopend, selecteert hij een specifieke lijst, gebasseerd op ID. Deze prepareert hij en executeert hij
//waarop hij daarna de resultaten ophaalt en teruggeeft

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
	}

	catch(PDOException $e){

		echo "Connection failed: " . $e->getMessage();
	}
		$conn = null;
	}
}//met deze functie wordt een nieuwe lijst gecreeerd. Nadat er gesubmit is, pakt hij de ingevulde informatie en stopt deze in variabelen,
//deze veriabelen worden ingevuld in een statement die uiteindelijk geprepareerd en geexucuteerd wordt. Indien dit niet gaat, krijg je een error

function getAllTaken(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Taken";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
} //met deze functie wordt de database geopend, selecteert hij alles van Taken, prepareert en executeerd de statement, Daarna haalt hij
// alle data op

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
		header('Location: index');
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	}
} //met deze functie wordt een lijst geupdate. Nadat er gesubmit is, pakt hij de ingevulde informatie en stopt deze in variabelen,
//deze veriabelen worden ingevuld in een statement die uiteindelijk geprepareerd en geexucuteerd wordt. Indien dit niet gaat, krijg je een error

function deleteALijst($id){
	if($_SERVER["REQUEST_METHOD"] == "POST"){

	try{
		$conn = openDatabaseConnection();
		$stmt = $conn->prepare("DELETE FROM Lijsten WHERE id = :id");
		$stmt->bindParam("id", $id);
		$stmt->execute();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	}
}// met deze functie wordt een lijst gedelete, Hij opent de database connectie, zoekt een lijst gebasseerd op een specifieke ID en prepareert en executeerd deze statement, indien dit niet gaat, krijg je een error melding

