<h1><?=tr('Подача заявки в службу технической поддержки', 'AdminPageH1')?></h1>
<?
if($success) {
	 /***/?><div class="notice">
	<?=trp('Заявка успешно отправлена в Службу технической поддержки. Подтверждение приема обращения, а также дальнейшая переписка по заявке будут отправляться на почту "%s".', 'SupportRequest', $_REQUEST['email'])?>
<br/><br/>
	<?=trp('Время работы Службы технической поддержки:%sПонедельник - Пятница (кроме праздничных дней)%s9:00 - 18:00 (МСК)', 'SupportRequest', '<br/>', '<br/>')?>
<br/><br/>
	<?=trp('Желаем Вам приятной работы с нашим продуктом.%sС уважением, Служба технической поддержки Компании "ТрэйдСофт".', 'SupportRequest', '<br/>')?>
</div>
<div class="support_request_send">
	<input type="submit" name="send_new" value="<?=tr('Отправить новую заявку', 'SupportRequest')?>" onclick="location.href = '/admin/support/'; return false;" />
	<input type="submit" name="close" value="<?=tr('Закрыть окно', 'Common')?>" onclick="parent.TINY.box.hide(); return false;" />
</div>
<?php ;
} else {
	if($errors) { ?>
<div class="error">
	<?=implode('<br/>', $errors)?>
</div>
<? } else { ?>
<div class="notice">
	<?=tr('Для подачи заявки заполните форму ниже. Пожалуйста, при отправке заявки максимально полно опишите ситуацию и условия, при которых она возникла! Это позволит нам быстрее и лучше разобраться в ситуации и помочь Вам.', 'SupportRequest')?>
</div>
<? } ?>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" name="support_request" id="support_request" onsubmit="return validate_support_form(this)" enctype="multipart/form-data">
	<div id="support_request_params">
		<div class="support_request_param required">
			<div class="param_name">
				<?=tr('E-mail инициатора', 'SupportRequest')?>:
			</div>
			<div class="param_input">
				<input type="text" class="required validate-email" name="email" value="<?=$_REQUEST['email']?>"/>
			</div>
		</div>
		<div class="support_request_param required">
			<div class="param_name">
				<?=tr('Тема заявки', 'SupportRequest')?>:
			</div>
			<div class="param_input">
				<input type="text" class="required" name="subject" value="<?=$_REQUEST['subject']?>"/>
			</div>
		</div>
		<div class="support_request_param required">
			<div class="param_name">
				<?=tr('Тип заявки', 'SupportRequest')?>:
			</div>
			<div class="param_input">
				<select name="type"  class="required">
					<option value=""<?=(!$_REQUEST['type'] ? ' selected="selected"' : '')?>></option>
					<option value="question"<?=($_REQUEST['type'] == 'question' ? ' selected="selected"' : '')?>><?=tr('Вопрос', 'SupportRequest')?></option>
					<option value="cost"<?=($_REQUEST['type'] == 'cost' ? ' selected="selected"' : '')?>><?=tr('Доработка', 'SupportRequest')?></option>
					<option value="error"<?=($_REQUEST['type'] == 'error' ? ' selected="selected"' : '')?>><?=tr('Ошибка', 'SupportRequest')?></option>
				</select>
			</div>
		</div>
		<div class="support_request_param">
			<div class="param_name">
				<?=tr('Текст заявки', 'SupportRequest')?>:
			</div>
			<div class="param_input">
				<textarea name="text" noresize="noresize"><?=$_REQUEST['text']?></textarea>
			</div>
		</div>
		<div class="support_request_param">
			<div class="param_name">
				<?=tr('Файлы', 'SupportRequest')?>:<br/>
				<small><?=tr('Макс. размер каждого файла - не более 2МБ', 'SupportRequest')?></small>
			</div>
			<div class="param_input">
				<div class="file_div">
					<input type="file" name="file1" />
				</div>
				<div class="file_div">
					<input type="file" name="file2" />
				</div>
				<div class="file_div">
					<input type="file" name="file3" />
				</div>
				<div class="file_div">
					<input type="file" name="file4" />
				</div>
				<div class="file_div">
					<input type="file" name="file5" />
				</div>
			</div>
		</div>
		<div class="support_request_send">
			<input type="submit" name="send" value="<?=tr('Отправить', 'Common')?>" />
			<input type="submit" name="close" value="<?=tr('Закрыть окно', 'Common')?>" onclick="parent.TINY.box.hide(); return false;" />
		</div>
	</div>
</form><?php ;
}
?>