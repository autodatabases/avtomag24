<div class="universal-form__subgroup">
	foreach ($carTplFields as $configField) {
		if (is_array($configField)) { ?>

			<div class="row cars-form__row">
				<div class="col-xs-12 col-sm-6 form-gr form-gr--column">
					<label class="form-gr__label" for="<?= $configField[0] ?>"><?= $carTplForm['fields'][$configField[0]]['caption'] ?></label>

					<div class="form-gr__control">
						<?= $carTplForm['fields'][$configField[0]]['html'] ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 form-gr form-gr--column">
					<label class="form-gr__label" for="<?= $configField[1] ?>"><?= $carTplForm['fields'][$configField[1]]['caption'] ?></label>

					<div class="form-gr__control">
						<?= $carTplForm['fields'][$configField[1]]['html'] ?>
					</div>
				</div>
			</div>

		<? } else if ($carTplForm['fields'][$configField]) { ?>

			<div class="row cars-form__row">
				<div class="col-xs-12 form-gr form-gr--column">
					<label class="form-gr__label" for="<?= $configField ?>"><?= $carTplForm['fields'][$configField]['caption'] ?></label>

					<div class="form-gr__control">
						<?= $carTplForm['fields'][$configField]['html'] ?>
					</div>
				</div>
			</div>

		<? }
	}
}
?><?php ;
	foreach ($carTplFields as $configField) {
		if (is_array($configField)) { ?>

			<div class="row cars-form__row">
				<div class="col-xs-12 col-sm-6 form-gr form-gr--column">
					<label class="form-gr__label" for="<?= $configField[0] ?>"><?= $carTplForm['fields'][$configField[0]]['caption'] ?></label>

					<div class="form-gr__control">
						<?= $carTplForm['fields'][$configField[0]]['html'] ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 form-gr form-gr--column">
					<label class="form-gr__label" for="<?= $configField[1] ?>"><?= $carTplForm['fields'][$configField[1]]['caption'] ?></label>

					<div class="form-gr__control">
						<?= $carTplForm['fields'][$configField[1]]['html'] ?>
					</div>
				</div>
			</div>

		<? } else if ($carTplForm['fields'][$configField]) { ?>

			<div class="row cars-form__row">
				<div class="col-xs-12 form-gr form-gr--column">
					<label class="form-gr__label" for="<?= $configField ?>"><?= $carTplForm['fields'][$configField]['caption'] ?></label>

					<div class="form-gr__control">
						<?= $carTplForm['fields'][$configField]['html'] ?>
					</div>
				</div>
			</div>

		<? }
	}
}
?><?php ;