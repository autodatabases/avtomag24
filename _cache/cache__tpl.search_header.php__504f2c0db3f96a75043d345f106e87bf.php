<?
$groupActive = 1;
if (!empty($alternatives)) {
	$alternativesData = $alternatives;
	if ($alternatives['data']) {
		$alternativesData = $alternativesData['data'];
	}

	foreach ($alternativesData as $key => $alt) {
		if ($_REQUEST['g'] == $alt['id'] || strtoupper($SearchSetting['searchBrand']) == strtoupper($alt['brand'])) {
			$groupActive = $key;
			break;
		}
	}
}
?>
<div class="search-data__header">
	<div class="search-data__title">
		<h1 class="search-headline search-data__headline">
			<?= $AR_MSG['SearchModule']['msg1'] ?>
			<span class="search-headline__search-code"><?= $SearchSetting['searchCode'] ?></span>
			<? if (!empty($alternativesData)) { ?>
				<? if (!empty($SearchSetting['searchBrand'])) { ?>
					<span class="search-headline__search-brand<? if ($alternativesData && count($alternativesData) > 1) { ?> search-alternatives<? } ?>">
						<?= $alternativesData[$groupActive]['brand']; ?>
                        <? if ($alternativesData && count($alternativesData) > 1) { ?>
                            <svg width="10px" height="10px" class="search-headline__arrow-icon">
			                    <use xlink:href="/_sysimg/svg/ui.svg#arrow">
		                    </svg>
                        <? } ?>
					</span>
					<? if ($alternativesData && count($alternativesData) > 1) { ?>
						<?  /***/?><div class="alternatives-modal">
	<div class="alternatives-modal__title"><?= tr('Выберите производителя', 'SearchModule') ?></div>
	<div class="alternatives-modal__descr"><?= tr('Найдено несколько совпадений', 'SearchModule') ?></div>
	<button type="button" class="close modal-dialog__close"></button>
	<div class="alternatives-modal__content">
		<div class="alternatives">
			<? if (count($alternativesData) > 0) {

				$sLink = new cLink($_SERVER['REQUEST_URI'], '');
				$sLink->removeQueryParam("g")
					->removeQueryParam("brand")
					->removeQueryParam(Search_API::STEP_PARAMETER_NAME);

				$headerColumns = ['prd_info_link', 'code', 'spare_info'];
				$bodyColumns = ['brand', 'code', 'spare_info'];

				if (isset($alternatives['header'])) {
					$altColumns = ['brand', 'code', 'spare'];
					$headerColumnsMap = array_combine($headerColumns, $altColumns);
					foreach ($headerColumnsMap as $headerColumnName => $altColumnName) {
						$headerArr[$headerColumnName]['caption'] = isset($alternatives['header'][$altColumnName]) ? $alternatives['header'][$altColumnName]['caption'] : '';
					}
					foreach ($alternativesData as $i => $alt) {
						$alternativesData[$i]['spare_info'] = $alt['spare'];
						$alternativesData[$i]['code'] = $SearchSetting['searchCode'];
					}
				} else {
					$headerArr = $__search_results['header'];
				}

				?>
				<div class="alternatives-header">
					<? foreach ($headerColumns as $column) { ?>
						<div class="alternatives-header__col alternatives-header__col--<?= $column ?>">
							<?= $headerArr[$column]['caption'] ?>
						</div>
					<? } ?>
				</div>
				<? foreach ($alternativesData as $alt) { ?>
					<a class="alternatives__row" href="<?= $sLink->link . "&g=" . $alt['id'] ?>">
						<? foreach ($bodyColumns as $column) { ?>
							<span class="alternatives__col  alternatives__col--<?= $column ?>">
							<span class="alt_<?= $column ?>" title="<?= $alt[$column] ?>"><?= $alt[$column] ?></span>
						</span>
						<? } ?>
					</a>
					<?
				}
			} ?>
		</div>
	</div>
</div>

<?php ; ?>
					<? } ?>
				<? } ?>
			<? } ?>
		</h1>
		<? if ((int)$search_results_info['allCount'] > 0) { ?>
			<div class="search-data__stat">
				<span class="hidden-xs"><?= $AR_MSG['SearchModule']['msg53'] ?></span>
				<?= sprintf($AR_MSG['SearchModule']['msg54'], $search_results_info['allCount'], $search_results_info['matchCount'], $search_results_info['analogsCount'], $search_results_info['universCount'], '<span class="text-nowrap">' . $search_results_info['minPrice'] . '</span>', '<span class="text-nowrap">' . $search_results_info['maxPrice'] . '</span>') ?>
			</div>
		<? } ?>
	</div>
	<? if ($__search_results) { ?>
		<? if (!empty($currencies)) { ?>
	<div class="search-currency search-data__currency">
		<? foreach ($currencies as $currency) { ?>
			<input id="currency<?= $currency['id'] ?>" type="radio" name="cid" value="<?= $currency['id'] ?>" <? if ($currency['checked']){ ?>checked="checked"<? } ?>>
			<label class="search-currency__label" for="currency<?= $currency['id'] ?>"><?= $currency['html_sign'] ?></label>
		<? } ?>
	</div>
<?}?><?php ; ?>
	<? } ?>
</div>