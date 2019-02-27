<?
function handlerLevel($item) {
	if($item['published'] && $item['published'] == 'N') return;
	if ($item['level'] < 5) {
		$item['title'] = mb_ucfirst($item['title']);
	} else {
		$item['title'] = strtolower($item['title']);
	}
	?>
	<li<?= ($item['active'] ? ' class="active"' : '') ?>>
		<a data-nav-id="<?= $item['id'] ?>" <?= ($item['url'] ? 'href="' . $item['url'] . '"' : '') ?> <?= ($item['target'] ? 'target="' . $item['target'] . '"' : '') ?>>
		<? if ($item['icon']) { ?>
				<svg class="icon-item">
					<use xlink:href="/_sysimg/admin/admin-nav.svg#<?= $item['icon'] ?>"></use>
				</svg>
			<? } ?>
			<span><?= $item['title'] ?></span>
		</a>
		<?
		if ($item['items']) {
			handlerItems($item['items']);
		}
		?>
	</li>
<?
}

function handlerItems($items) {

	?>
	<ul><?

	foreach ($items as $item) {
		handlerLevel($item);
	}
	?></ul><?
}

?>

<div class="baron-scroll">
	<div class="baron-scroll__scroller">
		<ul id="navigation" class="navigation navigation-main navigation-accordion">
			<? foreach ($menu as $mainStrId => $mainItem) {
				if ($item['level'] < 4) {
					$item['title'] = mb_ucfirst($item['title']);
				} else {
					$item['title'] = strtolower($item['title']);
				}
				?>
				<li class="navigation-header"><span>
					<? if (count($mainItem['items']) == 0 && $mainItem['url']) { ?>
						<a data-nav-id="<?= $mainStrId ?>" href="<?= $mainItem['url'] ?>"><?= $mainItem['title'] ?></a>
					<? } else { ?>
						<?= $mainItem['title'] ?>
					<? } ?>
				</span></li>
				<? if ($mainItem['items']) {
					foreach($mainItem['items'] as $item){
						handlerLevel($item);
					}
				} ?>
			<? } ?>
		</ul>
	</div>
	<div class="baron-scroll__free">
		<div class="baron-scroll__bar"></div>
	</div>
</div>
