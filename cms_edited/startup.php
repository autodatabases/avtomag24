<div class="row" id="main-page">
	<div class="col-xs-12 col-sm-12 col-md-12 originals">
		<p class="section__title"><? ContentPart('accordeon__title'); ?></p>
		<?=Loader::callModule('ClientCatalogLinks')?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 categories">
		<p class="section__title"><? ContentPart('categories__title'); ?></p>
		<?=Loader::callModule('ClientTileLinks')?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 popular">
		<!--Begin Популярные товары-->
		<?= Loader::CallModule('PopularGoods', [/*'catId' => 4*/ 'techName' => 'pop-goods']); ?>
		<!--End Популярные товары-->
		<div class="text-decoration content-page">
			<?= tr(['str_text', $_SYSTEM->SOURCE_ID], 'Content') ?>
		</div>
	</div>
	<div class="last-news col-xs-12 col-sm-12 col-md-12">
		<!--Begin Последние новости-->
		<? NavigationPart("news", PHP_DataRender::includeTemplatePath("/content/tpl.news-startup.php", false), "DR_PHP"); ?>
		<!--End Последние новости-->
	</div>
	<div class="about-us col-xs-12 col-sm-12 col-md-12">
		<p class="section__title"><? ContentPart('about__title'); ?></p>
		<div class="about__container">
			<div class="about__text">
				<? ContentPart('about-us'); ?>
			</div>
		</div>
	</div>
</div>
