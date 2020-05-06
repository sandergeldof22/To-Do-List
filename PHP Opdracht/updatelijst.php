<?php
include "Templates/header.php";
include "DBconnection.php";

$data = getAllTaken();
?>

<div >
	<div class="col-sm-12">
	<h1 class="updatetaak-title">Update Lijst</h1>
	<form name="updatelijst" method="post" action="<?php updateALijst($id) ?>">
		<input type="hidden" name="id" value="<?=$lijsten["id"] ?>">
		<div class="taak-group">
			Naam:
			<input class="inputlist" type="text" name="naam" size="100" class="taak-form" placeholder="<?php echo $lijsten["naam"];?>" value="<?php $naam ?>">
		</div>
		<div class="col-sm-12">
			Kies uw eerste taak:&nbsp;
			<select name="taak_1" value="<?php $taak_1 ?>">
				<?php
					foreach($data as $row){
				?>
				<option class="Takenkeuzes" placeholder="<?php echo $row['naam']?>" value="<?php echo $row['naam']?>"><?php echo $row['naam']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="col-sm-12">
			Kies uw eerste taak:&nbsp;
			<select name="taak_2" value="<?php $taak_2 ?>">
				<?php
					foreach($data as $row){
				?>
				<option class="Takenkeuzes" placeholder="<?php echo $row['naam']?>" value="<?php echo $row['naam']?>"><?php echo $row['naam']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="col-sm-12">
			Kies uw eerste taak:&nbsp;
			<select name="taak_3" value="<?php $taak_3 ?>">
				<?php
					foreach($data as $row){
				?>
				<option class="Takenkeuzes" placeholder="<?php echo $row['naam']?>" value="<?php echo $row['naam']?>"><?php echo $row['naam']?></option>
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