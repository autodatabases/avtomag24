<?
$level = $CONTENT[0]['str_level'] + 1;
$left = $CONTENT[0]['str_left'];
$right = $CONTENT[0]['str_right'];
?>
<ul class="top-nav top-nav--noinit">
	<? foreach ($CONTENT as $key => $item) {
		if (
			!($item['str_level'] == $level and $item['str_left'] > $left and $item['str_right'] < $right) ||
			$item['str_metadata']['only-mobile'] === 'true'
		) {
			continue;
		}

		$active = false;
		if ($item['str_url'] === $_SYSTEM->REQUESTED_PAGE) {
			$active = true;
		}
		$subMenu = '';
		if (!empty($item['has_childs'])) {
			$p_level = $item['str_level'] + 1;

			foreach ($CONTENT as $ch_key => $ch_item) {

				if (!($ch_item['str_level'] == $p_level and $ch_item['str_left'] > $item['str_left'] and $ch_item['str_right'] < $item['str_right'])) {
					continue;
				}

				if ($ch_item['str_url'] == $_SYSTEM->REQUESTED_PAGE) {
					$active = true;
				}

				$itemClass = 'top-menu-sub__item';
				if ((!empty($CONTENT[$ch_key + 1]['str_level'])) && ($CONTENT[$ch_key + 1]['str_level'] != $ch_item['str_level'])) {
					$itemClass .= ' last';
				}

				$subMenu .= '
		<li class="' . $itemClass . '">
			<a class="top-menu-sub__link" href="' . $ch_item['str_url'] . '">' . truc($ch_item['str_title'], 'AdminLeftMenu') . '</a>
		</li>
				';
			}
		} ?>
		<li class="top-nav__item<?= $active ? ' top-nav__item--active' : '' ?><?= $subMenu ? ' top-nav__item--sub' : '' ?>">
			<a class="top-nav__link" href="<?= (!empty($item['str_url']) ? $item['str_url'] : '#') ?>"><?= truc($item['str_title'], 'AdminLeftMenu') ?></a>
			<? if ($subMenu) { ?>
				<ul class="top-menu-sub">
					<?= $subMenu ?>
				</ul>
			<? } ?>
		</li>
	<? } ?>
</ul>
