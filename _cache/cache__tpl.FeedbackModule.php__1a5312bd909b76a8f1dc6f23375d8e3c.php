<div>
	<? if (!empty($success_message)) {

		$message = $success_message;
		$messageType = "success";
		if (!empty($message)) {
	?>
	<div class="message message_type_<?= $messageType ?>">
		<div class="message__text">
			<?= $message ?>
		</div>
	</div>
<? } ?><?php ;
	} else {

		$message = $error_message;
		$messageType = "error";
		if (!empty($message)) {
	?>
	<div class="message message_type_<?= $messageType ?>">
		<div class="message__text">
			<?= $message ?>
		</div>
	</div>
<? } ?><?php ; ?>

		<?= $feedback['validationScript'] ?>
		<form id="<?= $feedback['id'] ?>" name="<?= $feedback['name'] ?>" action="<?= $feedback['action'] ?>" method="<?= $feedback['method'] ?>" onsubmit="<?= $feedback['onsubmit'] ?>">

			<?= $feedback['fields']['date']['html'] ?>
			<?= $feedback['fields']['_prid']['html'] ?>
			<?= $feedback['fields']['subj']['html'] ?>

			<?
			$universalForm = &$feedback;
			$arConfigFields = [
				'caption',
				'email',
				'text',
			];
			?>
			<div class="col-xs-12 col-md-8">
				<? if (ADMIN_PAGE) {
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
<?php ; ?>

				<div class="form-gr form-gr_horizontal_center universal-form__row">
					<label class="form-gr__label" for="reg_hc_code">
						<?= $feedback['fields']['reg_hc_code']['caption'] ?>
					</label>
					<div class="form-gr__control form-gr__control--hc">
						<?= $feedback['fields']['reg_hc_code']['html'] ?>
					</div>
					<div class="form-gr__tooltip form-gr__tooltip--hc">
						<?= $feedback['fields']['reg_hc_image']['html'] ?>
					</div>
				</div>

				<? if (!empty($feedback['fields']['accept-politic'])) { ?>
					<div class="form-gr form-gr_horizontal_center universal-form__row">
						<div class="form-gr__label"></div>
						<div class="form-gr__control form-gr__control--checkbox">
							<?= $feedback['fields']['accept-politic']['html'] ?>
						</div>
					</div>
				<? } ?>

				<div class="form-gr form-gr_horizontal_center">
					<div class="form-gr__label"></div>
					<div class="form-gr__control">
						<?= $feedback['fields']['submit']['html'] ?>
					</div>
				</div>
			</div>
		</form>
	<? } ?>
</div>