<div id="CustomerBasketId">

	<div class="auth-block<?=(!empty($LOGIN_ERROR)) ? ' auth-block--login-error': ''?>">
	<? if (!empty($login)) { ?>

		<?= $login['validationScript'] ?>

		<!-- Modal -->
		<div class="row">
		<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="loginFormTitle">
			<div class="modal-dialog auth-modal-dialog" role="document">
				<div class="auth-modal-content modal-content">
					<div class="auth-modal-header">
						<button type="button" class="close modal-dialog__close" data-dismiss="modal" aria-label="Close"></button>
						<div class="auth-title" id="loginFormTitle"><?= truc('Авторизация', 'Forms') ?></div>
					</div>
					<div class="auth-modal-body modal-body">
						<form id="<?= $login['id'] ?>" name="<?= $login['name'] ?>" action="<?= $login['action'] ?>" method="<?= $login['method'] ?>" onsubmit="<?= $login['onsubmit'] ?>">
							<?= $login['fields']['loginform']['html'] ?>
							<?= $login['fields']['remember']['html'] ?>
							<div class="auth-input">
								<label class="auth-label"><?= truc('Логин', 'LoginFormModule') ?></label>
								<?= $login['fields']['userlogin']['html'] ?>
							</div>
							<div class="auth-input">
								<label class="auth-label"><?= truc('Пароль', 'Forms') ?></label>
								<?= $login['fields']['userpassword']['html'] ?>
							</div>
							<? if (!empty($LOGIN_ERROR)) { ?>
								<div class="login-error-text"><?= $LOGIN_ERROR ?></div>
								<? $__BUFFER->addJsInit("if(!window.isMobile){ jqWar('#myModal').modal('show');}") ?>
							<? } ?>
							<input class="btn btn--auth-submit" type="submit" value="<?= truc('Войти', 'LoginFormModule') ?>">
							<? if (!empty($authButtons)) { ?>
								  <div class="auth-input">
									<? foreach ($authButtons as $authButton) { ?>
									  <?= $authButton ?>
									<? } ?>
								  </div>
							<? } ?>
							<a class="auth-link" href="/recover_password.html"><?= truc('Забыли пароль?', 'LoginFormModule') ?></a>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>

	<? } ?>
	</div>
</div>
