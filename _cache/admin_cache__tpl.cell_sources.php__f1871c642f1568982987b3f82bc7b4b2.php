<table cellpadding="1" cellspacing="0" width="100%" border="0">
	<?php if($value['local']) : ?>
	<tr>
		<td align="right" style="border: none;"><?= tr('Прайс-листы', 'SearchModule');?>:</td>
		<td style="border: none; min-width: 1.5em;"><?=$value['local'];?></td>
	</tr>
	<?php endif; ?>

	<?php if($value['web']) : ?>
	<tr>
		<td align="right" style="border: none;"><?= tr('Веб-поставщики', 'SearchModule');?>:</td>
		<td style="border: none; min-width: 1.5em;"><?=$value['web'];?></td>
	</tr>
	<?php endif; ?>

	<?php if($value['info']) : ?>
	<tr>
		<td align="right" style="border: none;"><?= tr('Номенклатура', 'SearchModule');?>:</td>
		<td style="border: none; min-width: 1.5em;"><?=$value['info'];?></td>
	</tr>
	<?php endif; ?>

	<?php if($value['webInfo']) : ?>
	<tr>
		<td align="right" style="border: none;"><?= tr('Веб-Инфо', 'SearchModule');?>:</td>
		<td style="border: none; min-width: 1.5em;"><?=$value['webInfo'];?></td>
	</tr>
	<?php endif; ?>

	<?php if($value['webAnalog']) : ?>
	<tr>
		<td align="right" style="border: none;"><?= tr('Веб-Аналоги', 'SearchModule');?>:</td>
		<td style="border: none; min-width: 1.5em;"><?=$value['webAnalog'];?></td>
	</tr>
	<?php endif; ?>
</table>