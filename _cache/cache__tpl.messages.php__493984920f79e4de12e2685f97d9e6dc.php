<? if (!empty($process_messages['messages'])) {
	foreach ($process_messages['messages'] as $key => $messages) {

		$messageType = $key === 'success_message' ? 'success' : 'error';
		foreach ((array)$messages as $message) {
			if (!empty($message)) {
	?>
	<div class="message message_type_<?= $messageType ?>">
		<div class="message__text">
			<?= $message ?>
		</div>
	</div>
<? } ?><?php ;
		}
	}
} ?>
