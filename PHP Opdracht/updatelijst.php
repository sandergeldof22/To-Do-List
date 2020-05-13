<?php
include "Templates/header.php";
include "DBconnection.php";


$lijsten = getLijst($id);
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
		<input type="submit" name="submit">
		<input type="reset" name="reset">
	</form>
</div>
</div>
<?php
include "Templates/footer.php";
?>