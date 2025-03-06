<div class="modal" id="modal1" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('editTitle')?></h2>
			<form class="modal-form" action="/manager/fleet/add" method="post" enctype="multipart/form-data">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_license" class="field__label"><?php $this->LangContents('edit1')?></label>
							<input type="text" id="add_license" name="add_license" class="field__input" placeholder="<?php $this->LangContents('edit1')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__trio">
						<div class="field">
							<label for="add_brand" class="field__label"><?php $this->LangContents('edit2')?></label>
							<input type="text" id="add_brand" name="add_brand" class="field__input" placeholder="<?php $this->LangContents('edit2')?>" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="add_model" class="field__label"><?php $this->LangContents('edit21')?></label>
							<input type="text" id="add_model" name="add_model" class="field__input" placeholder="<?php $this->LangContents('edit21')?>" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="add_production_year" class="field__label"><?php $this->LangContents('edit3')?></label>
							<input type="datetime-local" id="add_production_year" name="add_production_year" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_mileage" class="field__label"><?php $this->LangContents('edit4')?></label>
							<input type="number" id="add_mileage" name="add_mileage" class="field__input" placeholder="<?php $this->LangContents('edit4')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="add_service" class="field__label"><?php $this->LangContents('edit5')?></label>
							<input type="datetime-local" id="add_service" name="add_service" class="field__input">
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="add_end_of_insurance" class="field__label"><?php $this->LangContents('edit6')?></label>
							<input type="datetime-local" id="add_end_of_insurance" name="add_end_of_insurance" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_inspect" class="field__label"><?php $this->LangContents('edit7')?></label>
							<input type="datetime-local" id="add_inspect" name="add_inspect" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="photo" class="form__item__label"><?php $this->LangContents('edit8')?></label>
							<input type="file" name="product_image" id="photo" class="form__item__input" accept="image/*" >
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('modalDelTitle')?></h2>
			<p class="modal__message modal__message--warning"><?php $this->LangContents('modalInfo')?></p>
			<form action="/manager/fleet/del" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button2"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content modal__content--large">
			<h2 class="modal__title"><?php $this->LangContents('modalTitle')?></h2>
			<form class="modal-form" action="/manager/fleet/edit" method="post" enctype="multipart/form-data">
				<input type="hidden" id="edit_id" name="edit_id">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_license" class="field__label"><?php $this->LangContents('modal1')?></label>
							<input type="text" id="edit_license" name="edit_license" class="field__input" placeholder="<?php $this->LangContents('modal1')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_brand" class="field__label"><?php $this->LangContents('modal2')?></label>
							<input type="text" id="edit_brand" name="edit_brand" class="field__input" placeholder="<?php $this->LangContents('modal2')?>" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_model" class="field__label"><?php $this->LangContents('modal3')?></label>
							<input type="text" id="edit_model" name="edit_model" class="field__input" placeholder="<?php $this->LangContents('modal3')?>" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_production_year" class="field__label"><?php $this->LangContents('modal4')?></label>
							<input type="date" id="edit_production_year" name="edit_production_year" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_mileage" class="field__label"><?php $this->LangContents('modal5')?></label>
							<input type="number" id="edit_mileage" name="edit_mileage" class="field__input" placeholder="<?php $this->LangContents('modal5')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_service" class="field__label"><?php $this->LangContents('modal6')?></label>
							<input type="date" id="edit_service" name="edit_service" class="field__input">
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_end_of_insurance" class="field__label"><?php $this->LangContents('modal7')?></label>
							<input type="date" id="edit_end_of_insurance" name="edit_end_of_insurance" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_inspect" class="field__label"><?php $this->LangContents('modal8')?></label>
							<input type="date" id="edit_inspect" name="edit_inspect" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="photo" class="form__item__label"><?php $this->LangContents('modal9')?></label>
							<input type="file" name="product_image1" id="photo" class="form__item__input" accept="image/*" >
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="status" class="field__label"><?php $this->LangContents('modal10')?></label>
							<select name="edit_status" id="edit_status" class="field__input">
									<option value="free"><?php $this->LangContents('modal12')?></option>
									<option value="in use"><?php $this->LangContents('modal13')?></option>
									<option value="in servise"><?php $this->LangContents('modal14')?></option>
							</select>
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_oper" class="field__label"><?php $this->LangContents('modal11')?></label>
							<select name="edit_oper" id="edit_oper" class="field__input">
								<?php foreach ($params['users'] as $veh): ?>
									<option value="<?php echo $veh['id_operator']; ?>">
										<?php echo $veh['login'] . " // " . $veh['name'] . " " . $veh['last_name']; ?>
									</option>
								<?php endforeach; ?>
									<option value="NULL">BRAK</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button3"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>