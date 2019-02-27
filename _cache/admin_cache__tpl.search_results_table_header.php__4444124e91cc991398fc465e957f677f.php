<tr class="search-header">
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
</tr>