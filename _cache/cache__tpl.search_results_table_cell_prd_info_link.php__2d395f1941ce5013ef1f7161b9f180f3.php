<? $showingArticle = $row['article'];
if ($SearchSetting['useProtectArticlesByImg']) {
	$showingArticle = '<img src="' . getThumbArticlePath($row['article']) . '" />';
}
?>

<div <?= ($row['brand_full_name'] != "" ? 'title="' . $row['brand_full_name'] . '"' : '') ?> <?= ($row['oem_brand'] == 1 ? 'class="web_ar_oem_brand"' : 'class="web_ar_brand"') ?>>
	<?=(!empty($row['prd_info_exist']) ? "
<a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' class='search-results__info-link' rel='prd_info_link' data-prdId='" . $row['prd_info_exist'] . "'>" . $row['prd_info_link'] . " </a>
<br>
<a href='/info/producers.html?prd=" . $row['prd_info_exist'] ."' class='search-results__article' rel='prd_info_link' data-prdId='" . $row['prd_info_exist'] . "'>" . $showingArticle . " </a>
	" : '
<span class="search-results__info-link">' . $row['prd_info_link'] . '</span>
<br>
<span class="search-results__article">' . $showingArticle . '</span>
	')?>
</div>
<?php ; ?>