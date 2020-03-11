<?php

function getAllLijsten(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Lijsten";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
}
//functie die een database connectie aanmaakt die in core.php al is aangemaakt. Daarna haalt deze alle data uit Lijsten op, prepared de statement en execute hem. Met fetchAl returned hij de data

function getLijst($id){
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM Lijsten WHERE id = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetch();
	return $result;
}
//functie die een specifieke lijst ophaalt, hij opent de database en pakt door middel van een query alle data uit een row van een specifiek ID, hij bind de parameter aan een variable (id) in dit geval en execute de query. uiteindelijk haalt hij door middel van fetch de data op en returned dat.

function createNewLijst(){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$naam = $_POST["naam"];
		$taak_1 = $_POST["taak_1"];
		$taak_2 = $_POST["taak_2"];
		$taak_3 = $_POST["taak_3"];
		//als de method van verzending post is, voert hij de volgende codes uit. hij stuurt de variabelen door middel van $_POST mee met de POST

try{
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("INSERT INTO Lijsten (naam, taak_1, taak_2, taak_3) VALUES (:naam,:taak_1,:taak_2,:taak_3)");
	$stmt->bindParam(":naam", $naam);
	$stmt->bindParam(":taak_1", $taak_1);
	$stmt->bindParam(":taak_2", $taak_2);
	$stmt->bindParam(":taak_3", $taak_3);
	$stmt->execute();
}
//open de database connectie en prepared de INSERT INTO queries, Daarna bind hij de variabelen aan de parameters en execute hij de query


catch(PDOException $e){

	echo "Connection failed: " . $e->getMessage();
}
	$conn = null;
}
// in geval bovende codes niet uitgevoerd konden worden stuurt hij een error

}

function getAllTaken(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Taken";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
}
//functie die een database connectie aanmaakt die in core.php al is aangemaakt. Daarna haalt deze alle data uit Taken op, prepared de statement en execute hem. Met fetchAl returned hij de data. Deze is nodig voor een <select> op de creer en update pagina


function updateALijst($id){
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$id = $_POST["id"];
		$naam = $_POST["naam"];
		$taak_1 = $_POST["taak_1"];
		$taak_2 = $_POST["taak_2"];
		$taak_3 = $_POST["taak_3"];
		//als de method van verzending post is, voert hij de volgende codes uit. hij stuurt de variabelen door middel van $_POST mee met de POST

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
	//open de database connectie en prepared de INSERT INTO queries, Daarna bind hij de variabelen aan de parameters en execute hij de query

	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	}
	// in geval bovende codes niet uitgevoerd konden worden stuurt hij een error

}

function deleteALijst($id){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//als de method van verzending post is, voert hij de volgende codes uit.
		try{
			$conn = openDatabaseConnection();
			$stmt = $conn->prepare("DELETE FROM Lijsten WHERE id = :id");
			$stmt->bindParam("id", $id);
			$stmt->execute();
		}
// opent een database connectie en prepareert de DELETE query gebasseerd op ID, hij bind de variabele aan de parameter en execute deze dan.

		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
		}
		//mocht bovenstaande codes niet lukken. geef Error
	}

