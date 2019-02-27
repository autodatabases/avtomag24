<h1><?=tr('Анализ интернет-магазина', 'AdminPageH1')?></h1>

<h2><?=tr("Работа триггеров", "analysis")?></h2>

<div class="notice"><?=$trigger_message?></div>

<h2><?=tr("Анализ настроек", "analysis")?></h2>

<? if(!empty($online_errors)) { ?>

	<h3><?=tr("Критические показатели", "analysis")?></h3>

	<? $i = 1; ?>
	<? foreach ($online_errors as $group => $errors) { ?>

		<div class="error" style="word-wrap: break-word">
			<strong><?=$i++?>. <?=$groups[$group]?>:</strong><br/>
			<ul>

				<? foreach ($errors as $error) { ?>

					<li><?=$error?></li>

				<? } ?>

			</ul>
		</div>


	<? } ?>

<? } ?>

<? if(!empty($online_notices)) { ?>

	<h3><?=tr("Предупреждения", "analysis")?></h3>

	<? $i = 1; ?>
	<? foreach ($online_notices as $group => $errors) { ?>

		<div class="notice" style="word-wrap: break-word">
			<strong><?=$i++?>. <?=$groups[$group]?>:</strong><br/>
			<ul>

				<? foreach ($errors as $error) { ?>

					<li><?=$error?></li>

				<? } ?>

			</ul>
		</div>


	<? } ?>

<? } ?>

<? if (empty($online_errors) and empty($online_notices)) { ?>

	<div class="notice"><?=tr("В ходе анализа нарушений не выявлено", "analysis")?></div>

<? } ?><?php ; ?>

<h2 style="margin-top: 50px"><?=tr("Анализ работы", "analysis")?></h2>

<div class="notice"><?=$offline_message?></div>

<h2><?=tr("Отправка email", "analysis")?></h2>

<?  /***/?><form id="analysis-email-debug" class="analysis-email-debug" name="analysis-email-debug">

	<div class="analysis-email-debug__fields">

		<div class="analysis-email-debug__field">
			<?= tr('E-mail для отладки', 'PricelistsUpload') ?>
		</div>

		<div class="analysis-email-debug__field">
			<input type="email" id="test_email" name="test_email" pattern="\S+@[a-z]+.[a-z]+" placeholder="test@domain.ru" required>
		</div>

		<div class="analysis-email-debug__field">
			<input type="submit" name="send_test_email" value="<?= tr('Отправить письмо', 'PricelistsUpload') ?>" class="submitButton">
		</div>

	</div>

</form>
<?php ; ?>

<? if(!$hideOffline) { ?>

	<? $online_errors = $offline_errors; ?>
	<? $online_notices = $offline_notices; ?>
	<? if(!empty($online_errors)) { ?>

	<h3><?=tr("Критические показатели", "analysis")?></h3>

	<? $i = 1; ?>
	<? foreach ($online_errors as $group => $errors) { ?>

		<div class="error" style="word-wrap: break-word">
			<strong><?=$i++?>. <?=$groups[$group]?>:</strong><br/>
			<ul>

				<? foreach ($errors as $error) { ?>

					<li><?=$error?></li>

				<? } ?>

			</ul>
		</div>


	<? } ?>

<? } ?>

<? if(!empty($online_notices)) { ?>

	<h3><?=tr("Предупреждения", "analysis")?></h3>

	<? $i = 1; ?>
	<? foreach ($online_notices as $group => $errors) { ?>

		<div class="notice" style="word-wrap: break-word">
			<strong><?=$i++?>. <?=$groups[$group]?>:</strong><br/>
			<ul>

				<? foreach ($errors as $error) { ?>

					<li><?=$error?></li>

				<? } ?>

			</ul>
		</div>


	<? } ?>

<? } ?>

<? if (empty($online_errors) and empty($online_notices)) { ?>

	<div class="notice"><?=tr("В ходе анализа нарушений не выявлено", "analysis")?></div>

<? } ?><?php ; ?>

<? } ?>