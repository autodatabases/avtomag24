<div class="contact-details contact-details_top">
	<?
	foreach ($_interface->csSelectStockPointPropOrder as $prop) {
		if ($prop === 'address' && $isGuest) {
			 /***/?><div class="contact-details__item">
	<div class="select-stock-point" id="select-stock-point">
		<svg class="select-stock-point__icon">
			<use xlink:href="<?= $svgIconsSprite ?>#address" />
		</svg>
		<button class="select-stock-point__show" type="button">
			<span class="contact-details__value" data-contact-prop="address"><?=$activeStockData['address']?></span>
			<svg class="select-stock-point__show-icon">
				<use xlink:href="/_sysimg/svg/ui.svg#arrow" />
			</svg>
		</button>
		<div id="select-stock-point-list" class="select-stock-point__drop" v-cloak>
			<div class="select-stock-point__header"><?=tr('Выберите торговую точку', 'StockInfo')?>:</div>
			<div class="select-stock-point__container">
				<div class="select-stock-point__list" >
					<div class="select-stock-point__item" v-for="item in list">
						<input class="select-stock-point__radio" v-on:click="selectStock(item.id)" type="radio" value="item.id" v-bind:checked="item.active" :id="item.id" name="select-stock">
						<label class="select-stock-point__label" :for="item.id">
							<span class="select-stock-point__address">{{item.name ? item.name : item.address}}</span>
							<span v-if="item.name" class="select-stock-point__value">{{item.address}}</span>
							<span class="select-stock-point__value" v-for="value in item.data" v-html="value" ></span>
							<button v-if="showMap && item.coordinates" v-on:click="showStockOnMap(item.id)" class="select-stock-point__show-map" type="button"><?=tr('Показать на карте', 'StockInfo')?></button>
						</label>
					</div>
				</div>
				<div class="select-stock-point__map"></div>
			</div>
		</div>
	</div>
</div>
<?php ;
		} else {
			 /***/?><div class="contact-details__item<?=(!$activeStockData[$prop]?' hide':'')?>">
	<svg class="contact-details__icon">
		<use xlink:href="<?= $svgIconsSprite ?>#<?= $prop ?>" />
	</svg>
	<div class="contact-details__value" data-contact-prop="<?=$prop?>"><?= $activeStockData[$prop] ?></div>
</div><?php ;
		}
	}
	?>
</div>
