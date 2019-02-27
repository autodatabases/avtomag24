<div id="client-catalog-tabs" class="accordion-tabs">
	<? $selectedGroup = array_keys($linkGroups)[0]; ?>
		<div class="accordion-tabs__list <? if (count($linkGroups) == 1) { ?>accordion-tabs__list--no-tabs<? } ?>">
            <? foreach ($linkGroups as $groupId => $group) { ?>
			    <button class="accordion-tabs__link <? if (!$showHeader) { ?> accordion-tabs__link_hidden<? } ?>"><?=tr($group['clg_name'], 'catalog_links_group')?></button>
            <? } ?>
		</div>
       <? foreach ($linkGroups as $groupId => $group) { ?>
        <div class="accordion-tabs__area <?=($selectedGroup === $groupId) ? '' : ''; ?>">
			<?
			switch ($group['clg_type']) {
				case "alpha-list":
					$items = [];
$groupLetter = '';
foreach ((array)$links[$groupId] as $item) {
	$groupLetter = substr($item['cln_name'], 0, 1);
	$items[$groupLetter][$item['cln_name']] = $item;
}
$description = tre('clg_desc_' . $groupId, 'catalog_links_group');
?>
<div class="accordion-tab">
	<? if ($description) { ?>
		<div class="accordion-tab__description">
			<?= tre('clg_desc_' . $groupId, 'catalog_links_group') ?>
		</div>
	<? } ?>
	<div class="brand-catalog-list accordion-tab__grid">
		<div class="brand-catalog-list__wrapper">
			<?php
			if (!empty($items)) {
				foreach ($items as $group_key => $group) { ?>
					<div class="brand-catalog-list__group">
						<div class="brand-catalog-list__group-key"><?= $group_key ?></div>
						<ul class="brand-catalog-list__list">
							<?
							foreach ((array)$group as $brand_key => $brand_item) { ?>
								<li class="brand-catalog-list__item">
									<a href="<?= $brand_item['cln_link'] ?>" class="brand-catalog-list__link" <?= ($brand_item['cln_external'] ? 'target="_blank"' : '') ?>><?= tr($brand_item['cln_name'], 'catalog_links') ?></a>
								</li>
							<? } ?>
						</ul>
					</div>
				<?php }
			} ?>
		</div>
	</div>
</div>
<?php ;
					break;
				case "icon-caption":
					$items = $links[$groupId];
$description = tre('clg_desc_' . $groupId, 'catalog_links_group');
?>
<div class="accordion-tab">
	<? if ($description) { ?>
		<div class="accordion-tab__description">
			<?= tre('clg_desc_' . $groupId, 'catalog_links_group') ?>
		</div>
	<? } ?>
	<div class="grid-card <?= ($addWrapperClass ? " " . $addWrapperClass : "grid-card_type_short-name") ?> accordion-tab__grid">
		<div class="grid-card__wrapper">
			<?php if (!empty($items)) {
				foreach ($items as $item) { ?>
					<a class="grid-card__item<?= $item['cln_class'] ? ' ' . $item['cln_class'] : '' ?>" href="<?= $item['cln_link'] ?>" <?= ($item['cln_external'] ? 'target="_blank"' : '') ?>>
						<?
						switch (true) {
							case $item['cln_img']:
								?>
								<img class="grid-card__img" src="<?= $item['cln_img'] ?>" alt="<?= tr($item['cln_name'], 'catalog_links') ?>"><?
								break;
							case $item['cln_svg']:
								?>
								<svg class="grid-card__svg">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $item['cln_svg'] ?>"></use>
								</svg><?
								break;
						}
						?>
						<span class="grid-card__name"><?= tr($item['cln_name'], 'catalog_links') ?></span>
					</a>
				<?php }
			}?>
		</div>
	</div>
</div>
<?php ;
					break;
				case "icon-text":
						$items = $links[$groupId];
	$description = tre('clg_desc_' . $groupId, 'catalog_links_group');
?>
<div class="accordion-tab">
	<? if ($description) { ?>
		<div class="accordion-tab__description">
			<?= tre('clg_desc_' . $groupId, 'catalog_links_group') ?>
		</div>
	<? } ?>
	<div class="catalog-common accordion-tab__grid">
		<div class="catalog-common__list">

			<?php if (!empty($items)) {
				foreach ($items as $item) { ?>
					<div class="catalog-common__item">
						<a class="catalog-common__link" href="<?=$item['cln_link']?>" <?=($item['cln_external'] ? 'target="_blank"' : '')?>>
							<? if ($item['cln_img']) { ?>
								<div class="catalog-common__picture-container">
									<img src="<?=$item['cln_img']?>" class="catalog-common__picture-icon" alt="<?=tr($item['cln_name'], 'catalog_links')?>"/>
								</div>
							<? } elseif ($item['cln_svg']) { ?>
								<svg class="catalog-common__svg">
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$item['cln_svg']?>"></use>
								</svg>
							<? } elseif ($item['cln_class']) { ?>
								<i class="catalog-card__icon <?=$item['cln_class']?>"></i>
							<? } ?>
							<?=tr($item['cln_name'], 'catalog_links')?></a>
					</div>
				<?php }
			} ?>

		</div>
	</div>


</div>
<?php ;
					break;
				case "only-icons":
					$items = $links[$groupId];
$description = tre('clg_desc_' . $groupId, 'catalog_links_group');
?>
<div class="accordion-tab">

	<? if ($description) { ?>
		<div class="accordion-tab__description">
			<?= tre('clg_desc_' . $groupId, 'catalog_links_group') ?>
		</div>
	<? } ?>

	<div class="grid-card grid-card_type_big-image accordion-tab__grid">
		<div class="grid-card__wrapper">
			<?php if (!empty($items)) {
				foreach ($items as $item) { ?>
					<a class="grid-card__item<?= $item['cln_class'] ? ' ' . $item['cln_class'] : '' ?>" href="<?= $item['cln_link'] ?>" <?= ($item['cln_external'] ? 'target="_blank"' : '') ?>>
						<?
						switch (true) {
							case $item['cln_img']:
								?><img class="grid-card__img" src="<?= $item['cln_img'] ?>" alt="<?= tr($item['cln_name'], 'catalog_links') ?>"><?
								break;
							case $item['cln_svg']:
								?>
								<svg class="grid-card__svg">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $item['cln_svg'] ?>"></use>
								</svg><?
								break;
							default:
								?><span class="grid-card__name"><?= tr($item['cln_name'], 'catalog_links') ?></span><?
								break;
						}
						?>
					</a>
				<?php }
			} ?>
		</div>
	</div>
</div>
<?php ;
					break;
			}
			?>
        </div>
	<? } ?>
</div>
<?
$this->buffer->addJsInit('
			(function() {
				if (typeof window.warUtils.objectFitPolyfill !== "undefined") {
					var images = document.querySelectorAll(\'.catalog-common__picture-icon\');
					if (images.length > 0) {
						var i;
						for (i=0; i < images.length; i++) {
							window.warUtils.objectFitPolyfill(images[i]);
						}
					}
				}
			})();
		');
?>

