<?
/* @var $data \StockInfo\Model\Stock */
?>
<div class="content-inner__main-top">
	<? if (!Loader::checkModule('ClientBreadcrumbs')) { ?>
		<div class="breadcrumbs">
			<span class="breadcrumbs__item"><a class="breadcrumbs__link breadcrumbs__link_icon_home" href="/" alt="<?= tr('Главная', 'Common') ?>"></a></span>
			<span class="breadcrumbs__item"><a class="breadcrumbs__link" href="/about.html"><?= tr("О компании", "AdminLeftMenu") ?></a></span>
			<span class="breadcrumbs__item"><a class="breadcrumbs__link" href="/<?= \StockInfo\Model\Stock::URL ?>/"><? tr("Адреса магазинов", "StockInfo") ?></a></span>
			<span class="breadcrumbs__item"><?= $data->getStcName('stocks') ?></span>
		</div>
	<? } ?>
</div>
<h1><?= $data->getStcName('stocks') ?></h1>
<div class="stock-info-office">
	<?
	 /***/?><div class="stock-info-office__data-row"<?= ($useMicrodata ? ' itemscope itemtype="http://schema.org/LocalBusiness"' : '') ?>>
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


<?php ;
	 /***/?><div class="stock-info-office__info">
	<? $managers = $data->getManagers()->asArray();
	/* @var $manager \StockInfo\Model\Manager */
	?>
	<? if (!empty($managers)) { ?>
		<h5 class="stock-info-office__subtitle"><?= tr("Сотрудники офиса", "StockInfo") ?></h5>

		<div class="stock-info-office__managers">
			<? foreach ($managers as $manager) { ?>
				<div class="stock-info-manager stock-info-office__manager">
					<a href="<?= $manager->getFullUrl() ?>" class="stock-info-manager__avatar">
						<? if ($manager->getStmAvatar()) { ?>
							<img src="<?= getThumbPath($manager->getStmAvatar(), 200, 200) ?>" alt="<?= $manager->getFullname('_users') ?>" class="stock-info-manager__photo">
						<? } else { ?>
							<span class="stock-info-manager__plug"></span>
						<? } ?>
					</a>

					<div class="stock-info-manager__info">
						<a href="<?= $manager->getFullUrl() ?>" class="stock-info-manager__main-info">
							<span class="stock-info-manager__name"><?= $manager->getFullname('_users') ?></span>
							<span class="stock-info-manager__post"><?= $manager->getStmPosition('StockInfo') ?></span>
						</a>
						<? if ($manager->getEmail()) { ?>
							<div class="stock-info-manager__info-list stock-info-manager__info-list_type_mail">
								<svg class="stock-info-manager__svg-icon">
									<use xlink:href="/images/svg/stock-info.svg#mail"></use>
								</svg>
								<?= $manager->getEmail() ?>
							</div>
						<? } ?>
						<? if ($manager->getPhone()) { ?>
							<div class="stock-info-manager__info-list stock-info-manager__info-list_type_phone">
								<svg class="stock-info-manager__svg-icon">
									<use xlink:href="/images/svg/stock-info.svg#phone"></use>
								</svg>
								<?= $manager->getPhone() ?>
							</div>
						<? } ?>
						<? if ($manager->getIcq()) { ?>
							<div class="stock-info-manager__info-list stock-info-manager__info-list_type_icq">
								<svg class="stock-info-manager__svg-icon">
									<use xlink:href="/images/svg/stock-info.svg#icq"></use>
								</svg>
								<?= $manager->getIcq() ?>
							</div>
						<? } ?>
						<? if ($manager->getSkype()) { ?>
							<div class="stock-info-manager__info-list stock-info-manager__info-list_type_skype">
								<svg class="stock-info-manager__svg-icon">
									<use xlink:href="/images/svg/stock-info.svg#skype"></use>
								</svg>
								<?= $manager->getSkype() ?>
							</div>
						<? } ?>
					</div>
				</div>
			<? } ?>
		</div>
	<? } ?>
</div>
<?php ;
	?>
    <div class="stock-info-office__photos">
        <? $photos = $data->getStcPhotos(); ?>
	    <? if (!empty($photos)) { ?>
		    <? foreach ($photos as $photo) { ?>
                <div class="stock-info-office__single-photo">
                    <img class="stock-info-office__img" src="<?= $photo ?>" >
                </div>
			<? } ?>
	    <? } ?>
    </div><?php ;
	?>
</div>



