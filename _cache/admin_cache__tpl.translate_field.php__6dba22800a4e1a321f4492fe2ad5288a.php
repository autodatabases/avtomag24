<link rel="stylesheet" type="text/css" href="/_css/admin.css">
<link rel="stylesheet" type="text/css" href="/_syscss/admin-3.0.css">

<? if ($original) { ?>

	<style>
		.buttons {
			overflow: hidden;
			margin-top: 18px;
		}
		.leftside {
			width: 50%;
			float: left;
			text-align: center;
		}
	</style>
	<h1><?= trp("Перевод слова/фразы: \"%s\"", 'AdminPageH1', $original) ?></h1>
	<? if ($success) { ?>
		<div class="notice"><?=tr('Изменения сохранены')?></div>
	<? } elseif ($fail) { ?>
		<div class="error"><?=tr('Изменения не сохранены, так как не соблюдена уникальность записей!')?></div>
	<? } else { ?>
		<br/>
	<? } ?>
	<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
		<table cellpadding="3" cellspacing="1" class="admin_edit_table" style="width: 100%">
			<tr>
				<th style="width: 10%"><?= tr('Язык', 'Forms') ?></th>
				<th style="width: 90%"><?= tr('Локальный перевод', 'Forms') ?></th>
			</tr>
			<? foreach ($languages as $lng => $name) { ?>
				<tr>
					<td><?=tr($name, '_languages')?></td>
					<td>
						<input type="text" name="<?= $lng ?>" value="<?= $localTranslates[$lng]['txt_translation'] ?>" style="width: 100%"/>
					</td>
				</tr>
			<? } ?>
		</table>

		<div class="buttons">
			<div class="leftside"><input type="submit" value="<?=tr('Сохранить')?>" class="submitButton" name="save"></div>
			<div class="leftside"><input type="submit" value="<?=tr('Закрыть')?>" class="submitButton" onclick="parent.location.reload(); parent.TINY.box.hide(); return false;"></div>
		</div>

	</form>

<? } else { ?>
	<h1><?=tr("Перевод слов/фраз", 'AdminPageH1')?></h1>
	<div class="error"><?=tr('Не найден исходный перевод!', 'Common')?></div>
<? } ?>