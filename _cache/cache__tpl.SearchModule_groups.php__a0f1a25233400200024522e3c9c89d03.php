<? if (($SearchSetting['authUserSearchOnly'] != 1) || ($SearchSetting['cst_category_id'] >= 1) || ($SearchSetting['admin_search'] == 1)) { ?>

	<? if ($SearchSetting['empty_search']) { ?>

		<?  /***/?><h1><?=$AR_MSG['SearchModule']['msg1']?></h1>

<ul>

	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p>
	<? } ?>

	<li><nobr><?=$AR_MSG['SearchModule']['msg3']?></nobr></li>

	<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg6']?></a>
	<? } ?>

</ul>

<? if (isset($alternatives['header'])) {

	if (!$SearchSetting['empty_search']) {?>
    <h1><?=$AR_MSG['SearchModule']['msg1']?></h1>
<? } ?>

	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p>
	<? } ?>

<table border="0" class="web_ar_datagrid">

<tr>

<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>

	<? if ($column['visible']==true) { ?>

	<th><?=$column['caption']?></th>

	<? } ?>

<? } ?>
</tr>

<? foreach ($alternatives['data'] as $dat_id=>$row) { ?>

<tr class="<?=($dat_id % 2 == 0?'even':'odd')?>">
	<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>
	
		<?
			switch ($hdr_id) {
				
				case 'brand':
				case 'action_alt': {
					$align = 'center';
				} break;
				default: {
					$align = 'left';
				} break;
				
			}
		?>
		
		<? if ($column['visible'] == true) { ?>
		<td align="<?=$align?>">
		<?=$row[$hdr_id]?>
		
		<? if ($hdr_id=='spare') { ?>
		
			<? if ($row['superseded_by']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg7']?><?=$row['superseded_by']?>
			<? } ?>
			
			<? if ($row['replacement_for']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg8']?><?=$row['replacement_for']?>
			<? } ?>

		<? } ?>
			
		</td>
		<? } ?>

	<? } ?>
</tr>

<? } ?>

</table><?php ;

} ?><?php ; ?>
	
	<? } ?>

	<? if ($alternatives && !$__search_results && !$SearchSetting['empty_search']) { ?>

		<? if (!$SearchSetting['empty_search']) {?>
    <h1><?=$AR_MSG['SearchModule']['msg1']?></h1>
<? } ?>

	<? if ($SearchSetting['search_from_catalog']) { ?>
	<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p>
	<? } ?>

<table border="0" class="web_ar_datagrid">

<tr>

<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>

	<? if ($column['visible']==true) { ?>

	<th><?=$column['caption']?></th>

	<? } ?>

<? } ?>
</tr>

<? foreach ($alternatives['data'] as $dat_id=>$row) { ?>

<tr class="<?=($dat_id % 2 == 0?'even':'odd')?>">
	<? foreach ($alternatives['header'] as $hdr_id=>$column) { ?>
	
		<?
			switch ($hdr_id) {
				
				case 'brand':
				case 'action_alt': {
					$align = 'center';
				} break;
				default: {
					$align = 'left';
				} break;
				
			}
		?>
		
		<? if ($column['visible'] == true) { ?>
		<td align="<?=$align?>">
		<?=$row[$hdr_id]?>
		
		<? if ($hdr_id=='spare') { ?>
		
			<? if ($row['superseded_by']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg7']?><?=$row['superseded_by']?>
			<? } ?>
			
			<? if ($row['replacement_for']!='') { ?>
			<?=$row['code']?> - <?=$AR_MSG['SearchModule']['msg8']?><?=$row['replacement_for']?>
			<? } ?>

		<? } ?>
			
		</td>
		<? } ?>

	<? } ?>
</tr>

<? } ?>

</table><?php ; ?>

	<? } ?>

	<? if ($__search_results && !$SearchSetting['empty_search']) { ?>

		<? if (!$SearchSetting['admin_search']) { ?>

			<?  /***/?><table border="0" width="100%">

<tr>
<td>
<nobr><?=$AR_MSG['SearchModule']['msg1']?></nobr>
	
	<? if ($SearchSetting['catalog_search']) { ?>
	<li><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg6']?></a>
	<? } ?>

</td><td align="right" valign="top">

<? if ($__search_results && !$SearchSetting['empty_search']) { ?>

<b><?=$AR_MSG['SearchModule']['msg9']?></b>&nbsp;<?=$cid?>

<? } ?>

</td>
<td valign="top" style="padding-left: 10px">
	
	<? if ($SearchSetting['groups_count'] > 1) { ?>
	
	<b><?=$AR_MSG['SearchModule']['msg41']?></b>&nbsp;
	
	<?
		$sLink = new cLink($_SERVER['REQUEST_URI'], '');
		$sLink->removeQueryParam("g");
	?>
	
	<select onchange="window.location.href = '<?=$sLink->link?>&g='+this.value">
	
	<? foreach ($alternatives as $dat_id=>$row) { ?>
	
			<option value="<?=$row['id']?>" <?=($_REQUEST['g']==$row['id']?'selected="selected"':'')?>>
				<?=$row['brand']?>
			</option>

	<? } ?>

	</select>
	
	<? } ?>

</td></tr>
</table>

<? $st_c = 0 ?>
<table border="0" cellpadding='1' cellspacing="0" width="100%" style="border-top: 1px solid #A0A0A0; border-bottom: 1px solid #A0A0A0">

<caption><?=$AR_MSG['SearchModule']['msg42']?></caption>

<? foreach ($searchStat as $key=>$searchN) { ?>

<? if ($st_c % 7 == 0) { ?><tr><? } ?>

<?
	$st_c++;
	$link = new cLink($_SERVER['REQUEST_URI'], '');
  
    $link->removeQueryParam("g");
    $link->removeQueryParam("article");

    $link->addQueryParam("article", $searchN['sse_search_number']);
?>

<td><a href="<?=$link?>"><b><?=$searchN['sse_search_number']?></b></a></td>

<? if ($st_c % 7 == 0) { ?><tr><? } ?>

<? } ?>

</table><br><?php ; ?>

		<? } else { ?>

			<h1><?=$AR_MSG['SearchModule']['msg1']?></h1>

		<? } ?>

		<? if ($search_from_catalog) { ?>
			
			<li><p><a href="<?=$SearchSetting['catalog_search_url']?>"><?=$AR_MSG['SearchModule']['msg2']?></a></p></li>

		<? } ?>

		<? if ($SearchSetting['searchMode'] == "An") { ?>
			<div id="tree_searchmode_An">
				<?  /***/?>		
<style>

	body {
		font-size: 11px
	}

	.scol_0 {
		width: 600px;
	}
	
	.scol_1 {

		position: absolute;
		left: 100px;
		width: 150px;
		margin-right: 5px;
		vertical-align: top;

	}

	.scol_2 {
		position: absolute;
		left: 250px;
		width: 200px;
		margin-right: 5px;

	}
	
	.scol_3 {
		position: absolute;
		left: 400px;
		width: 300px;
		margin-right: 5px;

	}
	
	.scol_4 {

		width: 50px;
		margin-right: 5px;
		text-align: center;

	}
	
	.scol_5 {

		width: 30px;
		margin-right: 5px;
		text-align: center;

	}
	
	.searchBox {
		width: 100%;
		border: #B3E0FF solid 1px;
		background: #F9F9F9;
	}
	
	img {
		border: 0px;
	}
	
	a {
		text-decoration: none;
		cursor: hand;
	}
	
	
	a.normal {
		text-decoration: underline;
		cursor: hand;
	}
	
	div.analogTreeNode {
		position: relative;
		box-sizing: border-box;
		width: 100%; padding-left: 50px;
		background: #FFFFFF;
	}
	
	div.analogTreeNode1 {
		position: relative;
		box-sizing: border-box;
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
	}
	
	div.analogTreeNode2 {
		position: relative;
		box-sizing: border-box;
		width: 100%; padding-left: 50px;
		background: #C0C0C0;
	}
	
	div.analogTreeNode3	 {
		position: relative;
		box-sizing: border-box;
		width: 100%; padding-left: 50px;
		background: #A0A0A0;
		color: #FFFFFF;
	}
	
</style>
	
	<script type="text/javascript" src="/_syslib/custom.dtree.js"></script>
	
	<script type="text/javascript">

	
		<?	$loopbackCheck = array(); ?>
		
		tecdocTree = new dTree('tecdocTree', '/images/ar2-tree');
		
		
<?

	$rowStr    = "<nobr><div class=\"analogTreeNode\">";
	
	$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";
	
	$rowStr  .= "<span class=\"scol_1\">".$SearchSetting['searchCodeInfo'][0]['code']."</span>";
	
	$rowStr  .= "<span class=\"scol_2\">".$SearchSetting['searchCodeInfo'][0]['prd_name']."</span>";
	
	$rowStr  .= "<span class=\"scol_3\">".$SearchSetting['searchCodeInfo'][0]['name']."</span>";
	
	$rowStr  .= "</div></nobr>";
	
	$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);

	global $CMS_API;
	$href = $CMS_API->checkAccess("/admin/webavtr/analogs\.html");

	echo "tecdocTree.add(".$SearchSetting['searchCodeInfo'][0]['detail_id'].", -1, '$rowStr', ".($href ? "'/admin/webavtr/analogs.html?d1_code=".strip_tags($SearchSetting['searchCodeInfo'][0]['code'])."&prd1_name=".strip_tags($SearchSetting['searchCodeInfo'][0]['prd_name'])."&partSearch=1'" : "''").", '".$AR_MSG['SearchModule']['11']."', '_blank');";
	
		
		foreach ($__search_results['data'] as $dat_id=>$row) { 

				
			if ($row['detail_id'] != $row['cross_detail_id'] && !isset($loopbackCheck[$row['detail_id']])) {
					
				$rowStr    = "<div class=\"analogTreeNode".$row['cross_level']."\">";
	
				$rowStr  .= "<span class=\"scol_0\">&nbsp;</span>";	
				$rowStr  .= "<span class=\"scol_1\">&nbsp;".$row['article']."</span>";
				$rowStr  .= "<span class=\"scol_2\">".strtoupper($row['brand'])."</span>";
				$rowStr  .= "<span class=\"scol_3\">".$row['spare_info']."</span>";
				
				$rowStr  .= "</div></nobr>";
				
				$rowStr = preg_replace("#[\r\n\t]+#Uis"," ",$rowStr);
										
				echo "tecdocTree.add(".$row['detail_id'].", ".$row['cross_detail_id'].", '".$rowStr."', ".($href ? "'/admin/webavtr/analogs.html?d1_code=".strip_tags($row['article'])."&prd1_name=".strip_tags($row['brand'])."&partSearch=1'" : "''").", '".$AR_MSG['SearchModule']['11']."', '_blank');";
				
			}
			
			$loopbackCheck[$row['detail_id']] = 1;		
			
		} ?>
		
		document.write(tecdocTree);	
		

	</script><?php ; ?>
			</div>
			
		<? } else { ?>

			<? if ($__search_results['controls']) { ?>
				
				<? foreach ($__search_results['controls'] as $hdr_id => $control) { ?>

	<div class="<?= ($hdr_id == "filter" ? 'notice' : '') ?>" style="padding-bottom: 0px;<?= ($hdr_id == "filter" ? 'min-width:1000px;' : '') ?>">
		<?= $control ?>
	</div>

<? } ?><?php ; ?>

			<? } ?>

			<?  if (!empty($jsSearchModuleParams)) { ?>
	<script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function () {
        window.adminSearchModule = new AdminSearchModule(<?=json_encode($jsSearchModuleParams)?>);
      });
	</script>
<? }
/** @var \LOCAL_InterfaceConfig|AutoResource_InterfaceConfig $_interface */
$availabilityMethod = $_interface->csAvailabilityShowMethod;
?>

<form id="admin-search-form" action="<?= $SearchSetting['basketURL'] ?>" method="POST">

	<? if ($SearchSetting['useOrderColumn'] == 1) { ?>
		<input type="hidden" name="func" value="add">
		<div class="searchPrderButton"><input type="submit" value="<?= $AR_MSG['SearchModule']['msg46'] ?>"></div><br>
	<? } ?>

	<table id="admin-search-table" border="0" class="web_ar_datagrid admin-search-table" cellspacing="0">

		<?  /***/?><tr>
	<? $columns = 0; ?>
	<? foreach ($__search_results['header'] as $hdr_id => $column) { ?>

		<? if ($column['visible'] == true) { ?>
			<? $columns++; ?>
			<th class="col_<?=$hdr_id?>"><?= $column['caption'] ?></th>
		<? } ?>

	<? } ?>
</tr><?php ;

		$is_availability = $match_criteria = $univers = $oem = $article = '';
		$show_article = $show_brand = 1;
		$showDelivery = [];
		$indexGroup = $counterRowsAB = 0;

		foreach ($__search_results['data'] as $dat_id => $row) {

			if ($row['info_only'] == 1) {
				if (($SearchSetting['searchCode'] != $row['parsed_article']) or ($ZeroResultShown == 1)) {

					continue;
				}

				foreach ($__search_results['data'] as $dat_id2 => $row2) {

					if (($row['parsed_article'] == $row2['parsed_article']) && ($dat_id != $dat_id2) && ($row2['info_only'] == 0)) {
						continue 2;
					}
				}
				$ZeroResultShown = 1;
			}

			$show_article = 0;
			$new_line = 0;
			$showMany = false;
			$oldMC = false;

			if($prevBrandDataRow == '') {
				$prevBrandDataRow = $row['brand'];
			}

			if (($article !== $row['parsed_article']) || ($row['brand'] !== $brand)) {
				$article = $row['parsed_article'];
				$brand = $row['brand'];
				$show_article = 1;
				$new_line = 1;
			}

			if ($row['is_availability'] != $is_availability && (
					($availabilityMethod == \AutoResource\Packages\Search\Constants\SearchConstants::SHOW_M1_TOP_BLOCK)
					||
					(($availabilityMethod == \AutoResource\Packages\Search\Constants\SearchConstants::SHOW_M2_BLOCK_AFTER_REQUESTED) && ($row['match_criteria'] == 1))
				)
			) {
				$show_article = 1;
				$is_availability = $row['is_availability'];


				if ($is_availability) {
					$sectionTitle = truc('msg12', 'SearchModule');
					if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB && !$showMany) {
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
</tr><?php ;
				} else {
					$oldMC = true;
				}
			}
			elseif ($availabilityMethod > \AutoResource\Packages\Search\Constants\SearchConstants::SHOW_M2_BLOCK_AFTER_REQUESTED) {
				$is_availability = false;
			}


			if ($row['match_criteria'] != $match_criteria && !$is_availability) {
				$show_article = 1;
				$match_criteria = $row['match_criteria'];

				if ($match_criteria == 0) {
					$sectionTitle = $AR_MSG['SearchModule']['msg43'];
					if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB && !$showMany) {
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
</tr><?php ;
				} else {
					$oldMC = true;
				}
			}

			if (($row['univers'] != $univers) && !$is_availability && ($match_criteria == 1)) {

				$show_article = 1;
				$univers = $row['univers'];

				if ($univers != 0) {
					$sectionTitle = $AR_MSG['SearchModule']['msg47'];
					if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB && !$showMany) {
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
</tr><?php ;
				}
			}

			if (($row['oem'] != $oem) && !$is_availability && ($match_criteria == 1) && ($row['univers'] == 0)) {
				$show_article = 1;
				$oem = $row['oem'];
				$sectionTitle = ($oem == 0 ? $AR_MSG['SearchModule']['msg44'] : $AR_MSG['SearchModule']['msg45']);
				if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB && !$showMany) {
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
</tr><?php ;
			}

			if ($show_article) {

				if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB && !$showMany) {
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
<?php ;

				$counterRowsAB = 0;
				$indexGroup++;
			}
			$counterRowsAB++;

			$class = 'odd';
			if (($isProvider['provider_id'] == $row['provider_id']) && ($row['provider_id'] > 0)) {
				$class = 'provider_row';
			} elseif ($dat_id % 2 == 0) {
				$class = 'even';
			}

			$groupClass = ["group" . $indexGroup];

			if ($row['sts_style'] != '') {
				$groupClass[] = "lg";
			} else {
				$groupClass[] = $class;
			}

			if ($SearchSetting['newGroupsTemplate']) {

				if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB) {
					$groupClass[] = "hidden";
				}

				if ($new_line) {
					$groupClass[] = "new-line";
				}
				if ($match_criteria && !$show_article) {
					$groupClass[] = "close-tr";
				}

				$show_article_real = $show_article;
				$show_article = 1;
			}

			 /***/?><tr
	class="<?= implode(" ", $groupClass) ?>"
	<? if ($row['sts_style'] != '') { ?> style="<?= $row['sts_style'] ?>"<? } ?>
	data-row-clicked
	data-brand-group="<?= $row['brand'] ?>"
>

	<? foreach ($__search_results['header'] as $hdr_id => $column) {
		if (!$column['visible']) {
			continue;
		}
		$col_align = 'center';

		switch ($hdr_id) {

			case 'spare_info':
			case 'article':
			case 'prd_info_link': {
				$col_align = 'left';
			}
				break;
			case 'final_price':
			case 'customer_price':
			case 'dlv_weight_tax':
			case 'price_brutto': {
				$col_align = 'right';
			}
				break;
		}
		?>
		<td class="col_<?= $hdr_id ?> search-col__<?= $hdr_id ?>" align="<?= $col_align ?>" <?= ($show_article == 1 ? 'style="border-top: 1px solid #A0A0A0"' : '') ?>>
			<? /**
 * @var AutoResource_InterfaceConfig $_interface
 */
?>
<? if ($hdr_id == 'spare_info') { ?>

	<? if (!in_array($hdr_id, $_interface->csHideGroupFields) || $show_article == 1) { ?>

		<? if ($row[$hdr_id] == '') { ?>
			&nbsp;
		<? } else { ?>
			<?= $row[$hdr_id] ?>
		<? } ?>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'term') { ?>

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

<? } elseif ($hdr_id == 'article') { ?>

	<? if (!in_array($hdr_id, $_interface->csHideGroupFields) || $show_article == 1) { ?>

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

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'prd_info_link') { ?>

	<? if (!in_array($hdr_id, $_interface->csHideGroupFields) || $show_article == 1) { ?>

		<? if ($SearchSetting['newGroupsTemplate']) { ?>
			<div class="toggle-link-wrapper">
				<? if ($show_article_real) { ?>
					<?
						$search_results_keys = isset($search_results_keys) ? $search_results_keys : array_keys($__search_results['data']);
						$next = $search_results_keys[array_search($dat_id, $search_results_keys) + 1];
						if ($__search_results['data'][$next]['parsed_article'] === $row['parsed_article'] and $__search_results['data'][$next]['brand'] === $row['brand']) {
					?>
							<img src="/_sysimg/tree/<?= ($match_criteria ? 'close' : 'open') ?>all.png" class="toggle-link <?= ($match_criteria ? 'close' : '') ?>" data-toggle-group data-index="<?= $indexGroup ?>" title="<?= ($match_criteria ? tr('Развернуть предложения', 'SearchModule') : tr('Свернуть предложения', 'SearchModule')) ?>"/>
						<? } ?>
				<? } ?>
			</div>
		<? } ?>

		<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?> <?= ($row['oem_brand'] == 1 ? 'class="web_ar_oem_brand"' : 'class="web_ar_brand"') ?>>
			<?=(!empty($row['prd_info_exist']) ? " <a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' target='_blank'>" . $row['prd_info_link'] . " </a>" : $row['prd_info_link']);?>
		</div>

	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'remains') { ?>

	<? if (($row['remains'] == $AR_MSG['SearchModule']['msg16']) && ($row['info_only'] == 0)) { ?>
		<img src="/images/check.png" title="<?= $AR_MSG['SearchModule']['msg16'] ?>" alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>
	<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>
		<?= $row['remains'] ?>
	<? } elseif ($row['remains'] > 0) { ?>
		<?= (float)$row['remains'] ?>
	<? } else { ?>
		-
	<? } ?>


<? } elseif ($hdr_id == 'destination_display') { ?>

	<? if ($row['destination_display'] != "") { ?>
		<?= $row['destination_display'] ?>
	<? } else { ?>
		&nbsp;
	<? } ?>

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
	<? } else { ?>
		&nbsp;
	<? } ?>

<? } elseif ($hdr_id == 'info') { ?>

	<? if (!in_array($hdr_id, $_interface->csHideGroupFields) || $show_article == 1) { ?>

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

	<? } else { ?>
		&nbsp;
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
</tr><?php ;
		}

		if ($show_article && $indexGroup == 1) {
			$oldMC = true;
		}

		if ($SearchSetting['csAmountForGroup'] && $SearchSetting['csAmountForGroup'] < $counterRowsAB && !$showMany) {
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

	</table>
</form>
<?php ; ?>

			<? if ($__search_results['controls']) { ?>

				<? foreach ($__search_results['controls'] as $hdr_id=>$control) { ?>

					<? if ($hdr_id !== 'searchPages') { continue; } ?>
					<div class="<?=($hdr_id=="filter"?'notice':'')?>" style="padding-top: 0px; padding-bottom: 0px;<?=($hdr_id=="filter"?'min-width:1000px;':'')?>">
						<?=$control?>
					</div>

				<? } ?>

			<? } ?>

		<? } ?>

		<? if (!$SearchSetting['admin_search']) { ?>

<noindex>
<p><small><a href="/shop/report_error.html?errid=E2&article=<?=$SearchSetting['dirtySearchCode']?>&brand=<?=$SearchSetting['searchBrand']?>"><img src="/_sysimg/info2.gif" align="absmiddle" hspace="5" border="0"/><?=$AR_MSG['SearchModule']['msg21']?></a></small></p>
</noindex>

<? if (($clientData['cst_category_id'] > 1) && !$clientData['retail']) { ?>

<div style="background: #D0D0D0; padding: 10px; margin-top: 10px; margin-bottom: 10px;">

<b><?=$AR_MSG['SearchModule']['msg22']?></b>

</div>

<? } ?>

<? } ?>

<?
	
	if (sizeof($showDelivery)>0 || $show_replacement_conditions) {
	$Deliveries = $showDelivery;
	$k = 0;
	
?>


<div class="notice"><b><?=$AR_MSG['SearchModule']['msg23']?></b>

<? foreach ($Deliveries as $dlv=>$delivery) { ?>

<? $k++; ?>	

<div style="padding: 10px">

<sup><font color="#990000"><?=$k?></font></sup>		
<?=$delivery['dlv_text']?>&nbsp;
</div>

<? } ?>

<? if ($show_replacement_conditions==1) { ?>

<div style="padding: 5px">
<span style="color: #990000"><sup>
			<a title="<?=$row['superseded_by']?>" style="font-weight: bold; width: 10px; background: #990000; color: #FFFFFF; padding: 1px; cursor: default"><?=$AR_MSG['SearchModule']['msg48']?></a>
			</sup></span>		
<?=$AR_MSG['SearchModule']['msg24']?>&nbsp;
</div>

<div style="padding: 5px">
<span style="color: #990000"><sup>
			<a title="<?=$row['replacement_for']?>" style="width: 10px; background: #000000; color: #FFFFFF; padding: 1px; cursor: default"><?=$AR_MSG['SearchModule']['msg49']?></a>
			</sup></span>	
<?=$AR_MSG['SearchModule']['msg25']?>&nbsp;
</div><br/>

<? } ?>

</div>

<? } ?><?php ; ?>

	<? } ?>

	<? if ($SearchSetting['invalid_search']) { ?>
		
		<?  /***/?><?=$AR_MSG['SearchModule']['msg26']?>
	<?=$AR_MSG['SearchModule']['msg27']?>
	<?=$AR_MSG['SearchModule']['msg28']?>
	<?=$AR_MSG['SearchModule']['msg29']?>
	<?=$AR_MSG['SearchModule']['msg30']?>
	<?=$AR_MSG['SearchModule']['msg31']?><?php ; ?>

	<? } ?>

<? } else { ?>
	
	<?  /***/?><h2><?=$AR_MSG['SearchModule']['msg39']?></h2>
	
<p><?=$AR_MSG['SearchModule']['msg40']?></p><?php ; ?>

<? } ?>