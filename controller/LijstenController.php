<?php

require(ROOT . "model/LijstenModel.php");
//laad de model van de Lijsten in

function index(){
	$lijsten = getAllLijsten();
	render('lijsten/index', $lijsten);
}
//rendert de index pagina van de lijsten en haalt alle lijsten op en geeft deze mee 

function createlijst(){
	$taken = getAllTaken();
	render('lijsten/createlijst', array("taken"=> $taken));
}
//rendert de creer pagina voor lijsten en geeft alle taken mee om uit te kunnen kiezen

function store(){
	createNewLijst();
	header('Location: index');
}
//stored de ingevulde gegevens en laad daarna de index pagina om het resultaat te kunnen zien

function updateLijst($id){
	$updatelijst = getLijst($id);
	$taken = getAllTaken();
	render('lijsten/updatelijst', array("lijsten"=> $updatelijst, "taken"=> $taken));
}
//rendert de update pagina van de lijsten, deze geven ook alle taken mee om uit te kunnen kiezen, en update de lijst gebasseerd op het id dat was meegegeven

function editlijst(){
	$id = $_POST["id"];
	updateALijst($id);
	header('Location: index');
}
//update een van de lijsten gebasseerd op het id dat oorspronkelijk was meegegeven en gelijk staat aan de data in de database. update deze en render daarna de index pagina om het resultaat te zien

function deletelijst($id){
	$deletelijst = getLijst($id);
	render('lijsten/deletelijst', array("lijsten"=> $deletelijst));
}
//haalt het ID en andere data van een specifieke row uit de database en rendert dan de verwijder pagina met de data en id van deze specifieke row uit de database

function destroylijst(){
	$id = $_POST["id"];
	deleteALijst($id);
	header('Location: index');
}
//met het gegeven ID verwijdert de functie de data met deze id en rendert dan de index pagina om het resultaat te zien.