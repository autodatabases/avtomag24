<h1><?= $MSG['PersonalInfoModule']['msg45'] ?></h1>

<div class="row">
	<div class="col-xs-12 col-md-8 col-lg-6">
		<?= $personal['validationScript'] ?>
		<form id="<?= $personal['id'] ?>" name="<?= $personal['name'] ?>" action="<?= $personal['action'] ?>" method="<?= $personal['method'] ?>" onsubmit="<?= $personal['onsubmit'] ?>">
			<div class="universal-form__subgroup">
				<?
				$arConfigFields = [
					'userpassword_old',
					'userpassword_new',
					'userpassword_new_repeat',
				];
				$universalFormConfig['secondw'] = true;
				$universalForm = &$personal;
				if (ADMIN_PAGE) {
	//должны быть определены переменные $arConfigFields и $universalForm ?>
<? foreach ($arConfigFields as $configField) { ?>
	<? if (is_array($configField)) { ?>
		<? foreach ($configField as $subKey => $subField) { ?>
			<? if (!$universalForm['fields'][$subField]) { ?>
				<? unset($configField[$subKey]); ?>
			<? } ?>
		<? } ?>
		<? if (empty($configField)) { ?>
			<? continue; ?>
		<? } ?>
		<? if (count($configField) == 1) { ?>
			<? $configField = array_pop($configField); ?>
		<? } else { ?>
		<? } ?>
	<? } ?>
	<? if (is_array($configField)) { ?>
		<tr id="tr_is_<?=$configField?>">
			<td class="fname"><?= $universalForm['fields'][$configField[0]]['caption'] ?>, <?=$universalForm['fields'][$configField[1]]['caption']?></td>
			<td class="fvalue">
				<table>
					<tr>
						<td class="fvalue_child"><?= $universalForm['fields'][$configField[0]]['html'] ?></td>
						<td class="fvalue_child"><?= $universalForm['fields'][$configField[1]]['html'] ?></td>
					</tr>
				</table>
			</td>
		</tr>
	<? } else { ?>
		<? if ($universalForm['fields'][$configField]) { ?>
			<tr id="tr_<?=$configField?>">
				<td class="fname"><?= $universalForm['fields'][$configField]['caption'] ?></td>
				<td class="fvalue"><?= $universalForm['fields'][$configField]['html'] ?></td>
			</tr>
		<? } ?>
	<? } ?>
<? } ?>
<?php ;
} else {
	$secondw = false;
	if (isset($arConfigFields) && isset($universalForm)) {
		if(isset($universalFormConfig)) {
			if($universalFormConfig['secondw'] == true) {
				$secondw = true;
			}
		};
		foreach ($arConfigFields as $configField) {
			if (is_array($configField)) {
				foreach ($configField as $subKey => $subField) {
					if (!$universalForm['fields'][$subField]) {
						unset($configField[$subKey]);
					}
				}
				if (empty($configField)) {
					continue;
				}
				if (count($configField) == 1) {
					$configField = array_pop($configField);
				}
			}

			if (is_array($configField)) { ?>
				<div id="tr_is_<?= $configField ?>">
					<div class="form-gr <?=$secondw?'form-gr--secondw ':' '?>form-gr_horizontal_center universal-form__row">
						<label for="<?= $configField[0] ?>" class="form-gr__label"><?= $universalForm['fields'][$configField[0]]['caption'] ?></label>
						<div class="form-gr__control<?=$universalForm['fields'][$configField[0]]['instance_name'] == 'CheckBox'?' form-gr__control--checkbox':''?>"><?= $universalForm['fields'][$configField[0]]['html'] ?></div>
					</div>
					<div class="form-gr <?=$secondw?'form-gr--secondw ':' '?>">
						<label class="form-gr__label" for="<?= $configField[1] ?>"><?= $universalForm['fields'][$configField[1]]['caption'] ?></label>
						<div class="form-gr__control<?=$universalForm['fields'][$configField[1]]['instance_name'] == 'CheckBox'?' form-gr__control--checkbox':''?>"><?= $universalForm['fields'][$configField[1]]['html'] ?></div>
					</div>

				</div>
			<? } else if ($universalForm['fields'][$configField]) {
				$field = $universalForm['fields'][$configField];
				?>
				<div id="tr_<?= $configField ?>" class="form-gr <?= $secondw ? 'form-gr--secondw ' : ' ' ?>form-gr_horizontal_center universal-form__row <? if ($field['hidden']) { ?>hidden<? } ?>">
				<label for="<?= $configField ?>" class="form-gr__label"><?= $field['caption'] ?></label>
					<div class="form-gr__control<?=$field['instance_name'] == 'CheckBox'?' form-gr__control--checkbox':''?>"><?= $field['html'] ?></div>
				</div>
			<? }
		}
	}
}
?>
<?php ;
				?>
				<div class="form-gr form-gr--secondw form-gr_horizontal_center">
					<div class="form-gr__label"></div>
					<div class="form-gr__control"><?= $personal['fields']['save_password']['html'] ?></div>
				</div>
			</div>

			<?= $personal['fields']['subj']['html'] ?>
			<?= $personal['fields']['_prid']['html'] ?>

		</form>
	</div>
</div>