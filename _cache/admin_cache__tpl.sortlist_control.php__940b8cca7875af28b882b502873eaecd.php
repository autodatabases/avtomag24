<?php
$selectedItemsStr = "";
foreach ((array)$selectedValues as $id => $name) {
	$selectedItemsStr .= "<option value='".$id."'>".$name."</option>";
}
?>

<table style="border-collapse: collapse; border:0;" class="<?= $tableClassName ?> <?= $tableClassName ?>__<?= $fieldName ?>" cellpadding="0">
	<tr>
		<td style="padding: 0;">
			<select id="<?= $fieldName ?>" multiple="multiple" name="<?= $fieldName ?>[]" style="width:<?= $controlWidth ?>; height: <?=count($selectedValues)+1;?>em;">
				<?= $selectedItemsStr ?>
			</select>
		</td>
		<td align="center" valign="middle">
			<input type="button" value="&#8593;" onclick="moveOptionUp(this.form.<?= $fieldName ?>);"/><br/>
			<input type="button" value="&#8595;" onclick="moveOptionDown(this.form.<?= $fieldName ?>);"/>
		</td>
	</tr>
</table>

<script type="text/javascript">
	(function(){
		var field = window.getElementById('<?= $fieldName ?>');
		if (field) {

			// field.getValues = _=> [...field.options].map(option => option.value);
			field.getValues = function(){
				var res = [];
				for (var i in field.options) {
					if (field.options.hasOwnProperty(i)) {
						res.push(field.options[i].value)
					}
				}

				return res;
			};

			// field.form.addEventListener('submit', _=> [...field.options].map(option => option.selected = true));
			field.form.addEventListener('submit', function(){
				for (var i in field.options) {
					if (field.options.hasOwnProperty(i)) {
						field.options[i].selected = true;
					}
				}
			});
		}
	})();
</script>