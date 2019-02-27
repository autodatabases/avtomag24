<div class="message message_type_error message_view_outline">
	<div class="message__title"><?=$MSG['RegistrationModule']['msg63']?></div>
	<div class="message__text">
		<?=$MSG['RegistrationModule']['msg66']?>
		<?
		$group = 'registration';
		
$errors = Loader::getApi('registration')->getPossibleErrors($group);
$err_order = Loader::getApi('registration')->getOrderRegistrationField($group);
/**
 * @var array $registration
 *
 * @sanitize
 */
unset(
	$registration['messages']['registration_error_fields']
	, $registration['messages']['registration_empty']
);

$_order_keys = array_intersect(
	$err_order,
	array_keys($registration['messages'])
);

$_order_keys = array_merge($_order_keys, array_diff(
	array_keys($registration['messages']),
	$_order_keys
));

foreach ($_order_keys as $key ) {
	$error = [];
	if (isset($errors[$key])) {
		$error = [strip_tags($errors[$key]['text'])];
	} elseif (isset($registration['messages'][$key])) {
		$error = $registration['messages'][$key];

		if (!is_array($error)) {
			$error = [$error];
		}
	}

	foreach ($error as $err) {
		echo "<p><span class='error error-required {$key}'>{$err}</span></p>";
	}

	$g_err[] = $key;
}

?><?php ;
		?>
	</div>
</div>