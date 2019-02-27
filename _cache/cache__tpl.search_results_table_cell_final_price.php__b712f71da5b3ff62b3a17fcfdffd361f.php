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
	<small>
		<span id="phand"><?= $AR_MSG['SearchModule']['msg20'] ?>&nbsp;<nobr><?= $row['detail_phand'] ?></nobr></span>
	</small>

<? } ?>

<?php ; ?>