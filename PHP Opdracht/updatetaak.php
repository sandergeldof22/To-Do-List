<?php
include "Templates/header.php";
include "DBconnection.php";

$taken = getTaak($id);
$lijsten = getAllLijsten();
?>

<div>
	<div class="col-sm-12">
	<h1 class="updatetaak-title">Update Taak</h1>
	<form name="updatetaak" method="post" action="<?php updateATaak($id) ?>">
		<input type="hidden" name="id" value="<?=$taken["id"] ?>">
		<div class="taak-group">
			Naam:
			<input type="text" class="inputtask" name="naam" size="100" class="taak-form" placeholder="<?php echo $taken["naam"];?>" value="<?php $naam ?>">
		</div>
		<div class="taak-group">
			Beschrijving:
			<input type="text" name="beschrijving" size="100" class="taak-form" placeholder="<?php echo $taken["beschrijving"];?>" value="<?php $beschrijving ?>">
		</div>
		<div class="taak-group">
			Status:
			<input type="text" name="status" size="100" class="taak-form" placeholder="<?php echo $taken["status"];?>" value="<?php $status ?>">
		</div>
		<div class="taak-group">
			Duur (in minuten):
			<input type="text" name="duur" size="100" class="taak-form" placeholder="<?php echo $taken["duur"];?>" value="<?php $duur ?>">
		</div>
		<div class="taak-group">
			Toevoegen aan Lijst:
			<select name="lijst_id" value="<?php $lijst_id ?>">
				<?php
					foreach($lijsten as $row){
				?>
				<option class="Lijstkeuzes" placeholder="<?php echo $row['naam']?>" value="<?php echo $row['id']?>"><?php echo $row['naam']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<input type="submit" name="submit">
		<input type="reset" name="reset">
	</form>
</div>
</div>
<?php
include "Templates/footer.php";
?>