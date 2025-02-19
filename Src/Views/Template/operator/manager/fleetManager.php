<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Apliakcja internetowa ułatwiająca pracownikom oraz pracodawcy zarzadzane wyjazdami służbowymi">
	<meta name="keywords" content="travel, management, business, tasks, coordination, planning, automation, trips">
	<title>TravelFlow.pl</title>
	<link rel="icon" href="/Public/image/icon.png" type="image/png">
	<link rel="stylesheet" href="/Public/css/main.min.css">
	<link rel="stylesheet" href="/Public/fonts/icon/fontello/css/fontello.css">
</head>

<body>
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
	<?php if (!empty($_SESSION["fleetManager"])) : ?>
		<?php flash("fleetManager"); ?>
	<?php endif; ?>
	<header class="topbar">
		<div class="topbar__hamburger">
			<i class="topbar__bar icon-menu"></i>
		</div>
		<img class="topbar__logo" src="/Public/image/logo_main.png" alt="logo Travel Flow" />
		<img class="topbar__logo2" src="/Public/image/logo_slim.png" alt="logo Travel Flow" />
		<div class="menu-user">
			<ul class="menu-user__list">
				<li class="menu-user__item menu-user__item--dropdown">
					<a href="#" class="menu-user__link1"><?php echo $_SESSION['userLogin']; ?><i class="icon-down-open"></i></a>
					<a href="#" class="menu-user__link2"><i class="icon-torso"></i></a>
					<ul class="menu-user__dropdown">
						<li class="menu-user__dropdown-item">
							<a href="#" class="menu-user__dropdown-link"><?php $this->LangContentsNav('userProfil')?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="#" class="menu-user__dropdown-link"><?php $this->LangContentsNav('settings')?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="/logout-ope" class="menu-user__dropdown-link"><?php $this->LangContentsNav('logOut')?></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</header>
	<div>
		<div class="sidebar">
			<nav class="sidebar__menu">
				<ul class="sidebar__list">
					<li class="sidebar__item"><a href="/manager-dashboard" class="sidebar__link"><?php $this->LangContentsNav('homePage')?></a></li>
					<li class="sidebar__item"><a href="/manager/order" class="sidebar__link"><?php $this->LangContentsNav('order')?></a></li>
					<li class="sidebar__item"><a href="/manager/route" class="sidebar__link"><?php $this->LangContentsNav('route')?></a></li>
					<li class="sidebar__item"><a href="/manager/location" class="sidebar__link"><?php $this->LangContentsNav('location')?></a></li>
					<li class="sidebar__item"><a href="/manager/fleet" class="sidebar__link"><?php $this->LangContentsNav('cars')?></a></li>
					<li class="sidebar__item"><a href="/manager/vehicle" class="sidebar__link"><?php $this->LangContentsNav('car')?></a></li>
					</ul></a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title"><?php $this->LangContents('title')?></h2>
			<div class="content__controls">
				<button class="button button--positive" onclick="addFleet()"><?php $this->LangContents('btmAdd')?></button>
			</div>
			<div class="user-panel">
				<table class="user-panel__table">
					<thead>
						<tr class="user-panel__row">
							<th class="user-panel__header"><?php $this->LangContents('table1')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table2')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table3')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table4')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table5')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table6')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table7')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table8')?></th>
							<th class="user-panel__header"><?php $this->LangContents('table9')?></th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($params['fleet'])) : ?>
							<?php foreach ($params['fleet'] as $fleet): ?>
								<tr class="user-panel__row">
									<td class="user-panel__cell"><?php echo $fleet['brand'] . " " . $fleet['model']; ?></td>
									<td class="user-panel__cell"><?php echo $fleet['license_plate']; ?></td>
									<td class="user-panel__cell"><?php echo $fleet['production_year']; ?></td>
									<td class="user-panel__cell"><?php echo $fleet['last_service']; ?></td>
									<td class="user-panel__cell"><?php echo $fleet['end_of_insurance']; ?></td>
									<td class="user-panel__cell"><?php echo $fleet['end_of_tech_inspect']; ?></td>
									<td class="user-panel__cell"><?php echo $fleet['operator_name'] . " " . $fleet['operator_last_name']; ?></td>
									<td class="user-panel__cell"><?php echo $fleet['status']; ?></td>
									<td class="user-panel__cell user-panel__cell--options">
										<button class="user-panel__icon"><i class="icon-pencil" onclick="editFleet(
									'<?php echo $fleet['id_car']; ?>',
									'<?php echo $fleet['license_plate']; ?>',
									'<?php echo $fleet['brand']; ?>',
									'<?php echo $fleet['model']; ?>',
									'<?php echo $fleet['production_year']; ?>',
									'<?php echo $fleet['mileage']; ?>',
									'<?php echo $fleet['status']; ?>',
									'<?php echo $fleet['id_operator']; ?>',
									'<?php echo $fleet['last_service']; ?>',
									'<?php echo $fleet['end_of_insurance']; ?>',
									'<?php echo $fleet['end_of_tech_inspect']; ?>',
									'<?php echo $fleet['operator_name']; ?>',
									'<?php echo $fleet['operator_last_name']; ?>',
									)"></i></button>
										<button class="user-panel__icon"><i class="icon-trash" onclick="delFleet(
									'<?php echo $fleet['id_car']; ?>'
									)"></i></button>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</main>
	</div>
</body>
<script>
	const sidebar = document.querySelector('.sidebar');
	const topbarHamburger = document.querySelector('.topbar__hamburger');

	function toggleSidebar() {
		sidebar.classList.toggle('sidebar--hidden');
	}

	if (topbarHamburger) {
		topbarHamburger.addEventListener('click', toggleSidebar);
	}

	function addFleet() {
		document.getElementById('modal1').style.display = 'block';
	}

	function delFleet(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function editFleet(id, license, brand, model, production, mileage, status, id_oper, service, insurance, tech_inspect, operator_name, operator_last_name) {
		document.getElementById('edit_id').value = id;
		document.getElementById('edit_license').value = license;
		document.getElementById('edit_brand').value = brand;
		document.getElementById('edit_model').value = model;
		document.getElementById('edit_production_year').value = production;
		document.getElementById('edit_mileage').value = mileage;
		document.getElementById('edit_status').value = status;
		document.getElementById('edit_oper').value = id_oper;
		document.getElementById('edit_service').value = service;
		document.getElementById('edit_end_of_insurance').value = insurance;
		document.getElementById('edit_inspect').value = tech_inspect;

		document.getElementById('modal3').style.display = 'block';
	}

	const cancelButton = document.getElementById('cancel-button');
	const cancelButton2 = document.getElementById('cancel-button2');
	const cancelButton3 = document.getElementById('cancel-button3');

	const modal1 = document.getElementById('modal1');
	const modal2 = document.getElementById('modal2');
	const modal3 = document.getElementById('modal3');

	cancelButton.addEventListener('click', function() {
		modal1.style.display = 'none';
	});

	cancelButton2.addEventListener('click', function() {
		modal2.style.display = 'none';
	});

	cancelButton3.addEventListener('click', function() {
		modal3.style.display = 'none';
	});

	document.addEventListener("keydown", (event) => {
		if (event.key === "Escape") {
			modal1.style.display = 'none';
			modal2.style.display = 'none';
			modal3.style.display = 'none';
		}
	});
</script>

</html>