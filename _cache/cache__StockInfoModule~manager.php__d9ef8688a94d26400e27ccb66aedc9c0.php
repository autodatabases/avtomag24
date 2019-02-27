<?
/* @var $data \StockInfo\Model\Manager */
$stock = $data->getStock();
?>
<? if (!Loader::checkModule('ClientBreadcrumbs')) { ?>
	<div class="breadcrumbs">
		<span class="breadcrumbs__item"><a class="breadcrumbs__link breadcrumbs__link_icon_home" href="/" alt="<?= tr('Главная', 'Common') ?>"></a></span>
		<span class="breadcrumbs__item"><a class="breadcrumbs__link" href="/about/company/"><?= tr('О компании', 'AdminLeftMenu') ?></a></span>
		<span class="breadcrumbs__item"><a class="breadcrumbs__link" href="/<?= \StockInfo\Model\Stock::URL ?>/"><?= tr('Адреса магазинов', 'StockInfo') ?></a></span>
		<span class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?= $stock->getStcMatchUrl() ?>"><?= $stock->getStcName('stocks') ?></a></span>
		<span class="breadcrumbs__item"><?= tr('Сотрудник магазина', 'StockInfo') ?></span>
	</div>
<? } ?>

<h1><?= $data->getFullname('StockInfo') ?></h1>

<div class="stock-info-manager">
	<? if ($data->getStmAvatar()) { ?>
		<div class="stock-info-manager__avatar">
			<img src="<?= getThumbPath($data->getStmAvatar(), 200, 200) ?>" alt="<?= $data->getFullname('StockInfo')?>" class="stock-info-manager__photo">
		</div>
	<? } ?>
	<div class="stock-info-manager__info">
		<div class="stock-info-manager__name"><?= $data->getFullname('StockInfo') ?></div>
		<div class="stock-info-manager__post"><?= $data->getStmPosition('StockInfo') ?></div>
		<? if ($data->getEmail()) { ?>
			<div class="stock-info-manager__info-list stock-info-manager__info-list_type_mail">
				<svg class="stock-info-manager__svg-icon">
					<use xlink:href="/images/svg/stock-info.svg#mail"></use>
				</svg>
				<?= $data->getEmail() ?>
			</div>
		<? } ?>
		<? if ($data->getPhone()) { ?>
			<div class="stock-info-manager__info-list stock-info-manager__info-list_type_phone">
				<svg class="stock-info-manager__svg-icon">
					<use xlink:href="/images/svg/stock-info.svg#phone"></use>
				</svg>
				<?= $data->getPhone() ?>
			</div>
		<? } ?>
		<? if ($data->getIcq()) { ?>
			<div class="stock-info-manager__info-list stock-info-manager__info-list_type_icq">
				<svg class="stock-info-manager__svg-icon">
					<use xlink:href="/images/svg/stock-info.svg#icq"></use>
				</svg>
				<?= $data->getIcq() ?>
			</div>
		<? } ?>
		<? if ($data->getSkype()) { ?>
			<div class="stock-info-manager__info-list stock-info-manager__info-list_type_skype">
				<svg class="stock-info-manager__svg-icon">
					<use xlink:href="/images/svg/stock-info.svg#skype"></use>
				</svg>
				<?= $data->getSkype() ?>
			</div>
		<? } ?>
	</div>
</div>