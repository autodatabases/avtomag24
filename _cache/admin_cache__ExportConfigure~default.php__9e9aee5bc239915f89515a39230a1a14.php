<h1><?= tr("Настройка экспортных функций", 'AdminPageH1') ?></h1>
<div class="export-configure">
	<div class="notice">
		<?= tr("Используйте функции настройки ссылок на экспорт соотвествующих справочников и таблиц, чтобы отфильтровать вывод по нужным критериям (дата/время, клиент, поставщик и т.п.). Доступ к выводу конкретной функции можно получить по URL, сгенерированному в соответствующем текстовом поле. В нем вам необходимо только заменить &lt;ваш пароль&gt; на актуальное значение *.", 'export'); ?>
		<br><br>

		<b><?= tr('Например') ?>:</b> http://ivan:123@server.ru/export/clients.html
		<br><br>

		<small>
			<i><?= tr("* При тестировании по кнопке \"Открыть ссылку\" страница открывается без пары &lt;логин:пароль&gt;. Это связано с ошибкой распознавания этой строки в Internet Explorer", 'export') ?></i>
		</small>
	</div>

	<? include(__spellPATH("LIB:/projects/autoresource/export/configure.filter.php")); ?>

	<? foreach ($forms as $key => $form) { ?>
    <fieldset class="export-configure__fieldset">
        <legend><?= $form['title'] ?></legend>
        <form name="<?= $form['name'] ?>" method="GET">

            <div class="export-configure__field">
                <span class="export-configure__field-title">URL</span>
                <input id="url<?= $key ?>" type="text" value="" name="URL" class="export-configure__field-input" data-export-link="<?= $form['url'] ?>">
                <img src="/_sysimg/upload.gif" title="<?= tr('открыть ссылку', 'export') ?>" class="export-configure__field-img" data-id="url<?= $key ?>" data-export-open>
            </div>
        </form>
    </fieldset>
<? } ?>
</div>

<script>
	window.addEvent('domready', function () {
		window.exportConfigure = new ExportConfigurePage({
			dateNow: '<?=date('Y-m-d')?>'
		});
	});
</script>