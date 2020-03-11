<?php

require(ROOT . "model/TakenModel.php");
//laad de model van de Taken in

function index(){
	$taken = getAllTaken();
	render('taken/index', $taken);
}
//rendert de index pagina van de taken en haalt alle taken op en geeft deze mee 

function createtaak(){
	render('taken/createtaak');
}
//rendert de creer pagina voor taken

function store(){
	createNewTaak();
	header('Location: index');
}
//stored de ingevulde gegevens en laad daarna de index pagina om het resultaat te kunnen zien

function updateTaak($id){
	$updatetaak = getTaak($id);
	render('taken/updatetaak', array("taken"=> $updatetaak));
}
//rendert de update pagina van de taken, deze geven ook alle taken mee om uit te kunnen kiezen, en update de takenlijst gebasseerd op het id dat was meegegeven

function edittaak(){
	$id = $_POST["id"];
	updateATaak($id);
	header('Location: index');
}
//update een van de taken gebasseerd op het id dat oorspronkelijk was meegegeven en gelijk staat aan de data in de database. update deze en render daarna de index pagina om het resultaat te zien

function deletetaak($id){
	$deletetaak = getTaak($id);
	render('taken/deletetaak', array("taken"=> $deletetaak));
}
//haalt het ID en andere data van een specifieke row uit de database en rendert dan de verwijder pagina met de data en id van deze specifieke row uit de database

function destroytaak(){
	$id = $_POST["id"];
	deleteATaak($id);
	header('Location: index');
}
//met het gegeven ID verwijdert de functie de data met deze id en rendert dan de index pagina om het resultaat te zien.