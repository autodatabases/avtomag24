<div class="basket-page__bottom">
	<div class="basket-page__bottom-messages">
		<div class="basket-page__bottom-common">
			<p><?= tr('Срок хранения товаров в корзине:', 'BasketModule') ?> <?= $MaxBasketLife ?> <?= $MSG['BasketModule']['msg48'] ?></p>
			<p><?= $MSG['BasketModule']['msg49'] ?> <?= $BasketLife ?> <?= $MSG['BasketModule']['msg48'] ?></p>
		</div>
		<?  /***/?>		<?if($MIN_ORDER_SUMM):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg39']?>: <span class="warning_value"><?=$MIN_ORDER_SUMM?></span>
						<br/><?=$MSG['BasketModule']['msg40']?></p>
				</div>
			</div>
		
		<?endif?>
		
		<?if($RESTRICT_FUND_REMAINS):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg46']?> <span class="warning_value"><?=$FUND_REMAINS?></span></p>
				</div>
			</div>
			
		<?elseif($FUND_REMAINS):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg45']?> <span class="warning_value"><?=$FUND_REMAINS?></span></p>
				</div>
			</div>
		
		<?elseif($RESTRICT_DEBT_SUMM):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg43']?> <span class="warning_value"><?=$MAX_DEBT_SUMM?></span></p>
				</div>
			</div>

		<?elseif($MAX_DEBT_SUMM):?>
			
			<div class="message message_type_error">
				<div class="message__text">
					<p><?=$MSG['Forms']['msg5']?></p>
					<p><?=$MSG['BasketModule']['msg42']?> <span class="warning_value"><?=$MAX_DEBT_SUMM?></span></p>
				</div>
			</div>
			
		<?endif?><?php ; ?>
		<div class="info-notice-list basket-page__bottom-notice">
			<? if($USE_MIN_QUANTITY) { ?>
				<div class="info-notice-list__item">
					<?=tr('Количество товаров, отмеченных данным значком, изменяется только кратно минимальной партии данного товара!', 'BasketModule');?>
				</div>
			<? } ?>
			<div class="info-notice-list__item">
				<svg class="info-notice-list__svg-icon"><use xlink:href="/_sysimg/svg/notice-sprite.svg#cursor-aim"></use></svg>
				<?=tr('Стоимость товаров, отмеченных данным значком, не является конечной и требует согласования с менеджером!', 'BasketModule');?>
			</div>
			<div class="info-notice-list__item">
				<svg class="info-notice-list__svg-icon"><use xlink:href="/_sysimg/svg/notice-sprite.svg#x_round"></use></svg>
				<?=tr('Если Вы хотите удалить деталь из списка, то воспользуйтесь этим значком', 'BasketModule');?>
			</div>
			<div class="info-notice-list__item">
				<svg class="info-notice-list__svg-icon"><use xlink:href="/_sysimg/svg/notice-sprite.svg#comment"></use></svg>
				<?=truc('комментарий к позиции', 'Forms');?>
			</div>
		</div>
	</div>

	<div class="basket-page__bottom-action">
		<?=$basket['fields']['save_amount']['html']?>
		<? if(!$MIN_ORDER_SUMM and !$RESTRICT_DEBT_SUMM): ?>
			<?=$basket['fields']['save_order']['html']?>
		<?endif?>
	</div>
</div>