<? unset($__search_results['header']['time']); ?>
<form id="admin-search-form" action="<?=$SearchSetting['basketURL']?>" method="POST">

<? if ($SearchSetting['useOrderColumn'] == 1) { ?>

<input type="hidden" name="func" value="add">
<div class="searchPrderButton"><input type="submit" value="<?=$AR_MSG['SearchModule']['msg46']?>"></div><br>

<? } ?>

<table id="admin-search-table" border="0" class="web_ar_datagrid" width="100%">

<?  /***/?><tr>
	<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

		<? if ($column['visible'] == true) { ?>
			<th class="col_<?=$hdr_id?>"><?= $column['caption'] ?></th>
		<? } ?>

	<? } ?>

	<? if ($basket_check) { ?>
		<th><?= $__search_results['header']['final_price_val']['caption'] ?></th>
		<th><?= $__search_results['header']['percent_term']['caption'] ?></th>
	<? } ?>
</tr><?php ; ?>

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
} elseif ($dat_id % 2 == 0) {
	$class = 'even';
} else {
	$class = 'odd';
}
?>

<tr <?=($row['sts_style']!=''?'style="'.$row['sts_style'].'"':'class="'.$class.'"')?> data-brand-group="<?=$row['brand']?>">

	<? foreach ($__search_results['header'] as $hdr_id=>$column) { ?>
		
		<? if ($column['visible']==true) { ?>
		
		<? 
			switch($hdr_id) {
				
				case 'spare_info': {
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
		<td class="col_<?=$hdr_id?> search-col__<?=$hdr_id?>" align="<?= $col_align ?>">
		
			<?  /***/?>

<? if ($hdr_id == 'term') { ?>

	<? if ($row['term'] > 0 || ($row['max_term'] > 0 && $_interface->csUseMaxTerm)) { ?>
		<?= $row[$hdr_id]; ?>
	<? } elseif (($row['term'] == 0) && ($row['info_only'] != 1) && $row['max_term'] == 0) { ?>
		<?= $AR_MSG['SearchModule']['msg12'] ?>
	<? } elseif ($row['info_only'] == 1) { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'evaluation') { ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		<a href="#" onclick="prov_stat = window.open('/shop/provider_stat.html?pv=<?= $row['provider_id'] ?>&t=<?= $row['term_interval_value'] ?>', '', 'width=500,height=450'); prov_stat.focus();">
	<? } ?>

	<? if ($row['info_only'] != 1) { ?>
		<?= $row['evaluation'] ?>
	<? } ?>

	<? if (($row['info_only'] != 1) && ($SearchSetting['statShow'] == 1)) { ?>
		</a>
	<? } ?>


<? } elseif ($hdr_id == 'prd_info_link') { ?>

	<?=(!empty($row['prd_info_exist']) ? " <a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' target='_blank'>" . $row['prd_info_link'] . " </a>" : $row['prd_info_link']);?>

<? } elseif ($hdr_id == 'article') { ?>

	<span <?= ($row['parsed_article'] == $SearchSetting['searchCode'] ? 'class="web_ar_search_code"' : '') ?>>
		<nobr><?= $row['article'] ?></nobr>

		<? if ($row['superseded_by'] != '') { ?>

			<? $show_replacement_conditions = 1; ?>
			<span style="color: #990000"><sup>
					<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"
					   style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
				</sup></span>

		<? } elseif ($row['replacement_for'] != '') { ?>

			<? $show_replacement_conditions = 1; ?>

			<span style="color: #990000"><sup>
					<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>"
					   style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
				</sup></span>
		<? } ?>
			
		</span>

<? } elseif ($hdr_id == 'brand') { ?>

	<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?>>

		<? if ($row['oem_brand'] == 1) { ?>
			<span id="web_ar_oem_brand">
		<?= $row['brand'] ?>
		</span>
		<? } else { ?>
			<?= $row['brand'] ?>
		<? } ?>
	</div>

<? } elseif ($hdr_id == 'remains') { ?>

	<? if ($row['info_only'] == 0) { ?>

		<? if ($row['remains'] == $AR_MSG['SearchModule']['msg16']) { ?>
			<img src="/images/check.png" title="<?= $AR_MSG['SearchModule']['msg16'] ?>"
				 alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>
		<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>
			<?= $row['remains'] ?>
		<? } elseif ($row['remains'] > 0) { ?>
			<?= (float)$row['remains'] ?>
		<? } else { ?>
			-
		<? } ?>

	<? } else { ?>
		-
	<? } ?>

<? } elseif ($hdr_id == 'destination_display') { ?>

	<?= $row['destination_display'] ?>

<? } elseif ($hdr_id == 'action') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'orderm') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'min_quantity') { ?>

	<? if ($row['min_quantity'] > 0) { ?>
		<?= $row[$hdr_id] ?>
	<? } ?>

<? } elseif ($hdr_id == 'info') { ?>

	<?

	$detailInfo = array(
		"article" => $row['parsed_article'],
		"brand"   => $row['brand']
	);

	$detailLink = data2str($detailInfo, true, true);

	?>

	<a href="#"
	   onclick="window.open('/info/detail.html?sid=<?= $row['_search_id'] ?>&detailLink=<?= $detailLink ?>','','width=800,height=600,scrollbars=yes'); return false;"><img
			src="/images/info.gif" border="0" title="<?= $AR_MSG['SearchModule']['msg17'] ?>"
			alt="<?= $AR_MSG['SearchModule']['msg17'] ?>" hspace="1" align="absmiddle"/></a>

	<? if ($row['picture']) { ?>
		<a href="#"
		   onclick="window.open('/info/detail.html?sid=<?= $row['_search_id'] ?>&did=<?= $row['detail_id'] ?>&detailLink=<?= $detailLink ?>','','width=800,height=600,scrollbars=no');return false;"><img
				src="/_sysimg/icons/picture.gif" border="0" title="<?= $AR_MSG['SearchModule']['msg18'] ?>"
				alt="<?= $AR_MSG['SearchModule']['msg18'] ?>" hspace="1" align="absmiddle"/></a>
	<? } ?>

	<? if ($row['weight'] && ($row['weight'] > 0)) { ?>
		<img src="/_sysimg/ar2/weight.gif" border="0"
			 title="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= number_format($row['weight'], 3, '.', ' ') ?>"
			 alt="<?= $AR_MSG['SearchModule']['msg19'] ?> = <?= number_format($row['weight'], 3, '.', ' ') ?>"
			 hspace="1" align="absmiddle"/>
	<? } ?>

<? } elseif ($hdr_id == 'price_brutto') { ?>

	<? if (($row['weight'] > 0) && ($row['cost_per_weight'] > 0)) { ?>

		<?= $row['price_brutto'] ?>

	<? } ?>

<? } elseif ($hdr_id == 'final_price') { ?>

	<? if ($row['provider_price'] == 0) { ?>
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
		<small><span id="phand"><?= $AR_MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['detail_phand'] ?></nobr></span>
		</small>

	<? } ?>

<? } elseif ($hdr_id == 'date') { ?>

	<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>
		<?= $row[$hdr_id] ?>
	<? } else { ?>
		-
	<? } ?>

<? } else { ?>

	<?= $row[$hdr_id] ?>

<? } ?><?php ; ?>

		</td>
		
		<? } ?>

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