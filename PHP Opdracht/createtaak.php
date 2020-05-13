<?php
include "Templates/header.php";
include "DBconnection.php";

$lijsten = getAllLijsten();
?>

<div>
	<div class="col-sm-12">
	<h1 class="createtaak-titel">Voeg een nieuwe taak toe !</h1>
	<form name="createtaak" method="post" action="<?php createNewTaak() ?>">
		<div class="taak-group">
			Naam:
			<input type="text" class="inputtask" name="naam" size="100" class="taak-form" value="<?php $naam ?>">
		</div>
		<div class="taak-group">
			Beschrijving:
			<input type="text" class="inputtask" name="beschrijving" size="100" class="taak-form" value="<?php $beschrijving ?>">
		</div>
		<div class="taak-group">
			Status:
			<input type="text" class="inputtask" name="status" size="100" class="taak-form" value="<?php $status ?>">
		</div>
		<div class="taak-group">
			Duur (in minuten):
			<input type="text" class="inputtask" name="duur" size="100" class="taak-form" value="<?php $duur ?>">
		</div>
		<div class="taak-group">
			Toevoegen aan Lijst:
			<select name="lijst_id" value="<?php $lijst_id ?>">
				<?php
					foreach($lijsten as $row){
				?>
				<option class="Lijstkeuzes" value="<?php echo $row['id']?>"><?php echo $row['naam']?></option>
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