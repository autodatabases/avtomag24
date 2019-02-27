<h1>
	<? if (!empty($VIN)) { ?>
		<?= tr('Результаты поиска по VIN', 'SearchModule') ?><?= (!empty($vinBrands) ? " " . strtoupper( implode('/', $vinBrands) ) : "") ?>:
		<span class="search_code"><?= htmlspecialchars($VIN) ?></span>
	<? } else { ?>
		<?= tr('Результаты поиска по наименованию детали', 'SearchModule') ?>:
		<span class="search_code"><?= htmlspecialchars($SearchSetting['searchCode']) ?></span>
	<? } ?>
</h1>

<?
if (!empty($results['data'])) { ?>

	<div class="table-size-container">
		<div class="web-table-control table-size-container__control">
			<div class="web-table-control__left">
				<?
				$sLink = new cLink($_SERVER['REQUEST_URI'], '');
				$sLink->removeQueryParam("smart_search");
				$sLink->removeQueryParam("_get_block");
				?>
				<a class="btn" href="<?= $sLink->link ?>"><?= tr('Искать только по артикулу', 'SearchModule') ?>:
					<span class="search_code"><?= htmlspecialchars($SearchSetting['searchCode']) ?></span></a>
			</div>
			<div class="web-table-control__right">
				<?= $pagination ?>
			</div>
		</div>

		<?
		$alternatives_table = $results;
		$alternatives_table['tableClass'] = 'table-size-container__table';
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
	</div>



<? } elseif (!empty($VIN)) { ?>

	<div class="warning search-data__empty-warning">

		<? if (!empty($vinInfo)) { ?>
			<?= tr('Расшифровка VIN недоступна', 'SearchModule') ?>
		<? } else { ?>
			<?= tr('VIN не может быть распознан', 'SearchModule') ?>
		<? } ?>

	</div>

	<br/>

	<div class="warning">
		<div class="warning__text">
			<ul>
				<? if (!empty($vinCatalogs)) { ?>
					<li>
						<?= trp('Можете попробовать поискать в %sонлайн-каталоге%s', 'SearchModule', '<a class="warning__link" href="/ccatalogs/' . $vinCatalogs[0] . '/">', '</a>') ?>
					</li>
				<? } ?>

				<li>
					<?= trp('Можете оформить %sVIN-запрос%s', 'SearchModule', '<a class="warning__link" href="/vin/form.html">', '</a>') ?>
				</li>

				<?
				$sLink = new cLink($_SERVER['REQUEST_URI'], '');
				$sLink->removeQueryParam("smart_search");
				?>
				<li>
					<?= trp('Можете поискать как артикул %s', 'SearchModule', '<a class="warning__link" href="' . $sLink->link . '">' . htmlspecialchars($VIN) . '</a>') ?>
				</li>
			</ul>
		</div>
	</div>
<? } else { ?>

	<?  /***/?><div class="warning search-data__empty-warning">

	<? if ($SearchSetting['search_from_catalog']) { ?>
		<p><a class="warning__link" href="<?= $SearchSetting['catalog_search_url'] ?>"><?= $AR_MSG['SearchModule']['msg2'] ?></a></p>
	<? } ?>

	<p><?= $AR_MSG['SearchModule']['msg3'] ?></p>
	<?= $AR_MSG['SearchModule']['msg4'] ?> <a class="warning__link" href="/vin/form.html"><?= $AR_MSG['SearchModule']['msg5'] ?></a>.

	<? if ($SearchSetting['catalog_search']) { ?>
		<a class="warning__link" href="<?= $SearchSetting['catalog_search_url'] ?>"><?= $AR_MSG['SearchModule']['msg6'] ?></a>
	<? } ?>

</div><?php ; ?>

<? }

?>