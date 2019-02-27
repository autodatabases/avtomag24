<h1><?= $title ?></h1>
<table>
<? foreach ($modules as $module) { ?>
	<tr>
		<td><?= $module['name'] ?></td>
		<td><?= $module['version'] ?></td>
	</tr>
<? } ?>
</table>