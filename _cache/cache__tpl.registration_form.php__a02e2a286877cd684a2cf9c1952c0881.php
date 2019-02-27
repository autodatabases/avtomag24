<h1><?= $MSG['PersonalInfoModule']['msg44'] ?></h1>

<? if ($_interface->csRestrictDataChange == true) { ?>
	<div class="message message_type_info">
		<div class="message__text">
			<?= $MSG['PersonalInfoModule']['msg48'] ?>
		</div>
	</div>
<? } ?>

<div class="row personal-info-registration__row">
	<div class="col-xs-12 col-md-8 col-lg-9">

		<? if ($_interface->csRestrictDataChange != true) { ?>

			<?= $registration['validationScript'] ?>
			<form id="<?= $registration['name'] ?>" name="<?= $registration['name'] ?>" action="<?= $registration['action'] ?>" method="<?= $registration['method'] ?>" onsubmit="<?= $registration['onsubmit'] ?>">

			<?= $registration['fields']['subj']['html'] ?>
			<?= $registration['fields']['_prid']['html'] ?>

			<?
				//хак чтобы проходил валидацию телефон
				$__BUFFER->AddJsInit("
					if(typeof window.registrationFormValidate != `undefined`) {
						window.registrationFormValidate.ajaxCheck = function(field, type) {
							if(field.name === 'contact_phone' && type === 'checkUserDB') {
								this.onElementSuccess(field);
							} else {
								this.__proto__.ajaxCheck(field, type);
							}
						};
					}
				");
			?>

		<? } else {

			foreach($registration['fields'] as $key => $field) {
				if(isset($registration['sourceFields'][$key]['instance'])) {
					if(!empty($registration['sourceFields'][$key]['instance']->value)) {
						if (is_array($registration['sourceFields'][$key]['instance']->value)) {
							$val = $registration['sourceFields'][$key]['instance']->value[0];
							$registration['fields'][$key]['html'] = $registration['object']->getFieldInstanceByName($key)->items[$val];
						} else {
							$registration['fields'][$key]['html'] = $registration['sourceFields'][$key]['instance']->value;
						}
					} else if(!empty($registration['sourceFields'][$key]['instance']->items[$registration['sourceFields'][$key]['instance']->value[0]])) {
						$registration['fields'][$key]['html'] = $registration['sourceFields'][$key]['instance']->items[$registration['sourceFields'][$key]['instance']->value[0]];
					} else {
						$registration['fields'][$key]['html'] = '';
					}
				}
			}

		 } ?>

		<? if ($registration['fields']['is_organization']['html']) { ?>
	<div class="form-gr form-gr_horizontal_center registration__is-organization">
		<div class="form-gr__subtitle">
			<?= tr('Регистрируюсь как', 'RegistrationModule'); ?>
		</div>
		<div class="form-radio-buttons form-gr__control">
			<?= $registration['fields']['is_organization']['html'] ?>
		</div>
	</div>
<? } ?>

<div class="universal-form__subgroup">

	<? if ($registration['fields']['company'] && $eshopClient->is_organization === 'Y') { ?>
		<div id="companyName">
			<div class="form-gr form-gr_horizontal_center registration-form__row">
				<label class="form-gr__label" for="company">
					<?= $registration['fields']['company']['caption'] ?>
				</label>

				<div class="form-gr__control">
					<?= $registration['fields']['company']['html'] ?>
				</div>
			</div>
		</div>
	<? } ?>

	<? if ($hideContactFields != 1) { ?>
		<? $arConfigFields = [
	'add_country_id',
	'add_region_id',
	'add_city_id',
	'contact_first_name',
	'contact_surname',
	'contact_patronymic_name',
	'contact_phone',
	'mobile_phone',
	'cst_email',
	'cst_icq',
	'cst_skype',
];
?><?php ; ?>
		<? $universalForm = &$registration; ?>
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
	<? } ?>
</div><?php ; ?>

		<? if ($_interface->csRestrictDataChange != true) { ?>

				<div class="universal-form__subgroup">

					<div class="form-gr form-gr_horizontal_center">
						<div class="form-gr__label"></div>
						<div class="form-gr__control"><?= $registration['fields']['register']['html'] ?></div>
					</div>

				</div>

			</form>

		<? } ?>
	</div>
	<div class="col-xs-12 col-md-4 col-lg-3">
		<div class="info-box info-box--block">
			<div class="info-box__text">
				<div class="info-box__dat"><strong><?= $MSG['PersonalInfoModule']['msg49'] ?></strong></div>
				<div class="info-box__dat"><?=($stockInfo['fullname'] ? $stockInfo['fullname'] : $stockInfo['login'])?></div>
			</div>
			<a class="btn" href="mailto:<?= $stockInfo['email'] ?>"><?= $MSG['PersonalInfoModule']['msg50'] ?></a>
		</div>
	</div>
</div>