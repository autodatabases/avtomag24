<?
$level = $CONTENT[0]['str_level'] + 1;
$left = $CONTENT[0]['str_left'];
$right = $CONTENT[0]['str_right'];
?>
<ul class="mobile-menu">
	<? foreach ($CONTENT as $key => $item) {
		if (!($item['str_level'] == $level && $item['str_left'] > $left && $item['str_right'] < $right)) {
			continue;
		}

		$subMenuMobile = '';
		$p_level = $item['str_level'] + 1;
		if (!empty($item['has_childs'])) {
			foreach ($CONTENT as $ch_key => $ch_item) {
				if (
					!$ch_item['str_url'] ||
					!($ch_item['str_level'] >= $p_level && $ch_item['str_left'] > $item['str_left'] && $ch_item['str_right'] < $item['str_right'])
				) {
					continue;
				}

				$active = '';
				if ($_SYSTEM->REQUESTED_PAGE === $ch_item['str_url']) {
					$active = 'mobile-menu-sub__link--active';
				}
				$subMenuMobile .= '
		<li class="mobile-menu-sub__item">
			<a class="mobile-menu-sub__link ' . $active . '" href="' . $ch_item['str_url'] . '">' . truc($ch_item['str_title'], 'AdminLeftMenu') . '</a>
		</li>
				';
			}
		}
		?>
		<li class="mobile-menu__item <?= ($subMenuMobile ? 'mobile-menu__item--dropdown' : '') ?>">
			<a class="mobile-menu__link" href="<?= $item['str_url'] ?>"><?= truc($item['str_title'], 'AdminLeftMenu') ?></a>
			<? if ($subMenuMobile) { ?>
				<ul class="mobile-menu-sub">
					<?= $subMenuMobile ?>
				</ul>
			<? } ?>
		</li>
	<? } ?>
</ul>
