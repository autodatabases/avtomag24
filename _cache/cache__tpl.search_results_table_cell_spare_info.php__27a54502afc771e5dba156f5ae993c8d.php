<?
/** @var AutoResource_InterfaceConfig $_interface */
?>
<? if (!in_array($hdr_id, $_interface->csHideGroupFields) || $show_article == 1) { ?>

	<? if ($row[$hdr_id] == '') { ?>
	&nbsp;
<? } else { ?>
	<p data-line-clamp="2" data-tooltip="<?= $row[$hdr_id]; ?>"><?= $row[$hdr_id] ?></p>
<? } ?><?php ; ?>

	<div class="toggle-link-wrapper">
		<? if ($show_article_real) { ?>
			<?
				$search_results_keys = isset($search_results_keys) ? $search_results_keys : array_keys($__search_results['data']);
				$next = $search_results_keys[array_search($dat_id, $search_results_keys) + 1];
				if ($__search_results['data'][$next]['parsed_article'] === $row['parsed_article'] and $__search_results['data'][$next]['brand'] === $row['brand']) {
			?>
					<img src="/_sysimg/tree/<?=($match_criteria ? 'close' : 'open')?>all.png" class="toggle-link <?=($match_criteria ? 'close' : '')?>" onclick="tooggleGroup(<?=$indexGroup?>, this)" id="toggle-link<?=$indexGroup?>" title="<?=($match_criteria ? tr('Развернуть предложения', 'SearchModule') : tr('Свернуть предложения', 'SearchModule'))?>"/>
				<? } ?>
		<? } ?>
	</div>

<? } else { ?>
	&nbsp;
<? } ?>
