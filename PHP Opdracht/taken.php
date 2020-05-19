<?php
include "Templates/header.php";
include "DBconnection.php";


$data = getAllTaken();
?>

	<div class="row">
		<div class="col-sm-12">
			<div class="takenlijst-text">
				<h3>Uw huidige taken:</h3>
			</div>
			<div class="takenlijst">
				<input type="text" id="filterTaak" size="100" onkeyup="FilterTaak()" placeholder="Search..">
				<table id="table_1"  class="tables" align="center" border="1" data-name="listtable">
					<tr>
						<th onclick="sortTable(0)">ID</th>
						<th onclick="sortTable(1)">Naam</th>
						<th onclick="sortTable(2)">Beschrijving</th>
						<th onclick="sortTable(3)">Status</th>
						<th onclick="sortTable(4)">Duur</th>
						<th onclick="sortTable(5)">Lijst</th>
						<th>Aanpassen</th>
						<th>Verwijderen</th>
					</tr>
					<?php
					foreach ($data as $row) {
					?>
					<tr>
						<td><?php echo $row["id"]?></td>
						<td><?php echo $row["naam"]?></td>
						<td><?php echo $row["beschrijving"]?></td>
						<td><?php echo $row["status"]?></td>
						<td><?php echo $row["duur"]?></td>
						<td><?php echo $row["lijst_id"] ?></td>
						<td><a href="updatetaak.php?id=<?php echo $row['id'] ?>">Aanpassen</td>
						<td><a href="deletetaak.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>
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
			<h4>Voeg een nieuwe taak toe:</h4>
			<a id="createtaak-link" href="createtaak.php">klik om een nieuwe taak toe te voegen !</a>
		</div>
	</div>
<?php
include "Templates/footer.php";
?>