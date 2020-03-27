
<section id="formulaire">
		<form name="ChercheVelo" action="index.php" method="get">
			<fieldset>
				<legend>Une nouvelle recherche</legend>
					<label for="nom" style="vertical-align: middle">Nom:</label>
					<input type="text" class="txtNom" name="nom"><br/>
					<label for="commune" style="vertical-align: middle">Commune:</label>
					<input type="text" class="txtNom" name="commune"><br/>
					<label for="veloDispo" style="vertical-align: middle">nombre de vélos disponible:</label>
					<input type="textPd" class="txtNom" name="veloDispo"><br/>
					<label for="placeDispo" style="vertical-align: middle">Nombre de places libres disponible:</label>
					<input type="text" class="txtNom" name="placeDispo"><br/>
					<select name="etat">
						<option value="EN SERVICE">EN SERVICE</option>
						<option value="HORS SERVICE">HORS SERVICE</option>
					</select>
					
			</fieldset>
			<div id="validation">
				<button type="reset">Effacer</button>
				<button type="submit" name="valid" value="ok">Valider</button>
			</div>
		</form>
</section>

