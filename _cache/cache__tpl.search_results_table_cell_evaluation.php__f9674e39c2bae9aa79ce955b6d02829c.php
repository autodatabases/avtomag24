<? if ($row['info_only'] != 1) { ?>

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



<?php ; ?>