<?php
include "Templates/header.php";
include "DBconnection.php";

$lijsten = getLijst($id);
?>

<div>
	<div class="col-sm-12">
	<h1 class="deletetaak-titel">Verwijder Lijst</h1>
	<form name="deletelijst" method="post" action="<?php deleteALijst($id) ?>">
		<input type="hidden" name="id" value="<?=$lijsten["id"] ?>">
		<h2 id="deletetaak-text">Weet je zeker dat je klaar bent met <?php echo $lijsten['naam'];?> en deze wilt verwijderen?</h2>
		<button type="submit" id="deletetaak-button">Verwijder <?php echo $lijsten['naam'];?></button>
	</form>
</div>
</div>
<?php
include "Templates/footer.php";
?>