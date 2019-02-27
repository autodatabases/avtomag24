<form class="search-form <?= $theme ? 'search-form_theme_' . $theme : '' ?> header-catalog__search-form" name="search_code" action="/search.html" method="GET">
	<div id="search_input" class="search-form__container">
		<?  /***/?><div id="search-history-template" class="user-search-history search-form__history" v-cloak v-if="items.length > 0">
	<div class="user-search-history__show">
		<svg class="user-search-history__icon-svg" >
			<use xlink:href="/_sysimg/svg/usermi-sprite.svg#multisearch-history"></use>
		</svg>
	</div>
	<div class="user-search-history__list-container" v-if="visibleDrop">
		<ul class="user-search-history__list">
			<li class="user-search-history__item" v-for="item in items">
				<a :href="item.url" @click.prevent="clickUrl(item.url)" class="user-search-history__link">{{item.sse_search_number}}</a>
			</li>
		</ul>
	</div>
</div><?php ; ?>
		<?php
		$searchArticle = "";
		if (!empty($_REQUEST['article']) && (strpos($_interface->system->REQUESTED_PAGE, "search") !== false || $_interface->system->REQUESTED_PAGE === '/cats/')) {
			$searchArticle = htmlspecialchars(urldecode($_REQUEST['article']), ENT_QUOTES);
		}
		?>
		<input class="search-form__input" type="text" name="article" value="<?= $searchArticle ?>" placeholder="<?= $exampleArticleText ?>" autocomplete="off"/>

		<?php if ($_interface->useAutocompleteSearchBrand) : ?>
			<input type="hidden" name="brand">
		<?php endif; ?>

		<?
		$smode = ($_REQUEST['smode'] == 'A0' ? 'A0' : 'A');
		$groupsSelect = $_interface->csSearchTemplate === 'groups';
		if ($_COOKIE['searchTemplate']) {
			$groupsSelect = $_COOKIE['searchTemplate'] === 'groups';
		}
		$defaultSearchForm = (!$_REQUEST['term'] && $smode === 'A' && (($_interface->csSearchTemplate === 'groups') === $groupsSelect));
		?>
		<div class="search-setting search-form__settings">
			<button type="button" id="search-setting-toggle" class="<?= ($defaultSearchForm ? " search-setting__icon" : "search-setting__icon search-setting__icon--edit") ?> search-setting__icon--svg">
				<svg class="search-setting__icon-svg">
					<use xlink:href="/_sysimg/svg/ui.svg#settings"></use>
				</svg>
			</button>
			<div class="search-setting__options">
				<?  /***/?><div id="search-full" class="search-full">
	<div class="search-full__col">
		<div class="search-full__title"><?= $_interface->MSG['Template']['searchResultsView'] ?></div>
		<div id="searchTemplate" class="search-full__template">
			<input id="searchTemplateDefault" type="radio" name="st" value="default"<?= ($groupsSelect ? '' : ' checked="checked"') ?>>
			<label class="search-full__label" for="searchTemplateDefault"><?= $_interface->MSG['Template']['classic'] ?></label>
			<input id="searchTemplateGroups" type="radio" name="st" value="groups"<?= ($groupsSelect ? ' checked="checked"' : '') ?>>
			<label class="search-full__label" for="searchTemplateGroups"><?= $_interface->MSG['Template']['groups'] ?></label>
		</div>
		<div class="search-full__smode">
			<input type="checkbox" name="chk_smode" class="search-full__chk-smode" id="chk_smode" <?= ($smode == 'A' ? ' checked="checked"' : '') ?> />
			<label class="search-full__smode-label" for="chk_smode"><?= $_interface->MSG['Template']['searchAnalogs'] ?></label>
		</div>
		<input type="hidden" name="smode" id="smode" value="<?= $smode ?>"/>
		<input type="hidden" name="sort___search_results_by" id="sort___search_results_by" value="final_price"/>
	</div>

	<div class="search-full__col">
		<div class="search-full__title"><?= $_interface->MSG['Template']['term'] ?></div>
		<div class="search-full__term-select">
			<select id="term" name="term">
				<option value="0"<?= ($_REQUEST['term'] == '0' ? ' selected="selected"' : '') ?>><?= $_interface->MSG['Template']['termAny'] ?></option>
				<? foreach ([10, 8, 5, 3, 1] as $term) { ?>
					<option value="<?= $term ?>"<?= ((int)$_REQUEST['term'] == $term ? ' selected="selected"' : '') ?>><?= $_interface->MSG['Template']['term' . $term] ?></option>
				<? } ?>
			</select>
		</div>
	</div>
</div>
<?
$__BUFFER->addScript("FIND:/form/DropDownList.min.js");
$__BUFFER->addJsInit($js = /** @lang JavaScript */ "
									if(typeof DropDownList === 'function'){
										var elSearchTermSelect = new DropDownList({
											name: 'term',
											replaceSelect: " . $CONST['replaceSelect'] . ",
											messages: {
												noneResultsText: '" . tr('Результатов не найдено') . " {0}'
											}
										});
									}
								");
$__BUFFER->addJsInit($js = /** @lang JavaScript */ "
(function() {

	var smodeInput = document.getElementById('smode')
		term = document.getElementById('term'),
		iconClassEdit = 'search-setting__icon--edit',
		searchSettingToggleButton = document.getElementById('search-setting-toggle');

	function checkDefaultSearchSettings() {
		var st = document.querySelector('input[type=\"radio\"][name=\"st\"]:checked');
		if(st.value === '" . $_interface->csSearchTemplate . "' && smodeInput.value === 'A' && parseInt(term.value) === 0) {
			searchSettingToggleButton.classList.remove(iconClassEdit);
		} else {
			searchSettingToggleButton.classList.add(iconClassEdit);
		}
	};

	jqWar('#searchTemplateDefault').change(function () {
		setCookie('searchTemplate', 'default');
		checkDefaultSearchSettings();
	});
	jqWar('#searchTemplateGroups').change(function () {
		setCookie('searchTemplate', 'groups');
		checkDefaultSearchSettings();
	});
	jqWar('#term').change(function () {
		setCookie('term', jqWar(this).val());
		checkDefaultSearchSettings();
	});

	var chkMode = document.getElementById('chk_smode');
	if(smodeInput && chkMode) {
		chkMode.addEventListener('click', function(e) {
			if(this.checked) {
				smodeInput.value = 'A';
			} else {
				smodeInput.value = 'A0';
			}
			setCookie('smode', smodeInput.value);
			checkDefaultSearchSettings();
		});
	}

	function searchSettingsToggle(controlButton) {

		var fadeFull = document.querySelector('.search-full');

		function SettingsToggle(settingDiv, fadeDiv) {
			this.cl = 'search-full--showed';
			this.settingDiv = settingDiv;
			this.fadeDiv = fadeDiv;
			this.showed = false;
			var self = this;
			this.hideEvent = function(e){
				if(self.showed) {
					if(!self.fadeDiv.contains(e.target)){
						self.hide();
					}
				}
			};
		}

		SettingsToggle.prototype.toggle = function() {
			this.showed ? this.hide() : this.show();
		};

		SettingsToggle.prototype.show = function() {
			this.settingDiv.classList.add(this.cl);
			this.showed = true;
			var self = this;
			setTimeout(function(){
				document.addEventListener('click', self.hideEvent);
			},0);
		};

		SettingsToggle.prototype.hide = function() {
			this.settingDiv.classList.remove(this.cl);
			this.showed = false;
			document.removeEventListener('click', this.hideEvent);
		};

		var setting = new SettingsToggle(fadeFull, fadeFull);

		if(fadeFull && controlButton) {
			controlButton.addEventListener('click', function() {
				setting.toggle();
			});
		}

	};

	searchSettingsToggle(searchSettingToggleButton);

})();
		");
?><?php ; ?>
			</div>
		</div>
		<button class="search-form__submit  search-form__submit--svg" type="submit" name="search" title="<?= $_interface->MSG['Template']['searchButton'] ?>">
			<svg class="search-form__submit-svg">
				<use xlink:href="/_sysimg/svg/ui.svg#search"></use>
			</svg>
		</button>
	</div>
	<div class="search-form__live">
		<?  /***/?><div class="search-live" id="vue-search-autocomplete" style="display: none;">
	<div v-show="loading" id="loading_search"></div>
	<div class="search-live__scroll" v-if="showResults && searchResultsProcessed.length" v-on-click-outside="clickOutside">
		<div class="search-live__inner">
			<table class="search-live__table">
				<tr class="search-live__row" v-for="item in searchResultsProcessed" v-on:click="ajaxSearch(item.indexId)">
					<template v-if="item.source === 'more' || item.source === 'vin' || item.source === 'vin2'">
						<td colspan="3" class="search-live__col" v-html="item.comment"></td>
					</template>
					<template v-else>
						<td class="search-live__col" v-html="item.prd_name"></td>
						<td class="search-live__col" v-html="item.code"></td>
						<td class="search-live__col" v-html="item.comment"></td>
					</template>
				</tr>
			</table>
		</div>
	</div>
</div><?php ; ?>
	</div>
</form>
