<?
	$alternatives_table = $alternatives;
	 /***/?><table class="alt-step-table<?=($alternatives_table['tableClass'] ? $alternatives_table['tableClass'] : '')?>">
	<thead>
	<tr class="alt-step-table__header-row">
		<?php
		foreach ($alternatives_table['header'] as $hdr_id => $column) {
			if ($column['visible'] == true) {
				?>
				<th class="alt-step-table__header-cell alt-step-table__header-cell_type_<?= $hdr_id ?>"><?= $column['caption'] ?></th>
				<?
			}
		}
		?>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($alternatives_table['data'] as $row) {
		?>
		<tr class="alt-step-table__row" <?= ($row['data_href'] ? "data-href=\"" . $row["data_href"] . "\"" : "") ?>><?
		foreach ($alternatives_table['header'] as $hdr_id => $column) {
			if ($column['visible'] == true) {
				?>
				<td class="alt-step-table__cell alt-step-table__cell_type_<?= $hdr_id ?>">
					<? if (!empty($row[$hdr_id])) {
						
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
?><?php ;
					} ?>
				</td>
				<?
			}
		}
		?></tr><?
	}
	?>
	</tbody>
</table><?php ;
?>