<?php
include "header.php";
?>

<div>
	<div class="col-sm-12">
	<h1 class="createtaak-titel">Voeg een nieuwe lijst toe !</h1>
	<form name="createlijst" method="post" action="store">
		<div class="taak-group">
			Naam:
			<input class="inputlist" type="text" name="naam" size="100" class="taak-form" value="<?php $naam ?>">
		</div>
		<div class="col-sm-12">
			Kies uw eerste taak:&nbsp;
			<select name="taak_1" value="<?php $taak_1 ?>">
				<?php
					foreach($data['taken'] as $row){
				?>
				<option class="Takenkeuzes" value="<?php echo $row['naam']?>"><?php echo $row['naam']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="col-sm-12">
			Kies uw tweede taak:&nbsp;
			<select name="taak_2" value="<?php $taak_2 ?>">
				<?php
					foreach($data['taken'] as $row){
				?>
				<option class="Takenkeuzes" value="<?php echo $row['naam']?>"><?php echo $row['naam']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="col-sm-12">
			Kies uw derde taak:&nbsp;
			<select name="taak_3" value="<?php $taak_3 ?>">
				<?php
					foreach($data['taken'] as $row){
				?>
				<option class="Takenkeuzes" value="<?php echo $row['naam']?>"><?php echo $row['naam']?></option>
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
include "footer.php";
?>