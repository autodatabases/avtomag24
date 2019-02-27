<?php
switch ($hdr_id) {
	case 'spare':
		 /***/?><?= $row[$hdr_id] ?>
<? if ($hdr_id == 'spare') { ?>
	<? if ($row['superseded_by'] != '') { ?>
		<?= $row['code'] ?> - <?= $AR_MSG['SearchModule']['msg7'] ?><?= $row['superseded_by'] ?>
	<? } ?>
	<? if ($row['replacement_for'] != '') { ?>
		<?= $row['code'] ?> - <?= $AR_MSG['SearchModule']['msg8'] ?><?= $row['replacement_for'] ?>
	<? } ?>
<? } ?><?php ;
		break;
	default:
		echo $row[$hdr_id];
		break;
}
?>