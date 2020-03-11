<div>
	<div class="col-sm-12">
	<h1 class="createtaak-titel">Voeg een nieuwe taak toe !</h1>
	<form name="createtaak" method="post" action="store">
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
		<input type="submit" name="submit">
		<input type="reset" name="reset">
	</form>
</div>
</div>