<?php
include "Templates/header.php";
include "DBconnection.php";
?>

<div>
	<div class="col-sm-12">
	<h1 class="deletetaak-titel">Verwijder Taak</h1>
	<form name="deletetaak" method="post" action="../destroytaak">
		<input type="hidden" name="id" value="<?=$taken["id"] ?>">
		<h2 id="deletetaak-text">Weet je zeker dat je klaar bent met <?php echo $taken['naam'];?> en deze wilt verwijderen?</h2>
		<button type="submit" id="deletetaak-button">Verwijder <?php echo $taken['naam'];?></button>
	</form>
</div>
</div>
<?php
include "Templates/footer.php";
?>