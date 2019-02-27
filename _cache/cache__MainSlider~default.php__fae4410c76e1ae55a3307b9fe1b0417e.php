<?
if ($slides) {
	$level = $slides[0]['str_level'] + 1;
	$left = $slides[0]['str_left'];
	$right = $slides[0]['str_right'];

	unset($slides[0]);
	?>
	<div id="main-slider" class="main-slider">
		<div class="main-slider__carousel owl-carousel">
			<? foreach ($slides as $arItem) { ?>
				<? if ($arItem['str_level'] == $level and $arItem['str_left'] > $left and $arItem['str_right'] < $right) { ?>
					<div class="main-slider__item" style="background-image: url(<?= $arItem['str_metadata']['image'] ?>);">
						<?= $arItem['translated_str_text'] ?>
						<? if ($arItem['current_url'] && !empty($arItem['translated_str_text'])) { ?>
							<a class="btn main-slider__btn" href="<?= $arItem['current_url'] ?>"><?= tr('Открыть', 'Common') ?></a>
						<? } ?>
					</div>
				<? } ?>
			<? } ?>
		</div>
	</div>
<?
}?>