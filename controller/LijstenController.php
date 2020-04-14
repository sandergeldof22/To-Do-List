<?php

require(ROOT . "model/LijstenModel.php");

/*
roepts met een functie alle lijsten op en geeft dit mee aan de index
*/
function index(){
	$lijsten = getAllLijsten();
	render('lijsten/index', $lijsten);
} 
/*
roepts met een functie alle taken op en geeft dit mee aan de create pagina
*/
function createlijst(){
	$taken = getAllTaken();
	render('lijsten/createlijst', array("taken"=> $taken));
} 
/*
met een functie stoppen ze alle ingevulde informatie in naar de database
*/
function store(){
	createNewLijst();
	header('Location: index');
} 
/*
roepts met een functie alle lijsten en taken op en geeft dit mee aan de update pagina
*/
function updateLijst($id){
	$updatelijst = getLijst($id);
	$taken = getAllTaken();
	render('lijsten/updatelijst', array("lijsten"=> $updatelijst, "taken"=> $taken));
} 
/*
update de ingevulde informatie en add dit in de database, Daarna gaan we terug naar de index pagina
*/
function editlijst(){
	$id = $_POST["id"];
	updateALijst($id);
	header('Location: index');
} 
/*
haalt een specifieke lijst op en geeft deze mee aan de delete pagina
*/
function deletelijst($id){
	$deletelijst = getLijst($id);
	render('lijsten/deletelijst', array("lijsten"=> $deletelijst));
} 

/*
haalt een specifieke id op van een lijst en verwijderd deze uit de database, vervolgens gaat hij terug naar de index pagina
*/
function destroylijst(){
	$id = $_POST["id"];
	deleteALijst($id);
	header('Location: index');
} 