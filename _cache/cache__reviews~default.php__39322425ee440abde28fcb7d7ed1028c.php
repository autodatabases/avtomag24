<div class="question">
	<div class="question__inner">
		<h1><?=$h1?></h1>
		<? if ($errorsList) {
			require_once(__spellPATH("LIB_UN:/modules/reviews/tpl/errors.php"));
		}
		if ($formSuccess) {
			require_once(__spellPATH("LIB_UN:/modules/reviews/tpl/success.php"));
		} else {
			if ($questionsList) {
				require_once(__spellPATH("LIB_UN:/modules/reviews/tpl/questions-list.php"));
			}
			require_once(__spellPATH("LIB_UN:/modules/reviews/tpl/question-form.php"));
		} ?>
	</div>
</div>