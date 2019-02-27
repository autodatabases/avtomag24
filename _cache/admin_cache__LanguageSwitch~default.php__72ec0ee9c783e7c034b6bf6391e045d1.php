<? if (count($arLng) > 1) { ?>
	<div class="select-country <?= ($modifier !== '') ? 'select-country_' . $modifier : '';  ?>">
		<div class="select-country__container">
			<button class="select-country__button btn btn_view_pseudo" title="<?= $buttonTitle ?>">
				<svg class="select-country__icon">
					<use xlink:href="/_sysimg/svg/ui.svg#language">
				</svg>
				<span class="select-country__name"><?= $buttonText ?></span>
			</button>
			<div class="select-country__inner-container">
				<? foreach ($arLng as $lng => $name) { ?>
					<? if (strtoupper($_SYSTEM->LNG) != strtoupper($lng)) { ?>
						<a class="select-country__item" href="<?= $baseCLUrl . strtolower($lng) ?>"  title="<?= trp('переключить язык клиентской части на %s', '_languages', $name)  ?>">
							<span class="select-country__name"><?= mb_ucfirst($name) ?></span>
						</a>
					<? } ?>
				<? } ?>
			</div>
		</div>
	</div>
<? } ?>