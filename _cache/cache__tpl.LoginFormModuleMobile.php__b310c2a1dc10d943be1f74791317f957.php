<div id="CustomerBasketId">

	<div class="auth-block<?=(!empty($LOGIN_ERROR)) ? ' auth-block--login-error': ''?>">
	<? if (!empty($login)) { ?>

		<?= $login['validationScript'] ?>

			<div class="auth-title" id="myModalLabel"><?= truc('Авторизация', 'Forms') ?></div>

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

					<? $__BUFFER->addJsInit("
							jqWar('.navbar-push__inner').addClass('navbar-push__inner--show');
							jqWar('.navbar-push').addClass('navbar-push--open');
							jqWar('.shadow').addClass('shadow--open');
							jqWar('.mobile-nav').removeClass('mobile-nav--back').addClass('mobile-nav--forward');
						") ?>
				<? } ?>
				<input class="btn btn--auth-submit" type="submit" value="<?= truc('Войти', 'LoginFormModule') ?>"><br>
				<? if (!empty($authButtons)) { ?>
					<div class="auth-input">
						<? foreach ($authButtons as $authButton) { ?>
							<?= $authButton ?>
						<? } ?>
					</div>
				<? } ?>
				<a class="auth-link" href="/recover_password.html"><?= truc('Забыли пароль?', 'LoginFormModule') ?></a>
			</form>


	<? } ?>
	</div>

</div>