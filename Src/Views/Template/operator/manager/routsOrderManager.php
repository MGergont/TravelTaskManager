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
		<div class="modal__content modal__content--add">
			<h2 class="modal__title">Dodawanie lokalizacji</h2>
			<form class="form-add" action="/manager/order/routMain" method="POST">
				<!-- //TODOdane osobiste -->
				<input type="hidden" id="add_id" name="id">
				<h3 class="">Wprowadź dane lokalizacji B</h3>
				<div class="form-add__priv" id="home_adres" style="display: block;">
					<div class="select-wrapper">
						<label for="location_order_B" class="select-wrapper__label">Punkt końcowy</label>
						<select name="location_order_B" id="location_order_B" class="select-wrapper__select">
							<?php foreach ($params['location'] as $veh): ?>
								<option value="<?php echo $veh['id_location']; ?>">
									<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-add__login">
					<div class="field">
						<label for="arrival_date" class="field__label">Data przyjazdu(opcjonalnie)</label>
						<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
					</div>
				</div>
				<button type="submit" class="button-form button-form--positive">Dodaj</button>
				<a href="/manager/order/clean" class="button-form button-form--positive">Anuluj</a>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Account Delate</h2>
			<form action="" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button-form button-form--positive">Confirm</button>
					<a class="button-form button-form--negative" id="cancel-button2">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content modal__content--edit">
			<h2 class="modal__title">Account Edit</h2>
			<form class="edit-modal" action="" method="post">
				<div class="edit-modal__login">
					<div class="field">
						<input type="hidden" id="edit_id" name="edit_id">
						<label for="edit_name" class="field__label">Nazwa</label>
						<input type="text" id="edit_name" name="edit_name" class="field__input" placeholder="Nazwa" required>
					</div>
				</div>
				<div class="edit-modal__line">
					<div class="field">
						<label for="edit_houseNumber" class="field__label">Numer domu</label>
						<input type="text" id="edit_houseNumber" name="edit_houseNumber" class="field__input" placeholder="Numer domu" required>
					</div>
					<div class="field">
						<label for="edit_street" class="field__label">Ulica</label>
						<input type="text" id="edit_street" name="edit_street" class="field__input" placeholder="Ulica" required>
					</div>
				</div>
				<div class="edit-modal__line">
					<div class="field">
						<label for="edit_town" class="field__label">Miejscowość</label>
						<input type="text" id="edit_town" name="edit_town" class="field__input" placeholder="Miejscowość" required>
					</div>
					<div class="field">
						<label for="edit_zipCode" class="field__label">Kod pocztowy</label>
						<input type="text" id="edit_zipCode" name="edit_zipCode" class="field__input" placeholder="Kod pocztowy" required>
					</div>
					<div class="field">
						<label for="edit_city" class="field__label">Miasto</label>
						<input type="text" id="edit_city" name="edit_city" class="field__input" placeholder="Miasto" required>
					</div>
				</div>
				<div class="edit-modal__coord">
					<div class="field">
						<label for="edit_latitude" class="field__label">Wysokość geograficzna</label>
						<input type="text" id="edit_latitude" name="edit_latitude" class="field__input" placeholder="Wysokość geograficzna">
					</div>
				</div>
				<div class="edit-modal__coord">
					<div class="field">
						<label for="edit_longitude" class="field__label">Szerokość geograficzna</label>
						<input type="text" id="edit_longitude" name="edit_longitude" class="field__input" placeholder="Szerokość geograficzna">
					</div>
				</div>
				<div class="modal__actions">
					<button class="button-form button-form--positive">Confirm</button>
					<a class="button-form button-form--negative" id="cancel-button3">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<?php if (!empty($_SESSION["orderManagment"])) : ?>
		<?php flash("orderManagment"); ?>
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
							<a href="#" class="menu-user__dropdown-link">Profil</a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="#" class="menu-user__dropdown-link">Ustawienia</a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="/logout" class="menu-user__dropdown-link">wyloguj się</a>
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
					<li class="sidebar__item"><a href="/manager-dashboard" class="sidebar__link">Strona główna</a></li>
					<li class="sidebar__item"><a href="/manager/order" class="sidebar__link">Zlecenia Delegacji</a></li>
					<li class="sidebar__item"><a href="/manager/route" class="sidebar__link">Delegacja</a></li>
					<li class="sidebar__item"><a href="/manager/location" class="sidebar__link">Lokalizacje</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Zlecenia Delegacji</h2>
			<a href="/manager/order/add"><button name="submit" class="button-form button-form--positive">Dodaj zlecenie delegacji</button></a>
			<div class="user-panel">
				<div class="accordion">
					<div class="accordion__title">
						<div class="accordion__text">Nazwa</div>
						<div class="accordion__text">Data wykonania</div>
						<div class="accordion__text">Data utworzenia/modyfikacji</div>
						<div class="accordion__text">Status</div>
						<div class="accordion__text accordion__toggle"></div>
					</div>
					<?php if (!empty($params['orders'])) : ?>
						<?php foreach ($params['orders'] as $order): ?>
							<div class="accordion__item">
								<div class="accordion__header">
									<div class="accordion__cell"><?php echo $order['order_name']; ?></div>
									<div class="accordion__cell"><?php echo $order['due_date']; ?></div>
									<div class="accordion__cell"><?php echo $order['created_at']; ?></div>
									<div class="accordion__cell"><?php echo $order['status_order']; ?></div>
									<div class="accordion__cell accordion__toggle">+</div>
								</div>
								<div class="accordion__content">
									<table class="accordion__table">
										<thead>
											<tr>
												<th>Lokalizacja A | Nazwa | Adres</th>
												<th>Lokalizacja B | Nazwa | Adres</th>
												<th>Options</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($order['locations'])) : ?>
												<?php foreach ($order['locations'] as $location): ?>
													<tr>
														<td><?php echo $location['origin_name'] . "; " . $location['origin_city']; ?></td>
														<td><?php echo $location['destination_name'] . "; " . $location['destination_city']; ?></td>
														<td class="user-panel__cell user-panel__cell--options">
															<button class="user-panel__icon"><i class="icon-pencil" onclick="editRoute('<?php echo $location['id_route']; ?>')"></i></button>
															<button class="user-panel__icon"><i class="icon-trash" onclick="delRoute('<?php echo $location['id_route']; ?>')"></i></button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
									<div class="accordion__options">
										<div class="accordion__button">
											<button type="submit" name="submit" class="button-form button-form--positive" onclick="addRoute('<?php echo $order['id_order']; ?>')">Dodaj punkt</button>
										</div>
										<div class="accordion__button">
											<button type="submit" name="submit" class="button-form button-form--positive">Usuń zlecenie</button>
										</div>
										<div class="accordion__button">
											<button type="submit" name="submit" class="button-form button-form--positive">Edytuj zlecenie</button>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
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

	document.addEventListener('DOMContentLoaded', () => {
		const headers = document.querySelectorAll('.accordion__header');

		headers.forEach(header => {
			header.addEventListener('click', () => {
				const content = header.nextElementSibling;

				if (content.style.display === 'block') {
					content.style.display = 'none';
					header.querySelector('.accordion__toggle').textContent = '+';
				} else {
					content.style.display = 'block';
					header.querySelector('.accordion__toggle').textContent = '-';
				}
			});
		});
	});

	function addRoute(id) {
		document.getElementById('add_id').value = id;
		document.getElementById('modal1').style.display = 'block';
	}

	function delRoute(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function editRoute(id, name, town, zipCode, city, street, house, latitude, longitude) {
		document.getElementById('edit_id').value = id;
		document.getElementById('edit_name').value = name;
		document.getElementById('edit_town').value = town;
		document.getElementById('edit_zipCode').value = zipCode;
		document.getElementById('edit_city').value = city;
		document.getElementById('edit_street').value = street;
		document.getElementById('edit_houseNumber').value = house;
		document.getElementById('edit_latitude').value = latitude;
		document.getElementById('edit_longitude').value = longitude;

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
</script>

</html>