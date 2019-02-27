<? if (false and $show_icons) { ?>
	<? global $CONST; ?>

	<a href="#" <?=($CONST['debug_mode'] ? 'style="display: none;"' : '')?> target="_blank" id="debug_mode_off" title="<?=$msg = tr('Режим отладки отключен. Включить.', 'Common');?>" alt="<?=$msg?>" onclick="changeSetting('debug_mode', 1); return false;"><img src="/_sysimg/icons/debug_mode_off.png" hspace="5" border="0" align="absmiddle"></a>
	<a href="#" <?=($CONST['debug_mode'] ? '' : 'style="display: none;"')?> target="_blank" id="debug_mode_on" title="<?=$msg = tr('Режим отладки включен. Отключить.', 'Common');?>" alt="<?=$msg?>" onclick="changeSetting('debug_mode', 0); return false;"><img src="/_sysimg/icons/debug_mode_on.png" hspace="5" border="0" align="absmiddle"></a>

	<a href="#" <?=($CONST['not_use_mail'] ? 'style="display: none;"' : '')?> target="_blank" id="not_use_mail_off" title="<?=$msg = tr('Отправка писем отключена. Включить.', 'Common');?>" alt="<?=$msg?>" onclick="changeSetting('not_use_mail', 1); return false;"><img src="/_sysimg/icons/not_use_mail_off.png" hspace="5" border="0" align="absmiddle"></a>
	<a href="#" <?=($CONST['not_use_mail'] ? '' : 'style="display: none;"')?> target="_blank" id="not_use_mail_on" title="<?=$msg = tr('Отправка писем включена. Отключить.', 'Common');?>" alt="<?=$msg?>" onclick="changeSetting('not_use_mail', 0); return false;"><img src="/_sysimg/icons/not_use_mail_on.png" hspace="5" border="0" align="absmiddle"></a>

	<a href="#" <?=($CONST['debug_translate'] ? 'style="display: none;"' : '')?> target="_blank" id="debug_translate_off" title="<?=$msg = tr('Режим перевода отключен. Включить.', 'Common');?>" alt="<?=$msg?>" onclick="changeSetting('debug_translate', 1); return false;"><img src="/_sysimg/icons/debug_translate_off.png" hspace="5" border="0" align="absmiddle"></a>
	<a href="#" <?=($CONST['debug_translate'] ? '' : 'style="display: none;"')?> target="_blank" id="debug_translate_on" title="<?=$msg = tr('Режим перевода включен. Отключить.', 'Common');?>" alt="<?=$msg?>" onclick="changeSetting('debug_translate', 0); return false;"><img src="/_sysimg/icons/debug_translate_on.png" hspace="5" border="0" align="absmiddle"></a>

	<script>
		function changeSetting(name, value) {
			el = $(name+(value ? '_on' : '_off'));
			elOld = $(name+(value ? '_off' : '_on'));
			elOld.firstChild.set('src', '/_sysimg/add_basket_loader.gif');
			var req = new Request({
				method: 'get',
				url: '/admin/webavtr/settings.html?name='+name+'&value='+value,
				onComplete:
					function () {
						elOld.setStyle('display', 'none');
						el.setStyle('display', '');
						elOld.firstChild.set('src', '/_sysimg/icons/' + name + (value ? '_off' : '_on') + '.png');
					}
			}).send();
		}
	</script>
<? } ?>

<? if ($newRrt) { ?>
	<a href="/admin/return-requests/?rrt_rss_id=<?=$rrtDefState?>" title="<?=$msg=trp('У Вас %s новых запросов на возврат', 'Common', $newRrt)?>" alt="<?=$msg?>"><img src="/_sysimg/admin/message.png" vspace="5" hspace="5" border="0" align="absmiddle"></a>
<? } ?>
<? if ($unreadMsg) { ?>
	<a href="/admin/return-requests/?rrt_unread_msg=1" title="<?=$msg=trp('У Вас %s новых сообщений по запросам на возврат', 'Common', $unreadMsg)?>" alt="<?=$msg?>"><img src="/_sysimg/admin/notifications.png" vspace="5" hspace="5" border="0" align="absmiddle"></a>
<? } ?>
<?
if (sizeof($_POST)==0) {

	$printLink = new cLink($_SERVER['REQUEST_URI'], "");
	$printLink->addQueryParam("system_print_mode", "1");
	?>
	<a href="<?=$printLink->link?>" target="_blank" title="<?=tr('Версия для печати', 'Common')?>" alt="<?=tr('Версия для печати', 'Common')?>"><img src="/_sysimg/print.gif" vspace="5" hspace="5" border="0" align="absmiddle"></a>
<? } ?>
<? if($show_tssupport) { ?>
	<a href="#" target="_blank" title="<?=tr('Подать заявку в службу поддержки', 'Common')?>" alt="<?=tr('Подать заявку в службу поддержки', 'Common')?>" onclick="open_tbox_frame('/admin/support/'); return false;"><img src="/_sysimg/mail.png" vspace="5" hspace="5" border="0" align="absmiddle"></a>
<? } ?>
<? if($show_tsreformal) { ?>

	<a title="<?=tr('Идеи улучшения системы «Веб-АвтоРесурс»', 'Common')?>" alt="<?=tr('Идеи улучшения системы «Веб-АвтоРесурс»', 'Common')?>" href="//web-ar.reformal.ru" onclick="Reformal.widgetOpen();return false;" onmouseover="Reformal.widgetPreload();"><img src="/_sysimg/admin/reformal.png" vspace="5" hspace="5" border="0" align="absmiddle" /></a>

	<script type="text/javascript">
		var reformalOptions = {
			project_id: 191848,
			show_tab: false,
			project_host: "web-ar.reformal.ru"
		};

		(function() {
			var script = document.createElement('script');
			script.type = 'text/javascript'; script.async = true;
			script.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'media.reformal.ru/widgets/v3/reformal.js';
			document.getElementsByTagName('head')[0].appendChild(script);
		})();
	</script>

	<noscript><a href="//reformal.ru"><img src="//media.reformal.ru/reformal.png" /></a><a href="//web-ar.reformal.ru"><?=tr('Отзывы', 'Common')?></a></noscript>

<? } ?>
<? if($pageHelp) { ?>
	<a href="#" target="_blank" title="<?=tr('Руководство пользователя по текущему разделу', 'Common')?>" alt="<?=tr('Руководство пользователя по текущему разделу', 'Common')?>"  onclick="open_tbox_html('page_help_div', 600, 600); return false;"><img src="/_sysimg/ar2/help.png" hspace="5" border="0" align="absmiddle"></a>
<? } ?>
<? if($show_tsinfo) { ?>
	<a href="#" target="_blank" title="<?=tr('Информация о системе', 'Common')?>" alt="<?=tr('Информация о системе', 'Common')?>" onclick="open_tbox_html('system_info_div', 300, 300); return false;"><img src="/_sysimg/about.gif" hspace="5" border="0" align="absmiddle"></a>
<? } ?>

<? if (!empty($baskets)) {?>
	<div class="admin-footer__small-basket">
		<div class="mini-basket">
			<a href="<?= $basketUrl ?>" class="mini-basket__basket">
				<span class="mini-basket__count"><?= $totalBasketData['positions'] ?></span>
			</a>
			<ul class="mini-basket__cur-list">
				<? foreach ($baskets as $basket) { ?>
					<li class="mini-basket__cur-item">
						<a class="mini-basket__cur-link" href="<?= $basket['url'] ?>" data-id="<?= $basket['id'] ?>" data-basket-switch>
							<?= $basket['sum'] ?> <strong><?= $basket['sign'] ?></strong>
							<span class="mini-basket__cur-count"><?= $basket['positions'] ?></span>
						</a>
					</li>
				<? } ?>
		</div>
	</div>
<? } ?>

<div style="display:none">
	<div id="system_info_div">
		<?=$StatupWarInfo?>
	</div>
	<div id="page_help_div">
		<?=$pageHelp?>
	</div>
</div>
