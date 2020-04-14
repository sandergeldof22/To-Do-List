<?php

require(ROOT . "model/TakenModel.php");
/*
roepts met een functie alle taken op en geeft dit mee aan de index
*/
function index(){
	$taken = getAllTaken();
	render('taken/index', $taken);
} 
/*
roepts met een functie alle taken op en geeft dit mee aan de create pagina
*/
function createtaak(){
	render('taken/createtaak');
} 
/*
met een functie stoppen ze alle ingevulde informatie in naar de database
*/
function store(){
	createNewTaak();
	header('Location: index');
} 
/*
roepts met een functie alle taken op en geeft dit mee aan de update pagina
*/
function updateTaak($id){
	$updatetaak = getTaak($id);
	render('taken/updatetaak', array("taken"=> $updatetaak));
} 
/*
update de ingevulde informatie en add dit in de database, Daarna gaan we terug naar de index pagina
*/
function edittaak(){
	$id = $_POST["id"];
	updateATaak($id);
	header('Location: index');
} 
/*
haalt een specifieke taak op en geeft deze mee aan de delete pagina
*/
function deletetaak($id){
	$deletetaak = getTaak($id);
	render('taken/deletetaak', array("taken"=> $deletetaak));
} 
/*
haalt een specifieke id op van een taak en verwijderd deze uit de database, vervolgens gaat hij terug naar de index pagina
*/
function destroytaak(){
	$id = $_POST["id"];
	deleteATaak($id);
	header('Location: index');
} 