<?
if (ADMIN_PAGE) {
	if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
<tr id="tr_add_recipient_name">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
<tr id="tr_add_country_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
<tr id="tr_add_region_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
<tr id="tr_add_city_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
<tr id="tr_add_district_id">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?></nobr>
	</td>
	<td class="fvalue">
		<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
	</td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
<tr id="tr_add_address">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
<tr id="tr_add_postal_index">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></td>
</tr>
<? } ?>

<? if ($address_form['fields']['add_info']) { ?>
<tr id="tr_add_info">
	<td class="fname">
		<nobr><?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?></nobr>
	</td>
	<td class="fvalue"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></td>
</tr>
<? } ?><?php ;
} else { ?>
	<? if ($address_form['fields'][$adr_prefix . 'add_recipient_name']) { ?>
		<div id="tr_add_recipient_name" class="form-gr form-gr_horizontal_center universal-form__row">
				<label for="add_recipient_name" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['caption'] ?>
				</label>
			<div class="form-gr__control">
				<?= $address_form['fields'][$adr_prefix . 'add_recipient_name']['html'] ?>
			</div>
		</div>
	<? } ?>

	<? if ($address_form['fields'][$adr_prefix . 'add_country_id']) { ?>
		<div id="tr_add_country_id" class="form-gr form-gr_horizontal_center universal-form__row">
				<label for="add_country_id" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_country_id']['caption'] ?>
				</label>
			<div class="form-gr__control">
				<?= $address_form['fields'][$adr_prefix . 'add_country_id']['html'] ?>
			</div>
		</div>
	<? } ?>

	<? if ($address_form['fields'][$adr_prefix . 'add_region_id']) { ?>
		<div id="tr_add_region_id" class="form-gr form-gr_horizontal_center universal-form__row">

				<label for="add_region_id" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_region_id']['caption'] ?>
				</label>
			<div class="form-gr__control">
				<div id="combo_<?= $adr_prefix ?>add_region_id"><?= $address_form['fields'][$adr_prefix . 'add_region_id']['html'] ?></div>
			</div>
		</div>
	<? } ?>

	<? if ($address_form['fields'][$adr_prefix . 'add_city_id']) { ?>
		<div id="tr_add_city_id" class="form-gr form-gr_horizontal_center universal-form__row">

				<label for="add_city_id" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_city_id']['caption'] ?>
				</label>
			<div class="form-gr__control">
				<div id="combo_<?= $adr_prefix ?>add_city_id"><?= $address_form['fields'][$adr_prefix . 'add_city_id']['html'] ?></div>
			</div>
		</div>
	<? } ?>

	<? if ($address_form['fields'][$adr_prefix . 'add_district_id']) { ?>
		<div id="tr_add_district_id" class="form-gr form-gr_horizontal_center universal-form__row">
				<label for="add_district_id" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_district_id']['caption'] ?>
				</label>
			<div class="form-gr__control">
				<div id="combo_<?= $adr_prefix ?>add_district_id"><?= $address_form['fields'][$adr_prefix . 'add_district_id']['html'] ?></div>
			</div>
		</div>
	<? } ?>

	<? if ($address_form['fields'][$adr_prefix . 'add_address']) { ?>
		<div id="tr_add_address" class="form-gr form-gr_horizontal_center universal-form__row">
				<label for="add_address" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_address']['caption'] ?>
				</label>
			<div class="form-gr__control"><?= $address_form['fields'][$adr_prefix . 'add_address']['html'] ?></div>
		</div>
	<? } ?>

	<? if ($address_form['fields'][$adr_prefix . 'add_postal_index']) { ?>
		<div id="tr_add_postal_index" class="form-gr form-gr_horizontal_center universal-form__row">

				<label for="add_postal_index" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_postal_index']['caption'] ?>
				</label>
			<div class="form-gr__control"><?= $address_form['fields'][$adr_prefix . 'add_postal_index']['html'] ?></div>
		</div>
	<? } ?>

	<? if ($address_form['fields']['add_info']) { ?>
		<div id="tr_add_info" class="form-gr form-gr_horizontal_center universal-form__row">
				<label for="add_info" class="form-gr__label">
					<?= $address_form['fields'][$adr_prefix . 'add_info']['caption'] ?>
				</label>
			<div class="form-gr__control"><?= $address_form['fields'][$adr_prefix . 'add_info']['html'] ?></div>
		</div>
	<? } ?>
<? } ?>