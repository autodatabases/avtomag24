<? if ($car_form['fields']['select_csc_id']) { ?>		<div class="universal-form__subgroup">			<div class="cars-form__row">				<div class="form-gr form-gr_horizontal_center">					<label class="form-gr__label" for="csc_id"><?= $car_form['fields']['select_csc_id']['caption'] ?></label>					<div class="form-gr__control">						<?= $car_form['fields']['select_csc_id']['html'] ?>					</div>				</div>			</div>		</div><? } ?>	<div id="form_add">		<?		 /***/?><div class="universal-form__subgroup">	<div class="universal-form__group-title"><?= tr("Основные сведения", "VinRequestModule") ?></div>	<?	$carTplForm = &$car_form;	$carTplFields = [		'vin',		['crb_id', 'crm_id'],		['car_year', 'crmf_id']	];	if (isset($carTplFields) && isset($carTplForm)) {
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
?><?php ;	?></div><div class="universal-form__subgroup">	<button id="cars-details-form-button" type="button" class="universal-form__group-title universal-form__group-title--expanded" area-controls="cars-details-form"><?= tr("Подробные сведения", "VinRequestModule") ?></button>	<div id="cars-details-form" class="area-collapsed-mod area-collapsed-mod--collapsed">		<div class="row cars-form__row">			<? if ($car_form['fields']['steering']) { ?>				<div class="col-xs-12 col-sm-6 form-gr form-gr--column">					<label class="form-gr__label" for="steering"><?= $car_form['fields']['steering']['caption'] ?></label>					<div class="form-gr__control cars-form__in-control">						<?= $car_form['fields']['steering']['html'] ?>					</div>				</div>			<? } ?>			<div class="col-xs-12 col-sm-6 form-gr form-gr--column">				<label class="form-gr__label"><?= $MSG['Cars']['msg56'] ?></label>				<div class="form-gr__control cars-form__in-control">					<?= $car_form['fields']['abs']['html'] ?>					<?= $car_form['fields']['esp']['html'] ?>					<?= $car_form['fields']['booster']['html'] ?>					<?= $car_form['fields']['conditioner']['html'] ?>					<?= $car_form['fields']['catalyst']['html'] ?>				</div>			</div>		</div>		<?		$carTplFields = [			['transmission', 'power'],			['drive', 'valves'],			['bdy_type_id', 'volume'],			'info'		];		if (isset($carTplFields) && isset($carTplForm)) {
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
?><?php ;		?>	</div></div><?$__BUFFER->addScript('/_syslib/modules/module.AreaCollapsedMod.js');$__BUFFER->AddJsInit(";(function(){	if(typeof AreaCollapsedMod !== 'undefined') {		var btn = document.getElementById('cars-details-form-button'),			area = document.getElementById('cars-details-form');		var det = new AreaCollapsedMod({			control: btn,			area: area,			areaCollapsedClass: 'area-collapsed-mod--collapsed',			collapsed: true		});	}})();");?><?php ;		?>	</div>