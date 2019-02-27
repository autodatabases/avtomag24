<? if (!empty($links)) { ?>
	<ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<? foreach ($links as $key => $value) { ?>
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumbs__item <?= ($value['end'] ? 'breadcrumbs__item-end' : '') ?> ">
				<a itemprop="item" href="<?= $value[1] ?>" class="breadcrumbs__link">
					<span itemprop="name"><?= $value[0] ?></span>
				</a>
				<meta itemprop="position" content="<?= $key + 1 ?>" />
			</li>
		<? } ?>
	</ul>
<? } ?>