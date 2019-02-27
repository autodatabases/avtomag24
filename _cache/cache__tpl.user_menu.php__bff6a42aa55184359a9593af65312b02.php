<?
$level = $CONTENT[0]['str_level'] + 1;
$left = $CONTENT[0]['str_left'];
$right = $CONTENT[0]['str_right'];
$use_svg = false;
?>

<ul class="user-menu">
    <? foreach ($CONTENT as $key => $item) { ?>
        <?
        $iconsMenu = '';
        if ($item['str_metadata']['svg-icon']) {
            $iconsMenu = '<svg class="user-menu__svg-icon"><use xlink:href="/_sysimg/svg/usermi-sprite.svg#' . $item['str_metadata']['svg-icon'] . '"></use></svg>';
        }

        if ($item['str_metadata']['svg-icon-path']) {
            $iconsMenu = '<svg class="user-menu__svg-icon"><use xlink:href="' . $item['str_metadata']['svg-icon-path'] . '"></use></svg>';
        }

        if ($item['str_metadata']['img-icon-path']) {
            $iconsMenu = '<img class="user-menu__img-icon" src="' . $item['str_metadata']['img-icon-path'] . '">';
        }

        ?>

        <? if ($item['str_level'] == $level and $item['str_left'] > $left and $item['str_right'] < $right) { ?>
            <li class="user-menu__item"
                data-separator="<?= ($item['str_metadata']['separator'] == 'yes') ? $item['str_metadata']['separator'] : ''; ?>">
                <a class="user-menu__link" href="<?= $item['str_url'] ?>" <?= (!empty($item['str_metadata']['rel']) ? ' rel="' . $item['str_metadata']['rel'] . '"' : '') . (!empty($item['str_metadata']['data-height']) ? ' data-height="' . $item['str_metadata']['data-height'] . '"' : '') . (!empty($item['str_metadata']['data-width']) ? ' data-width="' . $item['str_metadata']['data-width'] . '"' : '') . (!empty($item['str_metadata']['add-attributes']) ? ' ' . $item['str_metadata']['add-attributes'] . ' ' : '') . ($item['str_metadata']['data-show-modal'] ?  'data-show-modal'  : '')?>>
                    <?= $iconsMenu ?>
                    <?= truc($item['str_title'], 'AdminLeftMenu') ?>

                </a>
            </li>
        <? } ?>
    <? } ?>
    <li class="user-menu__item user-menu__item--last">
        <a class="user-menu__link" href="/?logout">
            <svg class="user-menu__svg-icon">
                <use xlink:href="/_sysimg/svg/usermi-sprite.svg#power"></use>
            </svg>
            <?= truc('Выход') ?>
        </a>
    </li>
</ul>
