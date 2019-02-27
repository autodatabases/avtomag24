<div class="stock-info-office__data-row"<?= ($useMicrodata ? ' itemscope itemtype="http://schema.org/LocalBusiness"' : '') ?>>
	<dl class="stock-info-details stock-info-office__contact-details">

		<? if ($useMicrodata) {

			 /***/?><meta itemprop="name" content="<?= $data->getStcName('stocks') ?>" />
<meta itemprop="image" content="<?= CMS_API::createUrl($data->getStcPhotos() ? $data->getStcPhotos()[0] : '/_sysimg/empty.gif') ?>" />
<? if (!empty($data->getStcAddress())) { ?>
	<dt class="stock-info-details__title"><?= tr("Адрес", "Forms") ?></dt>
	<dd class="stock-info-details__item" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<meta itemprop="addressCountry" content="<?= $data->getCntName('countries') ?>" />
		<meta itemprop="addressRegion" content="<?= $data->getRgnName('regions') ?>" />
		<? if ($data->getCtyName()): ?>
			<span itemprop="addressLocality"><?= $data->getCtyName('cities') ?></span>
		<? endif; ?>
		<?= ($data->getCtyName() && $data->getStcAddress() ? ", " : "") ?>
		<? if ($data->getStcAddress()): ?>
			<span itemprop="streetAddress"><?= $data->getStcAddress('stocks') ?></span>
		<? endif; ?>
	</dd>
<? } ?><?php ;
		} else {
			$stcAddress = $data->getStcAddress() ?>
<? if (!empty($data->getStcAddress())) { ?>
	<dt class="stock-info-details__title"><?= tr("Адрес", "Forms") ?></dt>
	<dd class="stock-info-details__item">
		<?= $data->getCtyName() ? $data->getCtyName('cities') : "" ?><?= ($data->getCtyName() && $data->getStcAddress() ? ", " : "") ?><?= $data->getStcAddress() ? $data->getStcAddress('stocks') : "" ?></dd>
<? } ?><?php ;
		}
		if (!empty($data->getStcPhone())) { ?>
			<dt class="stock-info-details__title"><?= tr("Телефон", "Forms") ?></dt>
			<dd class="stock-info-details__item"<?= ($useMicrodata ? ' itemprop="telephone"' : '')?>><?= $data->getStcPhone() ?></dd>
		<? } ?>
		<? if (!empty($data->getStcEmail())) { ?>
			<dt class="stock-info-details__title"><?= tr("Email", "Forms") ?></dt>
			<dd class="stock-info-details__item"<?= ($useMicrodata ? ' itemprop="email"' : '')?>><?= $data->getStcEmail() ?></dd>
		<? } ?>
		<? if (!empty($data->getStcSkype())) { ?>
			<dt class="stock-info-details__title"><?= tr("Skype", "Forms") ?></dt>
			<dd class="stock-info-details__item"><?= $data->getStcSkype() ?></dd>
		<? } ?>
		<? if (!empty($data->getStcModeOnWeeksday()) || !empty($data->getStcModeOnSaturday()) || !empty($data->getStcModeOnSunday())) { ?>
			<dt class="stock-info-details__title"><?= tr("Время работы", "stocks") ?></dt>
			<dd class="stock-info-details__item">
				<?= !empty($data->getStcModeOnWeeksday()) ? $data->getStcModeOnWeeksday('StockInfo') . '<br>' : '' ?>
				<?= !empty($data->getStcModeOnSaturday()) ? tr('сб', 'days') . '.:' . $data->getStcModeOnSaturday('StockInfo') . '<br>' : '' ?>
				<?= !empty($data->getStcModeOnSunday()) ? tr('вс', 'days') . '.:' . $data->getStcModeOnSunday('StockInfo') . '' : '' ?>
			</dd>
		<? } ?>
	</dl>

	<?
	$coord = explode(",", $data->getStcCoordinates());
	if ($useMicrodata) {
	?>
	<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
		<meta itemprop="latitude" content="<?= $coord[0] ?>"/>
		<meta itemprop="longitude" content="<?= $coord[1] ?>"/>
	</div>
	<? } ?>
	<a id="fancybox-yamap" href="#yamap" class="stock-info-office__yamap-container">
		<img src="https://static-maps.yandex.ru/1.x/?ll=<?= $coord[1] ?>,<?= $coord[0] ?>&pt=<?= $coord[1] ?>,<?= $coord[0] ?>,pm2orgm&size=600,300&l=map&spn=0.016457,0.00619&lang=<?= $ym_lng ?>" class="stock-info-office__yamap-img">
	</a>

</div>
<div id="yamap" class="stock-info-office__yamap-modal hide"></div>


