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
						<th onclick="sortTable(2)">Taak 1</th>
						<th onclick="sortTable(3)">Taak 2</th>
						<th onclick="sortTable(4)">Taak 3</th>
						<th>Aanpassen</th>
						<th>Verwijderen</th>
					</tr>
					<?php
					foreach ($data as $row) {
					?>
					<tr>
						<td><?php echo $row["id"]?></td>
						<td><?php echo $row["naam"]?></td>
						<td><?php echo $row["taak_1"]?></td>
						<td><?php echo $row["taak_2"]?></td>
						<td><?php echo $row["taak_3"]?></td>
						<td><a href="<?=URL?>lijsten/updatelijst/<?php echo $row['id'] ?>">Aanpassen</td>
						<td><a href="<?=URL?>lijsten/deletelijst/<?php echo $row['id'] ?>">Verwijderen</a></td>
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
			<a id="create-link" href="<?=URL?>lijsten/createlijst">klik om een nieuwe lijst toe te voegen !</a>
		</div>
	</div>