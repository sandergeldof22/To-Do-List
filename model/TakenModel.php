<?php

function getAllTaken(){

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM Taken";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
}
//functie die een database connectie aanmaakt die in core.php al is aangemaakt. Daarna haalt deze alle data uit Taken op, prepared de statement en execute hem. Met fetchAl returned hij de data

function getTaak($id){
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM Taken WHERE id = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetch();
	return $result;
}
//functie die een specifieke taak ophaalt, hij opent de database en pakt door middel van een query alle data uit een row van een specifiek ID, hij bind de parameter aan een variable (id) in dit geval en execute de query. uiteindelijk haalt hij door middel van fetch de data op en returned dat.

function createNewTaak(){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$naam = $_POST["naam"];
		$beschrijving = $_POST["beschrijving"];
		$status = $_POST["status"];
		$duur = $_POST["duur"];
		//als de method van verzending post is, voert hij de volgende codes uit. hij stuurt de variabelen door middel van $_POST mee met de POST

try{
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("INSERT INTO Taken (naam, beschrijving, status, duur) VALUES (:naam,:beschrijving,:status,:duur)");
	$stmt->bindParam(":naam", $naam);
	$stmt->bindParam(":beschrijving", $beschrijving);
	$stmt->bindParam(":status", $status);
	$stmt->bindParam(":duur", $duur);	
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

function updateATaak($id){
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$id = $_POST["id"];
		$naam = $_POST["naam"];
		$beschrijving = $_POST["beschrijving"];
		$status = $_POST["status"];
		$duur = $_POST["duur"];
		//als de method van verzending post is, voert hij de volgende codes uit. hij stuurt de variabelen door middel van $_POST mee met de POST

	try{
		$conn = openDatabaseConnection();	
		$stmt = $conn->prepare("UPDATE Taken SET naam = :naam, beschrijving = :beschrijving, status = :status, duur = :duur WHERE id = :id");
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":naam", $naam);
		$stmt->bindParam(":beschrijving", $beschrijving);
		$stmt->bindParam(":status", $status);
		$stmt->bindParam(":duur", $duur);		
		$stmt->execute();
		header('Location: index');
	}
	//open de database connectie en prepared de UPDATE queries gebasseerd op gebruikt ID, Daarna bind hij de variabelen aan de parameters en execute hij de query. Daarna stuurt verwijst hij je naar de index om het nieuwe resultaat te zien
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	}
	// in geval bovende codes niet uitgevoerd konden worden stuurt hij een error
}

function deleteATaak($id){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//als de method van verzending post is, voert hij de volgende codes uit.
		try{
			$conn = openDatabaseConnection();
			$stmt = $conn->prepare("DELETE FROM Taken WHERE id = :id");
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
