<? if ($row[$hdr_id] == '') { ?>
	&nbsp;
<? } else { ?>
	<p data-line-clamp="2" data-tooltip="<?= $row[$hdr_id]; ?>"><?= $row[$hdr_id] ?></p>
<? } ?><?php ; ?>