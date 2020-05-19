<?php
include "Templates/header.php";
include "DBconnection.php";

$data = getAllLijsten();
$task = getRelevantTaak();
$count = count($task);
$array = array();

$ids = $task[$i]["lijst_id"];



//onderstaande code pusht alle taken in een array
for ($i = 0; $i <= $count -1; $i++){
	$counter = $task[$i][0];	
	array_push($array, $task[$i][0]);
	$values = array_count_values($array);
}
	arsort($values);
	$maxvalue = array_values($values);
?>

	<div class="row">
		<div class="col-sm-12">
			<h4>Voeg een nieuwe lijst toe:</h4>
			<a id="create-link" href="createlijst.php">klik om een nieuwe lijst toe te voegen !</a>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-12">
			<input type="text" id="filter" size="100" onkeyup="Filter()" placeholder="Search..">			
		</div>	
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="lijsten-text">
				<h3>Uw huidige Lijsten:</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="lijstenlijst">
			<?php
				for ($i = 0; $i <= $counter -1; $i++){
			?>
				<table id="table"  class="tables" align="center" border="1" data-name="mytable">
				<tr>
					<th onclick="sortTable(0)">ID</th>
					<th onclick="sortTable(1)">Naam</th>
					<th onclick="sortTable(2)">Taken</th>
					<th>Aanpassen</th>
					<th>Verwijderen</th>
				</tr>
				<tr>
					<td class="task-naam-id"><?php echo $data[$i]["id"]?></td>	
					<td class="task-naam-name"><?php echo $data[$i]["naam"]?></td>
					<td class="task-name">
						<?php
							$lijst_id = $task[$j]["lijst_id"];
							$lijst_name = $task[$j]['naam'];
						for ($j = 0; $j <= $count; $j++){
								if ($task[$j]["lijst_id"] == $i +1){
								echo $task[$j]['naam'];
								echo '<br>';
							}
							?>
						<?php
							}
						?>
					</td>
					<td id="updatelijst"><a href="updatelijst.php?id=<?php echo $row['id'] ?>">Aanpassen</td>
					<td id="deletelijst"><a href="deletelijst.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>				
				</tr>
			<?php
				}
			?>
			</div>
		</div>
	</div>
<?php
include "Templates/footer.php";
?>