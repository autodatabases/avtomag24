<form class="search-data__form" action="<?=$SearchSetting['basketURL']?>" method="POST">

<? if ($SearchSetting['useOrderColumn'] == 1) { ?>

<input type="hidden" name="func" value="add">
<div class="searchPrderButton"><input type="submit" value="<?=$AR_MSG['SearchModule']['msg46']?>"></div><br>

<? } ?>

<? $excludes_array = array('amount', 'weight', 'dlv_weight_tax'); ?>

<? $columns = 0; ?>
<? foreach ($__search_results['header'] as $hdr_id=>$column) { ?>
	
	<? if (($column['visible']!=true) or (in_array($hdr_id, $excludes_array))) continue; ?>

	<? $columns++; ?>

<? } ?>

<table class="web_ar_datagrid search-results search-results_type_classic search-results--fixed" fix-thead>
    <thead>
        <?  /***/?><tr class="search-header">
    <? $columns = 0; ?>
    <? foreach ($__search_results['header'] as $hdr_id => $column) {
        if (($column['visible'] != true) or (in_array($hdr_id, $excludes_array))) continue;

        $columns++;

         /***/?><th class="search-header__col search-header__col--<?= $hdr_id ?>">
    <? if (!empty($column['clm_info'])) { ?>
    <span data-tooltip="<?= $column['clm_info'] ?>">
    <? } ?>
    <?=($hdr_id == 'info' || $hdr_id ==  'action') ? '' : $column['caption']; ?>
    <? if (!empty($column['clm_info'])) { ?>
	    </span>
    <? } ?>
</th><?php ;

} ?><?php ; ?>
    <? if ($basket_check) { ?>
        <th><?= $__search_results['header']['final_price_val']['caption'] ?></th>
        <th><?= $__search_results['header']['percent_term']['caption'] ?></th>
        <? $columns += 2; ?>
    <? } ?>
</tr><?php ; ?>
    </thead>

<? $showDelivery = array(); ?>

<? foreach ($__search_results['data'] as $dat_id=>$row) { ?>

<?
if ($row['info_only'] == 1) {
	
	if (($SearchSetting['searchCode'] != $row['parsed_article']) or ($ZeroResultShown == 1)) {
	
		continue;
		
	} else {
		
		foreach ($__search_results['data'] as $dat_id2=>$row2) {
		
		    if (($row['parsed_article'] == $row2['parsed_article']) && ($dat_id != $dat_id2) && ($row2['info_only'] == 0) && ($row['prd_info_link'] == $row2['prd_info_link'])) { 
    			continue 2;
			}

		}
		
		$ZeroResultShown = 1;

	}

} 
?>

<?
 
if (($isProvider['provider_id'] == $row['provider_id']) && ($row['provider_id']>0)) { 
	$class = 'provider_row'; 
}
?>


<tr <?=($_interface->csColorRowPosition ?'class="search-row lg" style="'.$row['sts_style'].'"':'class="search-row '.$class.'"')?> data-brand-group="<?=$row['brand']?>">

	<? foreach ($__search_results['header'] as $hdr_id=>$column) { ?>
		
		<? if (($column['visible']!=true) or (in_array($hdr_id, $excludes_array))) continue; ?>
		
		<? 
			switch($hdr_id) {
				
				case 'spare_info':
				case 'article': 
				case 'prd_info_link': {
					$col_align = 'left';
				} break;
				
				case 'final_price':
				case 'customer_price':
				case 'dlv_weight_tax':
				case 'price_brutto': {
					$col_align = 'right';
				} break;
				
				default: {
					$col_align = 'center';
				}
				
			}
		?>
		<td class="search-col search-col__<?=$hdr_id?>">
			<? switch ($hdr_id) {
	case 'spare_info':
		if ($row[$hdr_id] == '') { ?>
	&nbsp;
<? } else { ?>
	<p data-line-clamp="2" data-tooltip="<?= $row[$hdr_id]; ?>"><?= $row[$hdr_id] ?></p>
<? } ?><?php ; ?><?php ;
		break;
	case 'evaluation':
		if ($row['info_only'] != 1) { ?>

	<? $showStat = ($SearchSetting['statShow'] == 1) && ($row["prv_show_stat"]); ?>

	<? if ($showStat) { ?>
		<button type="button" class="column-val column-val--evaluation" data-show-modal data-width="660" data-height="560" data-href="/shop/provider_stat.html?pv=<?= $row['provider_id'] ?>&t=<?= $row['term_interval_value'] ?>&sid=<?= $row['_search_id'] ?>">
	<? } else { ?>
		<span class="column-val column-val--evaluation">
	<? } ?>

	<? $evalArr = explode(' | ', $row['evaluation']); ?>
	<svg width="26px" height="26px" class="column-val__evaluation-svg">
		<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/_sysimg/svg/evaluation.svg#n<?= (int)$evalArr[0] ?>"></use>
	</svg>
	<span class="column-val__evaluation-separator"></span>
	<svg width="26px" height="26px" class="column-val__evaluation-svg">
		<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/_sysimg/svg/evaluation.svg#n<?= (int)$evalArr[1] ?>"></use>
	</svg>

	<? if ($showStat) { ?>
		</button>
	<? } else { ?>
		</span>
	<? } ?>

<? } ?>



<?php ; ?><?php ;
		break;
	case 'article':
		 /***/?><span <?= ($row['parsed_article'] == $SearchSetting['searchCode'] ? 'class="web_ar_search_code"' : '') ?>>
	<nobr>

	<? if ($SearchSetting['useProtectArticlesByImg']) { ?>
		<img src="<?= getThumbArticlePath($row['article']) ?>"/>
	<? } else { ?>
		<?= $row['article'] ?>
	<? } ?>

	<? if ($row['superseded_by'] != '') { ?>

		<? $show_replacement_conditions = 1; ?>
		<span class="superseded">
			<sup>
				<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
			</sup>
		</span>

	<? } elseif ($row['replacement_for'] != '') { ?>

		<? $show_replacement_conditions = 1; ?>
		<span class="replacement">
			<sup>
				<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
			</sup>
		</span>

	<? } ?>

	</nobr>
</span>
<?php ; ?><?php ;
		break;
	case 'prd_info_link':
		$showingArticle = $row['article'];
if ($SearchSetting['useProtectArticlesByImg']) {
	$showingArticle = '<img src="' . getThumbArticlePath($row['article']) . '" />';
}
?>

<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?> <?= ($row['oem_brand'] == 1 ? 'class="web_ar_oem_brand"' : 'class="web_ar_brand"') ?>>
	<?=(!empty($row['prd_info_exist']) ? "
<a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' class='search-results__info-link' rel='prd_info_link' data-prdId='" . $row['prd_info_exist'] . "'>" . $row['prd_info_link'] . " </a>
<br>
<a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' class='search-results__article' rel='prd_info_link' data-prdId='" . $row['prd_info_exist'] . "'>" . $showingArticle . " </a>
	" : '
<span class="search-results__info-link">' . $row['prd_info_link'] . '</span>
<br>
<span class="search-results__article">' . $showingArticle . '</span>
	')?>
</div>
<?php ; ?><?php ;
		break;
	case 'remains':
		if (($row['remains'] == $AR_MSG['SearchModule']['msg16']) && ($row['info_only'] == 0)) { ?>
	<img src="/images/check.png" title="<?= $AR_MSG['SearchModule']['msg16'] ?>" alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>
<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>
	<?= $row['remains'] ?>
<? } elseif ($row['remains'] > 0) { ?>
	<?= (float)$row['remains'] ?> <span class="search-col__remains-unit"><?=tr('шт.', 'units')?></span>
<? } else { ?>
	-
<? } ?><?php ; ?><?php ;
		break;
	case 'final_price':
		if ($row['provider_price'] == 0) { ?>
	-
<? } elseif ($row['provider_price'] == '') { ?>
	-
<? } else { ?>

	<? $final_price = $row[$hdr_id]; ?>
	<nobr><?= $row[$hdr_id] ?>

	<sup>
		<font color="#990000">

			<?
			if (count($Deliveries) > 0) {
				foreach ($Deliveries as $dlv => $cur_dlv) {

					if ($cur_dlv['delivery_condition'] == $row['delivery_condition']) {

						if ((($row['weight'] == 0) and ($cur_dlv['tax'] > 0)) || ($cur_dlv['tax'] == 0) || ($cur_dlv['tax'] == '')) {

							if (!safeArrayKey($showDelivery, $row['delivery_condition'])) {
								$showDelivery[$row['delivery_condition']] = $cur_dlv;
							}

							echo array_search($row['delivery_condition'], array_keys($showDelivery)) + 1;

						}

					}

				}
			}
			?>

		</font>
	</sup>

	<? if (($row['cost_per_weight'] > 0) && (!empty($row['cost_per_weight_display'])) and empty($row['weight'])) { ?>
		+ <?= $row['cost_per_weight_display'] ?>/<?=tr('кг', 'Common')?>.
	<? } ?>

<? } ?>
</nobr>

<? if ($row['phand_value'] != 0) { ?>

	<br/>
	<small>
		<span id="phand"><?= $AR_MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['detail_phand'] ?></nobr></span>
	</small>

<? } ?>

<?php ; ?><?php ;
		break;
	case 'action':
		/** @var AutoResource_InterfaceConfig $_interface */
?>
<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>

	<? if (isset($assocBasketWares[$row['hash']])) { ?>
		<span class="basket-items-count"><?= $assocBasketWares[$row['hash']]['amount'] ?></span>
		<span class="btn-add-basket">
			<a href="<?= ($SearchSetting['basketURL'] ? $SearchSetting['basketURL'] : '/shop/basket.html') ?>" class="add-basket__link add-basket__link--added"></a>
		</span>
	<? } else { ?>
		<input type="hidden" id="<?= $row['hash'] ?>" value="<?= $row['_search_id'] ?>">
		<?= $row['amount'] ?>
		<span id="action<?= $row['_search_id'] ?>" class="btn-add-basket"> <?= $row[$hdr_id] ?></span>
		<input type="hidden" id="max_amount_<?=$row['_search_id']?>" value="<?=($_interface->csLeadLettersToNumberForCheckRemains ? strToFloat($row['remains']) : (float)$row['remains'])?>"/>
	<? } ?>

<? } ?>
<?php ; ?><?php ;
		break;
	case 'info':
		$detailInfo = array(
	"article" => $row['parsed_article'],
	"brand"   => $row['brand']
);

$detailLink = data2str($detailInfo, true, true);
?>

<button type="button" class="column-val column-val--detail-info" data-show-modal data-width="660" data-height="560" data-href="/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>"></button>

<? if ($row['picture']) { ?>
	<button type="button" class="column-val column-val--picture" data-show-modal data-width="660" data-height="560" data-href="/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>"></button>
<? } ?>

<? if (($row['weight']) && ($row['weight'] > 0)) { ?>
	<img src="/images/weight.png" border="0" title="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>" alt="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= $row['weight'] ?>" hspace="1" align="absmiddle"/>
<? } ?>
<?php ;
		break;
	case 'term':
	case 'time':
	case 'term_and_destination':
		/**
 * @var AutoResource_InterfaceConfig $_interface
 */
?>
<? if ($hdr_id == 'term') { ?>

	<? if ($row['term'] > 0 || ($row['max_term'] > 0 && $_interface->csUseMaxTerm)) { ?>
		<?= $row[$hdr_id] ?> <span class="search-col__term-unit"><?=tr('дн.')?></span>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1) && $row['max_term'] == 0) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'time') { ?>

	<? if ($row['term'] > 0 || ($row['max_term'] > 0 && $_interface->csUseMaxTerm)) { ?>
		<?= $row[$hdr_id]?>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1) && $row['max_term'] == 0) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'term_and_destination') { ?>

	<? if ($row['term'] > 0 || ($row['max_term'] > 0 && $_interface->csUseMaxTerm)) { ?>
		<?= $row['term'] ?> <span class="search-col__term-unit"><?=tr('дн.')?></span>
		<div class="search-col__term-caption">
			<?= $row['destination_display'] ?>
		</div>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1) && $row['max_term'] == 0) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
		<div class="search-col__term-caption">
			<?= $row['destination_display'] ?>
		</div>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } ?><?php ; ?><?php ;
		break;
	case 'price_brutto':
		echo (($row['weight'] > 0) && ($row['cost_per_weight'] > 0)) ? $row[$hdr_id] : '&nbsp;';
		break;
	case 'orderm':
	case 'date':
		echo (($row['info_only'] != '1') || ($row['provider_price'] > 0)) ? $row[$hdr_id] : '&nbsp;';
		break;
	default:
		echo $row[$hdr_id] ? $row[$hdr_id] : '&nbsp;';
		break;
}
?><?php ; ?>
		</td>


	<? } ?>
	
	<? if ($basket_check == 1) { ?>
        <td align="right">
			<? if ($row['final_price_val'] && ($desire_price != 0)) { ?>
				<?=number_format((($row['final_price_val'] - $desire_price) / $desire_price *100), 2, '.', ' ')?>
			<? } ?>
		</td>
        <td align="right">
			<? if ($row['max_term'] && ($desire_term != 0)) { ?>
				<?=number_format((($row['max_term'] - $desire_term) / $desire_term *100), 2, '.', ' ')?>
			<? } elseif ($row['term'] && ($desire_term !=0 )) { ?>
				<?=number_format((($row['term'] - $desire_term) / $desire_term *100), 2, '.', ' ')?>
  	
            <? } ?>
        </td>
    <? } ?>
</tr>

<? } ?>

</table>

</form>