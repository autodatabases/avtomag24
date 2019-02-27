<h1><?=tr('Категории товаров')?></h1>

<div class="dc-navigation">

    <div class="dc-navigation__nav">
        <form class="dc-navigation__form">
                <input class="dc-navigation__input" type="text" name="dc-navigation-search" id="dc-navigation-search" minlength="2">
                <button class="dc-navigation__sudmit" type="button">
                    <svg class="dc-navigation__svg">
                        <use xlink:href="/_sysimg/svg/ui.svg#search">
                        </use>
                    </svg>
                </button>
        </form>
        <ul class="dc-navigation__list">
        <?
            foreach($structure as $key => $item) {
                ?><li class="dc-navigation__list-item">
                    <a href="<?=$item['link']?>" class="dc-navigation__link" <?=(empty($item['open_sub'])?"":"data-open-sub")?> data-key-index="<?=$key?>"><?=$item['title']?></a>
                    <? if(isset($item['sublink']) && is_array($item['sublink'])) { ?>
                        <ul class="dc-navigation__content">
                            <?  
                                foreach($item['sublink'] as $subkey => $link) {
                                    ?><li class="dc-navigation__subitem">
                                        <a href="<?=$link['link']?>" data-key-index="<?=$key . '_' . $subkey?>" class="dc-navigation__sublink"><?=$link['title']?></a>
                                    </li><?
                                }
                            ?>
                        </ul>
                    <? } ?>
                </li><?
            }
        ?>
        </ul>
    </div> 
    <div id="tile-navigation"></div>
</div>


