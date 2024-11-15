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
			<form class="add-modal" action="/manager/location/add" method="post">
				<div class="add-modal__name">
					<div class="field">
						<label for="add_name" class="field__label">Nazwa</label>
						<input type="text" id="add_name" name="add_name" class="field__input" placeholder="Nazwa" required>
					</div>
				</div>
				<div class="add-modal__line">
					<div class="field">
						<label for="add_houseNumber" class="field__label">Numer domu</label>
						<input type="text" id="add_houseNumber" name="add_houseNumber" class="field__input" placeholder="Numer domu" required>
					</div>
					<div class="field">
						<label for="add_street" class="field__label">Ulica</label>
						<input type="text" id="add_street" name="add_street" class="field__input" placeholder="Ulica" required>
					</div>
				</div>
				<div class="add-modal__line">
					<div class="field">
						<label for="add_town" class="field__label">Miejscowość</label>
						<input type="text" id="add_town" name="add_town" class="field__input" placeholder="Miejscowość" required>
					</div>
					<div class="field">
						<label for="add_zipCode" class="field__label">Kod pocztowy</label>
						<input type="text" id="add_zipCode" name="add_zipCode" class="field__input" placeholder="Kod pocztowy" required>
					</div>
					<div class="field">
						<label for="add_city" class="field__label">Miasto</label>
						<input type="text" id="add_city" name="add_city" class="field__input" placeholder="Miasto" required>
					</div>
				</div>
				<div class="add-modal__coord">
					<div class="field">
						<label for="add_latitude" class="field__label">Wysokość geograficzna</label>
						<input type="number" id="add_latitude" name="add_latitude" class="field__input" placeholder="Wysokość geograficzna" >
					</div>
				</div>
				<div class="add-modal__coord">
					<div class="field">
						<label for="add_longitude" class="field__label">Szerokość geograficzna</label>
						<input type="number" id="add_longitude" name="add_longitude" class="field__input" placeholder="Szerokość geograficzna" >
					</div>
				</div>
				<div class="modal__actions">
					<button class="button-form button-form--positive">Confirm</button>
					<a class="button-form button-form--negative" id="cancel-button">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Account Delate</h2>
			<form action="/operator-del-profile" method="post">
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
			<form class="edit-modal" action="/operator-edit-profile" method="post">
				<div class="edit-modal__login">
					<input type="hidden" id="edit_id" name="id">
					<div class="field">
						<label for="login" class="field__label">Login</label>
						<input type="text" id="edit_login" name="login" class="field__input" required>
					</div>
				</div>
				<div class="edit-modal__name">
					<div class="field">
						<label for="name" class="field__label">Imię</label>
						<input type="text" id="edit_name" name="name" class="field__input" required>
					</div>
					<div class="field">
						<label for="lastName" class="field__label">Nazwisko</label>
						<input type="text" id="edit_lastName" name="lastName" class="field__input" required>
					</div>
				</div>
				<div class="edit-modal__name-data">
					<div class="field ">
						<label for="phoneNumber" class="field__label">Nume telefonu</label>
						<input type="text" id="edit_phoneNumber" name="phoneNumber" class="field__input" required>
					</div>
					<div class="field">
						<label for="email" class="field__label">Adres email</label>
						<input type="text" id="edit_email" name="email" class="field__input" required>
					</div>
				</div>
				<div class="edit-modal__addres">
					<div class="field">
						<label for="houseNumber" class="field__label">Numer domu</label>
						<input type="text" id="edit_houseNumber" name="houseNumber" class="field__input" required>
					</div>
					<div class="field">
						<label for="street" class="field__label">Ulica</label>
						<input type="text" id="edit_street" name="street" class="field__input" required>
					</div>
					<div class="field">
						<label for="town" class="field__label">Miejscowość</label>
						<input type="text" id="edit_town" name="town" class="field__input" required>
					</div>
					<div class="field">
						<label for="zipCode" class="field__label">Kod pocztowy</label>
						<input type="text" id="edit_zipCode" name="zipCode" class="field__input" required>
					</div>
					<div class="field">
						<label for="city" class="field__label">Miasto</label>
						<input type="text" id="edit_city" name="city" class="field__input" required>
					</div>
				</div>
				<div class="edit-modal__priv">
					<div class="select-wrapper">
						<label for="privileges" class="select-wrapper__label">Uprawnienia</label>
						<select name="privileges" id="edit_privileges" class="select-wrapper__select">
							<option value="manager">Menedżer</option>
							<option value="user">Użytkownik</option>
						</select>
					</div>
					<div class="select-wrapper">
						<label for="status" class="select-wrapper__label">Status Konta</label>
						<select name="status" id="edit_status" class="select-wrapper__select">
							<option value="new">---</option>
							<option value="block">Blokada</option>
							<option value="active">Aktywny</option>
						</select>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button-form button-form--positive">Confirm</button>
					<a class="button-form button-form--negative" id="cancel-button3">Cancel</a>
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
					<li class="sidebar__item"><a href="/manager/route" class="sidebar__link">Delegacja</a></li>
					<li class="sidebar__item"><a href="/manager/location" class="sidebar__link">Lokalizacje</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Lokalizacje</h2>
			<button class="button-form button-form--positive" onclick="addLocation()">Dodaj</button>
			<div class="user-panel">
				<table class="user-panel__table">
					<thead>
						<tr class="user-panel__row">
							<th class="user-panel__header">Location Name</th>
							<th class="user-panel__header">Miejscowość</th>
							<th class="user-panel__header">Kod pocztowy</th>
							<th class="user-panel__header">Adres</th>
							<th class="user-panel__header">Options</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($params['location'])) : ?>
							<?php foreach ($params['location'] as $location): ?>
								<tr class="user-panel__row">
									<td class="user-panel__cell"><?php echo $location['location_name']; ?></td>
									<td class="user-panel__cell"><?php echo $location['town']; ?></td>
									<td class="user-panel__cell"><?php echo $location['zip_code'] . " " . $location['city']; ?></td>
									<td class="user-panel__cell"><?php echo "ul." . $location['street'] . " " . $location['house_number']; ?></td>
									<td class="user-panel__cell user-panel__cell--options">
										<button class="user-panel__icon"><i class="icon-pencil" onclick="editLocation(
									'<?php echo $location['id_location']; ?>',
									'<?php echo $location['location_name']; ?>',
									'<?php echo $location['town']; ?>',
									'<?php echo $location['zip_code']; ?>',
									'<?php echo $location['city']; ?>',
									'<?php echo $location['street']; ?>',
									'<?php echo $location['house_number']; ?>'
									)"></i></button>
										<button class="user-panel__icon"><i class="icon-trash" onclick="delLocation(
									'<?php echo $location['id_location']; ?>'
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

	function addLocation() {
		document.getElementById('modal1').style.display = 'block';
	}

	function delLocation(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function editLocation(id, login, name, lastName, phoneNumber, email, houseNumber, street, town, zipCode, city, privileges, status) {
		document.getElementById('edit_id').value = id;
		document.getElementById('edit_login').value = login;
		document.getElementById('edit_name').value = name;
		document.getElementById('edit_lastName').value = lastName;
		document.getElementById('edit_phoneNumber').value = phoneNumber;
		document.getElementById('edit_email').value = email;
		document.getElementById('edit_houseNumber').value = houseNumber;
		document.getElementById('edit_street').value = street;
		document.getElementById('edit_town').value = town;
		document.getElementById('edit_zipCode').value = zipCode;
		document.getElementById('edit_city').value = city;

		const roleSelect = document.getElementById('edit_privileges');
		const statusSelect = document.getElementById('edit_status');
		roleSelect.value = privileges;
		statusSelect.value = status;

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