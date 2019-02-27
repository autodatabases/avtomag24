<?php
/* @var $data \StockInfo\Repository\Countries */
?>
<? if (!Loader::checkModule('ClientBreadcrumbs')) { ?>
	<div class="breadcrumbs">
		<span class="breadcrumbs__item"><a class="breadcrumbs__link breadcrumbs__link_icon_home" href="/" alt="<?= tr('Главная', 'Common') ?>"></a></span>
		<span class="breadcrumbs__item"><a class="breadcrumbs__link" href="/about.html"><?= tr("О компании", "AdminLeftMenu") ?></a></span>
		<span class="breadcrumbs__item"><?= tr("Адреса магазинов", "StockInfo") ?></span>
	</div>
<? } ?>
<div class="stock-info">
	<div class="stock-info__title-region">
		<h1 class="stock-info__title"><?= tr("Адреса магазинов", "StockInfo") ?></h1>
		<div class="stock-info-toggle stock-info__toggle-buttons">
			<button class="stock-info-toggle__button stock-info-toggle__button_icon_map" data-info-type="map">
				<svg class="stock-info-toggle__svg-icon">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/svg/stock-info.svg#map"></use>
				</svg>
				<?= tr("На Карте", "StockInfo") ?></button>
			<button class="stock-info-toggle__button stock-info-toggle__button--active stock-info-toggle__button_icon_list" data-info-type="list">
				<svg class="stock-info-toggle__svg-icon">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/svg/stock-info.svg#list"></use>
				</svg>
				<?= tr("Список", "StockInfo") ?>
			</button>
		</div>
	</div>
	<div data-info-view="map" class="stock-info-map hide">
		<div id="stocks-list-maplist" class="stock-info-maplist stock-info-map__list">
			<div v-for="(shop, key) in shops" v-show="shop.visible" @click="showBalloon(shop.stc_id, $event)" class="stock-info-maplist__item" v-bind:class="{ 'stock-info-maplist__item--active': shop.allocated }">
				<div class="stock-info-maplist__shop-placemark">
					{{ shop.placemarkId }}
				</div>
				<div class="stock-info-maplist__shop-name">
					{{ shop.stc_name }}
				</div>
				<div class="stock-info-maplist__shop-info">
					{{ shop.cty_name }}, {{ shop.stc_address }}
				</div>
				<div class="stock-info-maplist__shop-info">
					{{ shop.stc_worktime }}
				</div>
			</div>
		</div>
		<div class="stock-info-map__mapping">
			<div id="stocks-list-map" class="stock-info-map__ya-map"></div>
		</div>
	</div>
	<div data-info-view="list">
		<table class="stock-info-offices stock-info__offices">
			<?

			$countries = $data->asArray();

			if ($data->count() > 1) {
				/* @var $country \StockInfo\Model\Country */
				/* @var $stock \StockInfo\Model\Stock */
				foreach ($countries as $country) { ?>
					<tbody>
					<tr>
						<td colspan="2" class="stock-info-offices__country"><?= $country->getCntName('countries') ?></td>
					</tr>
					<?
					
/**
 * Created by PhpStorm.
 * User: a.maksimov
 * Date: 06.09.2017
 * Time: 11:26
 */
/* @var $country \StockInfo\Model\Country */
$stocks = $country->getStocks()->asArray();
foreach ($stocks as $stock) { ?>
	<tr class="stock-info-offices__row">
		<td class="stock-info-offices__td stock-info-offices__td_name">
			<a href="<?= $stock->getFullUrl() ?>" class="stock-info-offices__link stock-info-offices__link--stc-name"><?= $stock->getStcName('stocks') ?></a>
		</td>
		<td class="stock-info-offices__td stock-info-offices__td_address">
			<a href="<?= $stock->getFullUrl() ?>" class="stock-info-offices__link"><?= $stock->getCtyName() ? $stock->getCtyName('cities') : "" ?><?= $stock->getCtyName() && $stock->getStcAddress() ? ", " : "" ?><?= $stock->getStcAddress() ? $stock->getStcAddress('stocks') : '' ?></a>
		</td>
	</tr>
<? } ?><?php ;
					?>
					<tr class="stock-info-offices__row stock-info-offices__row--empty">
						<td colspan="2"></td>
					</tr>
					</tbody>
				<? }
			} else {
				$country = current($countries);
				
/**
 * Created by PhpStorm.
 * User: a.maksimov
 * Date: 06.09.2017
 * Time: 11:26
 */
/* @var $country \StockInfo\Model\Country */
$stocks = $country->getStocks()->asArray();
foreach ($stocks as $stock) { ?>
	<tr class="stock-info-offices__row">
		<td class="stock-info-offices__td stock-info-offices__td_name">
			<a href="<?= $stock->getFullUrl() ?>" class="stock-info-offices__link stock-info-offices__link--stc-name"><?= $stock->getStcName('stocks') ?></a>
		</td>
		<td class="stock-info-offices__td stock-info-offices__td_address">
			<a href="<?= $stock->getFullUrl() ?>" class="stock-info-offices__link"><?= $stock->getCtyName() ? $stock->getCtyName('cities') : "" ?><?= $stock->getCtyName() && $stock->getStcAddress() ? ", " : "" ?><?= $stock->getStcAddress() ? $stock->getStcAddress('stocks') : '' ?></a>
		</td>
	</tr>
<? } ?><?php ;
			}

			?>
		</table>
	</div>

</div>

