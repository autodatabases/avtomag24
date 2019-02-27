<? /** @var AutoResource_InterfaceConfig $_interface */
?>
<? if (($row['info_only'] != '1') || ($row['provider_price'] > 0)) { ?>

	<? if (isset($assocBasketWares[$row['hash']])) { ?>
		<span class="basket-items-count"><?= $assocBasketWares[$row['hash']]['amount'] ?></span>
		<span class="btn-add-basket">
			<a href="<?= ($SearchSetting['basketURL'] ? $SearchSetting['basketURL'] : '/shop/basket.html') ?>" class="add-basket__link add-basket__link--added"></a>
		</span>
	<? } else { ?>
		<input type="hidden" id="<?= $row['hash'] ?>" value="<?= $row['_search_id'] ?>">
		<?= $row['amount'] ?>
		<span id="action<?= $row['_search_id'] ?>" class="btn-add-basket"> <?= $row[$hdr_id] ?></span>
		<input type="hidden" id="max_amount_<?=$row['_search_id']?>" value="<?=($_interface->csLeadLettersToNumberForCheckRemains ? strToFloat($row['remains']) : (float)$row['remains'])?>"/>
	<? } ?>

<? } ?>
<?php ; ?>