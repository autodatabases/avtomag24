<div class="contact-details contact-details_footer">
	<?
	foreach ($_interface->csSelectStockPointPropOrder as $prop) {
		 /***/?><div class="contact-details__item<?=(!$activeStockData[$prop]?' hide':'')?>">
	<svg class="contact-details__icon">
		<use xlink:href="<?= $svgIconsSprite ?>#<?= $prop ?>" />
	</svg>
	<div class="contact-details__value" data-contact-prop="<?=$prop?>"><?= $activeStockData[$prop] ?></div>
</div><?php ;
	}
	?>
</div>
