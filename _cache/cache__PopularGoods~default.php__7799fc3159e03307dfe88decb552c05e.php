<? $detailInnerBlock = $settings['useDetailLink'] ? 'a' : 'div' ?>
<? if (!empty($arItems)) { ?>
	<div class="popular-goods__title"><?= tr($arCatalog['name'], 'Common') ?></div>
	<div class="popular-goods__wrapper">
		<div id="popular-goods" class="popular-goods owl-carousel">
			<? foreach ($arItems as $arItem): ?>
				<div class="popular-goods__item">
					<<?= $detailInnerBlock ?> <?=($detailInnerBlock == 'a' ? 'href="' . $arItem['detailUrl'] . '"' : '') ?>>
						<span class="popular-goods__img<?= (!$arItem['image'] ? ' popular-goods__img--empty' : '') ?>">
							<? if ($arItem['image']) { ?>
								<img src="<?= $arItem['image'] ?>" alt="<?= htmlentities($arItem['name'], ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>">
							<? } ?>
						</span>
						<span class="popular-goods__descr">
							<span class="popular-goods__cat"><?= tr($arCatalog['name'], 'dc') ?></span>
							<span class="popular-goods__caption"><?= $arItem['name'] ?></span>
						</span>
					</<?= $detailInnerBlock ?>>
					<div class="popular-goods__bottom">
						<? if (!empty($arItem['price'])) { ?>
							<span class="popular-goods__price"><?= $arItem['price'] ?></span>
							<? $goodBasketUrl = isset($arBasketItemsAssoc[$arItem['article']]) ? $basketUrl : ($basketAddedUrl . '&sid=' . $arItem['basket_sid'] . '&amount=1'); ?>
							<a class="popular-goods__add-basket btn <?= (isset($arBasketItemsAssoc[$arItem['article']]) ? 'btn--basket-added' : 'btn--add-basket') ?>" data-field='popular-goods-basket' data-sid="<?= $arItem['basket_sid'] ?>" href="<?=$goodBasketUrl?>"></a>
						<? } elseif ($arItem['showPriceButton']) { ?>
							<a class="btn dc-buy-button dc-buy-button--full-text" href="<?= Loader::getApi('search')->getSearchUrlWithParams(['article' => $arItem['article']]); ?>" title="<?= tr('Узнать цену', 'dc') ?> <?= $arItem['name'] ?>"><?= tr('Узнать цену', 'dc') ?></a>
						<? } ?>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
<? } ?>