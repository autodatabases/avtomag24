<?
$auth_client = ((int)$client->cst_category_id > 0 ? true : false);
$__BUFFER->AddContent('HEADER', '<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />');
$__BUFFER->AddContent('CUSTOM_HEADER', '<meta http-equiv="X-UA-Compatible" content="IE=edge">');
$__BUFFER->AddContent('CUSTOM_HEADER', '<meta name="viewport" content="width=device-width, initial-scale=1.0">');
$__BUFFER->AddContent('CUSTOM_HEADER', '<meta name="format-detection" content="telephone=no">');
$__BUFFER->addTrJs('Ещё', 'Common');

Loader::callModule('VerificationMetaTags');


/**@var Translate_API $trApi */
$trApi = Loader::getApi('translate');

Loader::loadModule('ClientBreadcrumbs');
require_once(__spellPATH($_SYSTEM->LOADPAGE));
$pageContent = ob_get_clean();
$h1 = false;
if (strpos($pageContent, "<h1") === false) {
	$h1 = $_SYSTEM->getH1();
	if ($h1 == 'false') {
		$h1 = false;
	}
}
$no_text_pages = ['/search.html', '/', '/registration.html', '/activation.html', '/registration_account.html'];
?>

<body>
<div class="shadow"></div>
<div id="page" class="wrapper">
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 header__wrapper">
					<div class="header__contact-wrapper">
						<? ContentPart('languages-block'); ?>
						<?= Loader::callModule('SelectStockPoint'); ?>
					</div>
					<div class="header__right-wrapper">
						<?= Loader::callModule('LanguageSwitch'); ?>
			      		<? include(PHP_DataRender::includeTemplatePath('/content/tpl.currency_switcher.php')); ?>
						<div class="header__user-info">
							<? include(PHP_DataRender::includeTemplatePath('/common_templates/tpl.user_infoblock.php')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header-nav">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 header-nav__container">
					<div class="header-nav__wrapper">
						<a href="/" class="header-nav__logo" title="<?= trp('На главную страницу %s', 'Common', punycodeDecode($_SYSTEM->DOMAIN)) ?>">
                            <img class="header-nav__picture header-nav__picture_svg" src="<?= $trApi->getImageLng('/images/template/logo.png'); ?>" alt="<?= htmlentities($_interface->project_name) ?>" />
						</a>
						<!--Begin Кнопка для показа меню-->
						<button class="btn-mobile header-nav__btn-mobile">
							<span class="btn-mobile__line"></span>
						</button>
						<!--End Кнопка для показа меню-->
						<div class="header-nav__user-info header__user-info_mobile">
							<? include(PHP_DataRender::includeTemplatePath('/common_templates/tpl.user_infoblock.php')); ?>
						</div>
						<div class="header-catalog">
							<div class="header-catalog__panel">
								<div class="col-xs-12 header-catalog__wrapper">
									<?= Loader::callModule('ClientSearchForm') ?>
								<div class="header-catalog__right">
								

									<? include(PHP_DataRender::includeTemplatePath('/content/tpl.basket_info.php')); ?>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

<div class="header-nav__menu">
	<div class="container">
	<!--Begin Основное меню-->
	<? NavigationPart("main_menu", PHP_DataRender::includeTemplatePath("/content/tpl.main_menu.php", false), "DR_PHP"); ?>
	<!--End Основное меню-->
	</div>
</div>

	<div id="breadcrumbs-line" class="breadcrumbs-line" <? if (in_array($_SYSTEM->REQUESTED_PAGE, array('/', '/error404.html'))) { ?> style="display: none" <? } ?>>
		<div class="container">
			<div class="row">
				<div id="breadcrumbs-list" class="col-xs-12">
					<?= Loader::callModule('ClientBreadcrumbs') ?>
				</div>
			</div>
		</div>
	</div>

	<div class="content">

		<div id="content_inner" class="container <?= (empty($_SYSTEM->REQUEST_MASK['str_system_script']) ? 'text-decoration' : '') ?> <?= (!in_array($_SYSTEM->REQUESTED_PAGE, $no_text_pages) ? 'content-page' : '') ?>">
			<? if (in_array($_SYSTEM->REQUESTED_PAGE, array('/'))): ?>
				<div class="row">
					<div class="col-xs-12 content-page__main-slider">
						<?= Loader::callModule('MainSlider'); ?>
					</div>
				</div>
			<? endif; ?>
			<div class="row">
				<div class="col-xs-12">
					<? if ($h1) { ?> <h1 class="main-title"><?= $h1 ?></h1><? } ?>

					<!--Своя разметка для определенного типа контента-->

					<? if (empty($_SYSTEM->REQUEST_MASK['str_system_script'])): ?>
						<div class="row">
							<div class="col-xs-12 col-lg-9">
								<?= $pageContent ?>
							</div>
						</div>
					<? else: ?>
						<?= $pageContent ?>
					<? endif; ?>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 footer__container">
					<div class="footer__info-content">
						<a class="logo-footer footer__logo" href="/" title="<?= trp('На главную страницу %s', 'Common', punycodeDecode($_SYSTEM->DOMAIN)) ?>">
							<img src="<?= $trApi->getImageLng('/images/template/logo.png') ?>" alt="<?= htmlentities($_interface->project_name) ?>">
						</a>
						<div class="footer__contacts">
							<?= Loader::callModule('SelectStockPoint', ['_tpl' => 'footer']); ?>
						</div>
						<div class="payment-methods footer__payments">
							<div class="payment-methods__item">
                                <svg class="payment-methods__logo">
                                    <use xlink:href="/_sysimg/svg/payments-sprite.svg#visa"></use>
                                </svg>
							</div>
							<div class="payment-methods__item">
								<svg class="payment-methods__logo">
									<use xlink:href="/_sysimg/svg/payments-sprite.svg#mastercard"></use>
								</svg>
							</div>
							<div class="payment-methods__item">
                                <svg class="payment-methods__logo">
                                    <use xlink:href="/_sysimg/svg/payments-sprite.svg#webmoney"></use>
                                </svg>
							</div>
							<div class="payment-methods__item">
								<svg class="payment-methods__logo">
									<use xlink:href="/_sysimg/svg/payments-sprite.svg#paypal"></use>
								</svg>
							</div>
						</div>
						<?= Loader::callModule('CounterTrackers') ?>
					</div>
					<div class="footer__menu hidden-xs">
						<? NavigationPart("footer_menu", PHP_DataRender::includeTemplatePath("/content/tpl.footer_menu.php", false), "DR_PHP"); ?>
					</div>
				</div>
				<?
					include(PHP_DataRender::includeTemplatePath('/common_templates/tpl.btn_scrollUp.php'));
				?>
			</div>
		</div>
		<div class="footer__bottom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="pull-left copyright-company">
							<? ContentPart('footer_left'); ?>
						</div>
						<div class="pull-right copyright-our">

							<?= $_interface->MSG['Template']['copy'] ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<aside class="sidebar">
	<div class="sidebar__container">
		<!-- <p class="sidebar__title">Каталоги<br>товаров</p> -->
		<? NavigationPart("catalogs-menu-inner", PHP_DataRender::includeTemplatePath("/content/tpl.menu_catalogs.php", false), "DR_PHP"); ?>
		</div>
</aside>

<div class="container-push">
	<?
	echo AutoResource_CallModule(
		"LoginFormModule",
		"module.login-form.php",
		"DR_PHP",
		null,
		"",
		$ClientCustomTemplate = "LoginFormModule"
	);
	?>
</div>

<div class="navbar-push visible-xs">
	<div class="navbar-push__inner">
		<button class="navbar-push__close btn-close-nav"></button>
		<? include(PHP_DataRender::includeTemplatePath('/common_templates/tpl.mobile_nav.php')); ?>
	</div>
</div>


<div class="modal fade" id="modal-container" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close ico-auth-close" data-dismiss="modal" aria-label="Close">
					<span class="ico-close"></span>
				</button>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe id="modal-container-frame" class="embed-responsive-item" frameborder="0"></iframe>
				</div>
				<img id="modal-container-img" class="modal__img" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function () {
		<?=$__BUFFER->getJsInitText();?>
	});

</script>

</body>