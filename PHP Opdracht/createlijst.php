<?php
include "Templates/header.php";
include "DBconnection.php";

$data = getAllTaken();
?>

<div>
	<div class="col-sm-12">
	<h1 class="createtaak-titel">Voeg een nieuwe lijst toe !</h1>
	<form name="createlijst" method="post" action="<?php createNewLijst() ?>">
		<div class="taak-group">
			Naam:
			<input class="inputlist" type="text" name="naam" size="100" class="taak-form" value="<?php $naam ?>">
		</div>
		<input type="submit" name="submit">
		<input type="reset" name="reset">
	</form>
</div>
</div>
<?php
include "Templates/footer.php";
?>