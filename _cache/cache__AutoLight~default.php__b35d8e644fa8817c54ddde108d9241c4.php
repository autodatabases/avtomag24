<h1><?= tr('Каталог автомобильных ламп', 'AutoLightModule') ?></h1>
<div class="lamp-tabs">
    <div id="auto-light-tabs" class="accordion-tabs accordion-tabs--light">
        <div class="accordion-tabs__list lamp-tabs__list">
            <? foreach ($tabs as $tabIndex => $tab) { ?>
                <button class="accordion-tabs__link lamp-tabs__link"><?= $tab['title'] ?></button>
            <? } ?>
        </div>
        <? foreach ($tabs as $tabIndex => $tab) { ?>
            <div class="accordion-tabs__area">
                <div class="accordion-tab lamp-tabs__tab">
                    <div id="<?= $tab['id'] ?>"></div>
                </div>
            </div>
        <? } ?>
    </div>
</div>
