<?
if ($_interface->csUseMultiCurrency){
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
