<? if (($row['remains'] == $AR_MSG['SearchModule']['msg16']) && ($row['info_only'] == 0)) { ?>
	<img src="/images/check.png" title="<?= $AR_MSG['SearchModule']['msg16'] ?>" alt="<?= $AR_MSG['SearchModule']['msg16'] ?>"/>
<? } elseif (($SearchSetting['showExactRemains'] == 1) && ($row['remains'] != '')) { ?>
	<?= $row['remains'] ?>
<? } elseif ($row['remains'] > 0) { ?>
	<?= (float)$row['remains'] ?> <span class="search-col__remains-unit"><?=tr('шт.', 'units')?></span>
<? } else { ?>
	-
<? } ?><?php ; ?>