<div class="contact-details contact-details_mobile">
	<?
	foreach ($_interface->csSelectStockPointPropOrder as $prop) {

		if ($prop === 'address') {
			continue;
		}
		 /***/?><div class="contact-details__item<?=(!$activeStockData[$prop]?' hide':'')?>">
	<svg class="contact-details__icon">
		<use xlink:href="<?= $svgIconsSprite ?>#<?= $prop ?>" />
	</svg>
	<div class="contact-details__value" data-contact-prop="<?=$prop?>"><?= $activeStockData[$prop] ?></div>
</div><?php ;
	}
	?>
</div>
