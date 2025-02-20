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
		<div class="modal__content modal__content--large">
			<h2 class="modal__title"><?php $this->LangContents('AddLocationTitle')?></h2>
			<form class="modal-form" action="/manager/order/addLocation" method="post">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_name" class="field__label"><?php $this->LangContents('AddLocation1')?></label>
							<input type="text" id="add_name" name="add_name" class="field__input" placeholder="<?php $this->LangContents('AddLocation1')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__trio">
						<div class="field">
							<label for="add_houseNumber" class="field__label"><?php $this->LangContents('AddLocation2')?></label>
							<input type="text" id="add_houseNumber" name="add_houseNumber" class="field__input" placeholder="<?php $this->LangContents('AddLocation2')?>" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="add_street" class="field__label"><?php $this->LangContents('AddLocation3')?></label>
							<input type="text" id="add_street" name="add_street" class="field__input" placeholder="<?php $this->LangContents('AddLocation3')?>" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="add_town" class="field__label"><?php $this->LangContents('AddLocation4')?></label>
							<input type="text" id="add_town" name="add_town" class="field__input" placeholder="<?php $this->LangContents('AddLocation4')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="add_zipCode" class="field__label"><?php $this->LangContents('AddLocation5')?></label>
							<input type="text" id="add_zipCode" name="add_zipCode" class="field__input" placeholder="<?php $this->LangContents('AddLocation5')?>" required>
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="add_city" class="field__label"><?php $this->LangContents('AddLocation6')?></label>
							<input type="text" id="add_city" name="add_city" class="field__input" placeholder="<?php $this->LangContents('AddLocation6')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_latitude" class="field__label"><?php $this->LangContents('AddLocation7')?></label>
							<input type="text" id="add_latitude" name="add_latitude" class="field__input" placeholder="<?php $this->LangContents('AddLocation7')?>">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_longitude" class="field__label"><?php $this->LangContents('AddLocation8')?></label>
							<input type="text" id="add_longitude" name="add_longitude" class="field__input" placeholder="<?php $this->LangContents('AddLocation8')?>">
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
			<form action="/manager/order/dell" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button2"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content modal__content--edit">
			<h2 class="modal__title"><?php $this->LangContents('modalTitle')?></h2>
			<form class="modal-form" action="/manager/order/edit" method="post">
				<input type="hidden" id="edit_id" name="edit_id">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="location_A_edit" class="field__label"><?php $this->LangContents('modal1')?></label>
							<select name="location_A_edit" id="location_A_edit" class="field__input">
								<option id="originLocation" selected></option>
								<?php foreach ($params['location'] as $veh): ?>
									<option value="<?php echo $veh['id_location']; ?>">
										<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="departure_date" class="field__label"><?php $this->LangContents('modal2')?></label>
							<input type="datetime-local" id="departure_date" name="departure_date" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="location_B_edit" class="field__label"><?php $this->LangContents('modal3')?></label>
							<select name="location_B_edit" id="location_B_edit" class="field__input">
								<option id="destinLocation" selected></option>
								<?php foreach ($params['location'] as $veh): ?>
									<option value="<?php echo $veh['id_location']; ?>">
										<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="arrival_date" class="field__label"><?php $this->LangContents('modal4')?></label>
							<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
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
	<?php if (!empty($_SESSION["locationManagment"])) : ?>
		<?php flash("locationManagment"); ?>
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
							<a href="/logout" class="menu-user__dropdown-link"><?php $this->LangContentsNav('logOut')?></a>
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
				</ul>
			</nav>
		</div>
		<main class="content">
			<?php if (!empty($_SESSION["addOrder"])) : ?>
				<?php flash("addOrder"); ?>
			<?php endif; ?>
			<h2 class="content__title"><?php $this->LangContents('title')?></h2>
			<div class="content__controls">
				<a href="/manager/order"><button name="submit" class="button button--positive">
					<< </button></a>
			</div>
			<div class="routs-order">
				<div class="routs-order__add--route">
					<?php switch ($_SESSION['orderStatus']) {
						case 'start': ?>
							<form class="modal-form" action="/manager/order/add" method="POST">
								<!-- //TODOdane osobiste -->
								<h3 class=""><?php $this->LangContents('AddRoute1')?></h3>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="name_order" class="field__label"><?php $this->LangContents('AddRoute2')?></label>
											<input type="text" id="name_order" name="name_order" class="field__input" placeholder="<?php $this->LangContents('AddRoute2')?>" required>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="user_order" class="field__label"><?php $this->LangContents('AddRoute3')?></label>
											<select name="user_order" id="user_order" class="field__input">
												<?php foreach ($params['users'] as $veh): ?>
													<option value="<?php echo $veh['id_operator']; ?>">
														<?php echo $veh['login'] . " // " . $veh['name'] . " " . $veh['last_name']; ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="date_due" class="field__label"><?php $this->LangContents('AddRoute4')?></label>
											<input type="date" id="date_due" name="date_due" class="field__input" required>
										</div>
									</div>
								</div>
								<button type="submit" class="button button--positive"><?php $this->LangContents('btmAdd')?></button>
							</form>
						<?php break;
						case 'location': ?>
							<form class="modal-form" action="/manager/order/next" method="POST">
								<!-- //TODOdane osobiste -->
								<h3 class=""><?php $this->LangContents('AddRoute5')?></h3>
								<div class="field-checkbox">
									<input type="checkbox" id="home_adres_togle" class="field-checkbox__input" name="home_adres_togle">
									<label for="home_adres_togle"  class="field-checkbox__label"><?php $this->LangContents('AddRoute6')?></label>
								</div>
								<input type="hidden" name="id_home_location" value="<?php echo $params['adresHome']['id_address'] ?>" />
								<div class="form-add" id="home_adres_view" style="display: none;">
									<?php if (isset($params['adresHome'])) : ?>
										<?php echo $params['adresHome']['town'] ?>
										<?php echo $params['adresHome']['street'] ?>
										<?php echo $params['adresHome']['house_number'] . "<br>" ?>
										<?php echo $params['adresHome']['zip_code'] ?>
										<?php echo $params['adresHome']['city'] ?>
									<?php endif; ?>
								</div>
								<div id="home_adres" style="display: block;">
									<div class="modal-form__row">
										<div class="modal-form__full">
											<div class="field">
												<label for="location_order_A" class="field__label"><?php $this->LangContents('AddRoute7')?></label>
												<select name="location_order_A" id="location_order_A" class="field__input">
													<?php foreach ($params['location'] as $veh): ?>
														<option value="<?php echo $veh['id_location']; ?>">
															<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
														</option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="departure_date_A" class="field__label"><?php $this->LangContents('AddRoute8')?></label>
											<input type="datetime-local" id="departure_date_A" name="departure_date_A" class="field__input">
										</div>
									</div>
								</div>
								<h3 class=""><?php $this->LangContents('AddRoute9')?></h3>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="location_order_B" class="field__label"><?php $this->LangContents('AddRoute10')?></label>
											<select name="location_order_B" id="location_order_B" class="field__input">
												<?php foreach ($params['location'] as $veh): ?>
													<option value="<?php echo $veh['id_location']; ?>">
														<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="arrival_date" class="field__label"><?php $this->LangContents('AddRoute11')?></label>
											<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="departure_date_B" class="field__label"><?php $this->LangContents('AddRoute12')?></label>
											<input type="datetime-local" id="departure_date_B" name="departure_date_B" class="field__input">
										</div>
									</div>
								</div>
								<button type="submit" class="button button--positive"><?php $this->LangContents('btmAdd')?></button>
								<a href="/manager/order/clean" class="button button--negative"><?php $this->LangContents('btmCancel')?></a>
								<a class="button button--positive" onclick="addLocation()"><?php $this->LangContents('btmAddLocation')?></a>
							</form>
						<?php break;
						case 'location2': ?>
							<form class="modal-form" action="/manager/order/end" method="POST">
								<!-- //TODOdane osobiste -->
								<h3 class=""><?php $this->LangContents('AddRoute13')?></h3>
								<?php echo $params['locationA']['location_name'] ?>
								<?php echo $params['locationA']['city'] ?>
								<?php echo $params['locationA']['zip_code'] ?>
								<?php echo $params['locationA']['town'] ?>
								<?php echo $params['locationA']['street'] ?>
								<?php echo $params['locationA']['house_number'] ?>
								<p><?php $this->LangContents('AddRoute15')?></p>
								<h3 class=""><?php $this->LangContents('AddRoute14')?></h3>
								<input type="hidden" name="location_order_A" value="<?php echo $params['locationA']['id_location'] ?>">
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="location_order_B" class="field__label"><?php $this->LangContents('AddRoute10')?></label>
											<select name="location_order_B" id="location_order_B" class="field__input">
												<?php foreach ($params['location'] as $veh): ?>
													<option value="<?php echo $veh['id_location']; ?>">
														<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="arrival_date" class="field__label"><?php $this->LangContents('AddRoute11')?></label>
											<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
										</div>
									</div>
								</div>
								<button type="submit" class="button button--positive"><?php $this->LangContents('btmAdd')?></button>
								<a href="/manager/order/clean" class="button button--negative"><?php $this->LangContents('btmEnd')?></a>
								<a class="button button--positive" onclick="addLocation()"><?php $this->LangContents('btmAddLocation')?></a>
							</form>
						<?php break;
						default: ?>
							<p>Witaj! Twoja rola jest nieznana.</p>
					<?php break;
					} ?>
				</div>
				<div class="routs-order__table--route">
					<?php if (!empty($params['orderList'])) : ?>
						<div class="user-panel">
							<table class="user-panel__table">
								<thead>
									<tr class="user-panel__row">
										<th class="user-panel__header"><?php $this->LangContents('table1')?></th>
										<th class="user-panel__header"><?php $this->LangContents('table2')?></th>
										<th class="user-panel__header"><?php $this->LangContents('table3')?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($params['orderList'] as $orderList): ?>
										<tr class="user-panel__row">
											<td class="user-panel__cell"><?php echo $orderList['origin_location'] . "; " . $orderList['origin_city'] . " ul." . $orderList['origin_street'] . " " . $orderList['origin_house_number']; ?></td>
											<td class="user-panel__cell"><?php echo $orderList['destination_location'] . "; " . $orderList['destination_city'] . " ul." . $orderList['destination_street'] . " " . $orderList['destination_house_number']; ?></td>
											<td class="user-panel__cell user-panel__cell--options">
												<button class="user-panel__icon"><i class="icon-pencil" onclick="editLocation(
									'<?php echo $orderList['id_route']; ?>',
									'<?php echo $orderList['id_origin_location']; ?>',
									'<?php echo $orderList['origin_location'] ?>',
									'<?php echo $orderList['origin_city'] ?>',
									'<?php echo $orderList['origin_street'] ?>',
									'<?php echo $orderList['origin_house_number']; ?>',
									'<?php echo $orderList['id_destination_location']; ?>',
									'<?php echo $orderList['destination_location'] ?>',
									'<?php echo $orderList['destination_city'] ?>',
									'<?php echo $orderList['destination_street'] ?>',
									'<?php echo $orderList['destination_house_number']; ?>',
									'<?php echo $orderList['departure_time'] ?>',
									'<?php echo $orderList['arrival_time']; ?>'
									)"></i></button>
												<button class="user-panel__icon"><i class="icon-trash" onclick="delLocation(
									'<?php echo $orderList['id_route']; ?>'
									)"></i></button>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</main>
	</div>
</body>
<script>
	const togleSection = document.getElementById('home_adres');
	const togleSectionAdres = document.getElementById('home_adres_view');
	const adresCheckbox = document.getElementById('home_adres_togle');
	const adresListCheckbox = document.getElementById('list_adres_togle');
	const sidebar = document.querySelector('.sidebar');
	const topbarHamburger = document.querySelector('.topbar__hamburger');

	const modal1 = document.getElementById('modal1');
	const modal2 = document.getElementById('modal2');
	const modal3 = document.getElementById('modal3');

	const cancelButton = document.getElementById('cancel-button');
	const cancelButton2 = document.getElementById('cancel-button2');
	const cancelButton3 = document.getElementById('cancel-button3');

	function toggleSidebar() {
		sidebar.classList.toggle('sidebar--hidden');
	};

	if (topbarHamburger) {
		topbarHamburger.addEventListener('click', toggleSidebar);
	};

	function delLocation(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function addLocation() {
		document.getElementById('modal1').style.display = 'block';
	};

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

	function editLocation(id, idOriginLocation, originLocation, originCity, originStreet, originHouseNum, idDestinLocation, destinLocation, destinCity, destinStreet, destinHouseNum, departureTime, arrivalTime) {
		document.getElementById('edit_id').value = id;

		document.getElementById('originLocation').textContent = originLocation + "; " + originCity + " ul. " + originStreet + " " + originHouseNum;
		document.getElementById('originLocation').value = idOriginLocation;

		document.getElementById('destinLocation').textContent = destinLocation + "; " + destinCity + " ul. " + destinStreet + " " + destinHouseNum;
		document.getElementById('destinLocation').value = idDestinLocation;


		document.getElementById('departure_date').value = departureTime;
		document.getElementById('arrival_date').value = arrivalTime;

		document.getElementById('modal3').style.display = 'block';
	}

	adresCheckbox.addEventListener('change', function() {
		if (this.checked) {
			togleSection.style.display = 'none';
		} else {
			togleSection.style.display = 'block';
		}

		if (this.checked) {
			togleSectionAdres.style.display = 'block';
		} else {
			togleSectionAdres.style.display = 'none';
		}
	});
</script>

</html>