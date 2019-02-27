<? if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB && !$showMany) {
	$showMany = true;
	$cntPred = $counterRowsAB - $SearchSetting['csAmountForGroup'];
	$textOpen = trp('Отобразить еще ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred);
	$textClose = trp('Скрыть ' . str_replace($cntPred, '%s', declOfNum($cntPred, ['предложение', 'предложения', 'предложений'])), 'SearchModule', $cntPred); ?>
	<tr class="show-many group<?= $indexGroup . (($oldMC || !$match_criteria || $is_availability) ? '' : ' close-tr') ?>" data-brand-group="<?=$prevBrandDataRow?>">
		<td colspan="<?= $columns ?>">
			<input class="button-show" type="button" value="<?= $textOpen ?>" data-many-show data-index="<?= $indexGroup ?>"/><input class="button-hide hidden" type="button" value="<?= $textClose ?>" data-many-hide data-index="<?= $indexGroup ?>"/>
		</td>
	</tr>
<? } ?>
<? $prevBrandDataRow = $row['brand']; ?>
<?php ; ?>
<tr class="section">
	<td colspan="<?= $columns ?>"><?= $sectionTitle ?></td>
</tr>