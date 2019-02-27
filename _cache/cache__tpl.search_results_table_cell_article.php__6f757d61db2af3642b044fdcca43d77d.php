<?  /***/?><span <?= ($row['parsed_article'] == $SearchSetting['searchCode'] ? 'class="web_ar_search_code"' : '') ?>>
	<nobr>

	<? if ($SearchSetting['useProtectArticlesByImg']) { ?>
		<img src="<?= getThumbArticlePath($row['article']) ?>"/>
	<? } else { ?>
		<?= $row['article'] ?>
	<? } ?>

	<? if ($row['superseded_by'] != '') { ?>

		<? $show_replacement_conditions = 1; ?>
		<span class="superseded">
			<sup>
				<a title="<?= $AR_MSG['SearchModule']['msg14'] ?> <?= $row['superseded_by'] ?>"><?= $AR_MSG['SearchModule']['msg48'] ?></a>
			</sup>
		</span>

	<? } elseif ($row['replacement_for'] != '') { ?>

		<? $show_replacement_conditions = 1; ?>
		<span class="replacement">
			<sup>
				<a title="<?= $AR_MSG['SearchModule']['msg15'] ?> <?= $row['replacement_for'] ?>"><?= $AR_MSG['SearchModule']['msg49'] ?></a>
			</sup>
		</span>

	<? } ?>

	</nobr>
</span>
<?php ; ?>