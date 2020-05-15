<?php
include "Templates/header.php";
include "DBconnection.php";

$data = getAllLijsten();
$task = getRelevantTaak();
$count = count($task);
$array = array();

$ids = $task[$i]["lijst_id"];

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
			<div class="lijsten-text">
				<h3>Uw huidige Lijsten:</h3>
			</div>
			<div class="lijstenlijst">
				<input type="text" id="filter" size="100" onkeyup="Filter()" placeholder="Search..">
				<table id="table_1"  class="tables" align="center" border="1">
					<tr>
						<th onclick="sortTable(0)">ID</th>
						<th onclick="sortTable(1)">Naam</th>
						<?php
							for ($i = 0; $i <= $maxvalue[0] -1; $i++){
						?>	
							<th onclick="sortTable(2)">Taken</th>
						<?php
						}
						?>
						<th>Aanpassen</th>
						<th>Verwijderen</th>
					</tr>
					<?php
					foreach ($data as $row) {
					?>
					<tr>
						<td class="task-name-id"><?php echo $row["id"]?></td>
						<td class="task-name-name"><?php echo $row["naam"]?></td>
						<?php //onderstaande code genereert vakjes voor alle taken	
							for ($i = 0; $i <= $count -1; $i++){
								$lijst_id = $task[$i]['lijst_id'];	
								$lijst_name = $task[$i]['naam'];
								if ($lijst_id == $row["id"]) {
						?>	
							<td class="task-name"><?php echo $task[$i]['naam']?></td>
						<?php	
						}			
						}		
						?>
						<td id="updatelijst"><a href="updatelijst.php?id=<?php echo $row['id'] ?>">Aanpassen</td>
						<td id="deletelijst"><a href="deletelijst.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h4>Voeg een nieuwe lijst toe:</h4>
			<a id="create-link" href="createlijst.php">klik om een nieuwe lijst toe te voegen !</a>
		</div>
	</div>
<?php
include "Templates/footer.php";
?>