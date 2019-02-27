<?
$web_ar_datagrid = $basket['fields']['basket']['html'];
$web_ar_datagrid_source = $basket['sourceFields']['basket']['instance']->datasource;
$data_align = array('left', 'left', 'left', 'left', 'center', 'left', 'right', 'left', 'left', 'left');
?>

<?= $basket['validationScript'] ?>
<form id="<?= $basket['id'] ?>" name="<?= $basket['name'] ?>" action="<?= $basket['action'] ?>" method="<?= $basket['method'] ?>" onsubmit="<?= $basket['onsubmit'] ?>">

	<? if ($_interface->csUseMultiCurrency){
	 /***/?><div id="currency-change-modal" class="basket-currency-change__modal hidden" data-currency="<?= $_interface->nativeCurInfo['id'] ?>">
	<div class="basket-currency-change__body">

		<div class="basket-currency-change__header">
			<?= truc('Изменить валюту', 'MultiCurrency') ?>
		</div>

		<div class="basket-currency-change__comut-container">
			<span class="basket-currency-change__currency-original">
				<?= $_interface->nativeCurInfo['name'] ?>
			</span>
			<span><?= tr('на') ?></span>
			<span class="basket-currency-change__currency-select"><?= $currenciesControl ?></span>
		</div>
	</div>
	<div class="basket-currency-change__footer">
		<div class="basket-currency-change__footer-text">
			<?= tr('Позиция будет перенесена в корзину', 'MultiCurrency') ?> <span currency-selected class="basket-currency-change__footer-currency"></span>
		</div>
		<button currency-change-find class="basket-currency-change__edit-button"><?= truc('Изменить') ?></button>
	</div>
</div><?php ;
}
?>
<div class="basket-page__header">
	<h1 class="basket-page__h1"><?= mb_ucfirst($MSG['BasketModule']['msg33']); ?></h1>
	<?if (!empty($baskets)) {
		 /***/?><div class="mc-switch notice">
	<div class="mc-switch__label">
		<?= tr('Ваши корзины:', 'MultiCurrency') ?>
	</div>
	<? foreach ($baskets as $basketInfo) { ?>
		<? if ($basketInfo['active']) { ?>
			<span class="mc-switch__item mc-switch__item--active"><?= $basketInfo['sum'] ?> <?= $basketInfo['sign'] ?></span>
		<? } else { ?>
          <a href="<?= $basketInfo['url'] ?>" class="mc-switch__item">
            <span href="<?= $basketInfo['url'] ?>" class="mc-switch__item-text"><?= $basketInfo['sum'] ?> <?= $basketInfo['sign'] ?></span>
          </a>
		<? } ?>
	<? } ?>
</div><?php ;
	}?>
	<div>
		<?=$addButtonLink?>
		<?= $importButtonLink ?>
		<? if (!$BASKET_EMPTY): ?>
			<?= $cancelButtonLink ?>
		<? endif ?>
	</div>
</div>
<?php ; ?>
	<? if (!$BASKET_EMPTY): ?>

		<div id="basket_table">
			<? $i = 0;
if (!empty($web_ar_datagrid['controls'])) {
	foreach ($web_ar_datagrid['controls'] as $hdr_id => $control) {
		if ((empty($control_align[$i])) or ($control_align[$i] == 'top')) {
			?>
			<div class="table_control"><?= $control ?></div><?
		}
		$i++;
	}
}

?>

<? if (!empty($web_ar_datagrid['data'])) { ?>

	<?
		$hide_cols = array('weight_display', 'info');//ячейки, которые не попадут в таблицу
		$hide_captions = array('comment');
		$mobile_captions = ['article', 'brand', 'price', 'amount', 'name'];//заголовки ячеек, которые попадут на моб устройства
		$colMobileTitles = [];//заголовки для ячеек на моб устройствах
		$tdCount = 0; //счетчик кол-ва ячеек, которые попадут в таблицу
	?>

	<table class="adapt-table basket-table basket-page__table">
		<thead class="adapt-table__thead">
		<tr class="adapt-table__thead-tr">
			<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

				<? if (($column['visible'] != '1') or (in_array($hdr_id, $hide_cols))) continue; ?>
				<?
				if(!in_array($hdr_id, $hide_captions) && in_array($hdr_id, $mobile_captions)) {
					$colMobileTitles[$hdr_id] = $column['caption'];
				}
				$tdCount++;
				?>
				<th class="adapt-table__th basket-table__th basket-table__th_title_<?=$hdr_id?>"><?= (!in_array($hdr_id, $hide_captions) ? $column['caption'] : '') ?></th>

			<? } ?>

			<?
				$__BUFFER->addScript('/_syslib/modules/module.inputNumberControl.js');
				$__BUFFER->addJsInit("
				var initAmountFix = function(){
					var amounts = document.querySelectorAll('.basket-table__td_title_amount input');
					if(amounts) {
						var i, inp;
						for(i = 0; i < amounts.length; i++) {
							inp = new InputNumberControl({
								input: amounts[i],
								max: amounts[i].getAttribute('data-max'),
								increment: amounts[i].getAttribute('data-min'),
								messages: {
									maxLimitMsg: '" . tr('Данный товар доступен только в количестве %s.', 'SearchModule') . "'
								}
							});
							inp.wrapper.classList.add('basket-table__row-count-control');
						}
					}
				};

				initAmountFix();

				jqWar(document).on('basketReload',function(){
					initAmountFix();
				});

				");
				$__BUFFER->addJsInit("if(window.basketPage) window.basketPage.setColMobileTitles(" . json_encode($colMobileTitles) . ");");
			?>
		</tr>
		</thead>
		<tbody class="adapt-table__tbody">
		<? foreach ($web_ar_datagrid['data'] as $row => $item) { ?>

			<tr class="adapt-table__tr">

				<? if(isset($item['mobile_row_head'])) { ?>
					<td class="adapt-table__tr-head"><?=$item['mobile_row_head']?></td>
				<? } ?>

				<? $i = 0; ?>

				<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

					<? if (($column['visible'] != '1') or (in_array($hdr_id, $hide_cols))) continue; ?>

					<td class="adapt-table__td adapt-table__td_title_<?= $hdr_id ?> basket-table__td basket-table__td_title_<?= $hdr_id ?>">

						<? if ($hdr_id == 'cost_per_weight_display') { ?>

							+ <?= $item[$hdr_id] ?> <?= (!empty($item['weight_display']) ? ' / ' . $item['weight_display'] . ' ' . $MSG['BasketModule']['msg19'] : '') ?>

						<? } elseif ($hdr_id == 'chPos') { ?>

							<?
							$matches = [];
							preg_match('/id=\"(.*)\"/i',$item[$hdr_id],$matches);
							?>

							<?= $item[$hdr_id] ?><label for="<?=$matches[1]?>"></label>

						<? } elseif ($hdr_id == 'summ') { ?>

							<strong><?= $item[$hdr_id] ?></strong>

							<? if (($item['cost_per_weight_value'] > 0) && (empty($item['weight']))) { ?>
								<span title="<?= $MSG['BasketModule']['msg41'] ?>">
									<svg class="basket-table__td-svg-icon">
										<use xlink:href="/_sysimg/svg/notice-sprite.svg#cursor-aim"></use>
									</svg>
								</span>
							<? } ?>

							<? if ($flUseChangeCurrency) { ?>
								<button type="button" data-change-currency data-id="<?= $item['id'] ?>" class="basket__change-currency-position" data-article="<?= $web_ar_datagrid_source[$row]['article'] ?>" data-brand="<?= $web_ar_datagrid_source[$row]['brand'] ?>">
									<img src="/_sysimg/svg/reload_currency.svg"><?= tr('Изменить валюту', 'MultiCurrency') ?>
								</button>
							<? } ?>

						<? } elseif ($hdr_id == 'comment') { ?>

							<div class="click-comment basket-page__click-comment" title="<?=($basket_page === 'make_order' ? tr('Нажмите, чтобы посмотреть комментарий','BasketModule') : tr('Нажмите, чтобы добавить комментарий','BasketModule'))?>">
								<svg class="click-comment__svg-icon"><use xlink:href="/_sysimg/svg/notice-sprite.svg#comment"></use></svg>
								<div class="click-comment__show-area">
									<?= $item[$hdr_id] ?>
								</div>
							</div>

						<? } else { ?>

							<?
							if ($item['manualAdd'] != 1 and in_array($hdr_id, Array('brand', 'article', 'price'))) {
								echo $web_ar_datagrid_source[$row][$hdr_id];
							} else {
								echo $item[$hdr_id];
							}

							?>

						<? } ?>

					</td>

					<? $i++; ?>

				<? } ?>

			</tr>

		<? } ?>
		</tbody>
		<? if ($basket_page == 'make_order') { ?>
			<tbody id="deliveryBody" style="display:none;">
				<tr class="adapt-table__tr basket-table__tr-delivery">
					<? $i = 0; ?>
					<? foreach ($web_ar_datagrid['header'] as $hdr_id => $column) { ?>

						<? if (($column['visible'] != '1') or (in_array($hdr_id, $hide_cols))) continue; ?>

						<td class="adapt-table__td adapt-table__td_title_<?= $hdr_id ?> basket-table__td basket-table__td_title_<?= $hdr_id ?>">
							<? if ($hdr_id == 'name') { ?>
								<?= $MSG['MakeOrderModule']['msg64'] ?>
							<? } elseif ($hdr_id == 'summ') { ?>
								<span id="deliveryDiv"></span>
							<? } ?>
						</td>

						<? $i++; ?>

					<? } ?>
				</tr>
			</tbody>
		<? } ?>
	</table>

	<div class="basket-page__summary">
		<?= $MSG['BasketModule']['msg54'] ?>
		<div id="orderSumAmount" class="basket-table__summary-count"><?= $AMOUNT_SUMM ?> <?= $MSG['BasketModule']['msg55'] ?></div>
		<div id="orderSumm" class="basket-table__summary-price" ><?= $SUMM ?></div>
	</div>

<? } else { ?>

	<p><?= $empty_message ?></p>

<? } ?>

<?
$i = 0;
if (!empty($web_ar_datagrid['controls'])) {
	foreach ($web_ar_datagrid['controls'] as $hdr_id => $control) {
		if ($control_align[$i] == 'bottom') {

			?>
			<div class="table_control"><?= $control ?></div><?

		}
		$i++;
	}
}
?><?php ; ?>
		</div>

		<?  /***/?><div class="basket-page__bottom">
	<div class="basket-page__bottom-messages">
		<div class="basket-page__bottom-common">
			<p><?= tr('Срок хранения товаров в корзине:', 'BasketModule') ?> <?= $MaxBasketLife ?> <?= $MSG['BasketModule']['msg48'] ?></p>
			<p><?= $MSG['BasketModule']['msg49'] ?> <?= $BasketLife ?> <?= $MSG['BasketModule']['msg48'] ?></p>
		</div>
		<?  /***/?>		<?if($MIN_ORDER_SUMM):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg39']?>: <span class="warning_value"><?=$MIN_ORDER_SUMM?></span>
						<br/><?=$MSG['BasketModule']['msg40']?></p>
				</div>
			</div>
		
		<?endif?>
		
		<?if($RESTRICT_FUND_REMAINS):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg46']?> <span class="warning_value"><?=$FUND_REMAINS?></span></p>
				</div>
			</div>
			
		<?elseif($FUND_REMAINS):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg45']?> <span class="warning_value"><?=$FUND_REMAINS?></span></p>
				</div>
			</div>
		
		<?elseif($RESTRICT_DEBT_SUMM):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg43']?> <span class="warning_value"><?=$MAX_DEBT_SUMM?></span></p>
				</div>
			</div>

		<?elseif($MAX_DEBT_SUMM):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg42']?> <span class="warning_value"><?=$MAX_DEBT_SUMM?></span></p>
				</div>
			</div>
			
		<?endif?><?php ; ?>
		<div class="info-notice-list basket-page__bottom-notice">
			<? if($USE_MIN_QUANTITY) { ?>
				<div class="info-notice-list__item">
					<?=tr('Количество товаров, отмеченных данным значком, изменяется только кратно минимальной партии данного товара!', 'BasketModule');?>
				</div>
			<? } ?>
			<div class="info-notice-list__item">
				<svg class="info-notice-list__svg-icon"><use xlink:href="/_sysimg/svg/notice-sprite.svg#cursor-aim"></use></svg>
				<?=tr('Стоимость товаров, отмеченных данным значком, не является конечной и требует согласования с менеджером!', 'BasketModule');?>
			</div>
			<div class="info-notice-list__item">
				<svg class="info-notice-list__svg-icon"><use xlink:href="/_sysimg/svg/notice-sprite.svg#x_round"></use></svg>
				<?=tr('Если Вы хотите удалить деталь из списка, то воспользуйтесь этим значком', 'BasketModule');?>
			</div>
			<div class="info-notice-list__item">
				<svg class="info-notice-list__svg-icon"><use xlink:href="/_sysimg/svg/notice-sprite.svg#comment"></use></svg>
				<?=truc('комментарий к позиции', 'Forms');?>
			</div>
		</div>
	</div>

	<div class="basket-page__bottom-action">
		<?=$basket['fields']['save_amount']['html']?>
		<? if(!$MIN_ORDER_SUMM and !$RESTRICT_DEBT_SUMM): ?>
			<?=$basket['fields']['save_order']['html']?>
		<?endif?>
	</div>
</div><?php ; ?>

	<? else: ?>

		<div class="warning"><?= $BASKET_EMPTY ?></div>

	<?endif ?>
</form>
