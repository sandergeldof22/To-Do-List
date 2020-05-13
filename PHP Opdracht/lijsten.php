<?php
include "Templates/header.php";
include "DBconnection.php";

$data = getAllLijsten();
$task = getRelevantTaak();
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
						foreach ($task as $taak) {
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
						<td><?php echo $row["id"]?></td>
						<td><?php echo $row["naam"]?></td>
						<?php
						foreach ($task as $taak)  {
						?>	
							<td><?php echo $taak['naam']?></td>
						<?php
						}
						?>
						<td><a href="updatelijst.php?id=<?php echo $row['id'] ?>">Aanpassen</td>
						<td><a href="deletelijst.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>
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