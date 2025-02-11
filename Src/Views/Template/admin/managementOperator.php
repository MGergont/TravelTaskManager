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
			<h2 class="modal__title">Account Locked</h2>
			<p class="modal__message">Number of failed login attempts: <strong id="pwd_failed"></strong></p>
			<form action="/operator-pwd-unlock" method="post">
				<input type="hidden" id="pwd_id" name="id">
				<div class="field-checkbox">
					<label for="unlock-account" class="field-checkbox__label">Unlock account</label>
					<input type="checkbox" id="unlock-account" name="pwd_unlock" class="field-checkbox__input">
				</div>
				<div class="field-checkbox">
					<label for="change-password" class="field-checkbox__label">Change password</label>
					<input type="checkbox" id="change-password" name="pwd_change" class="field-checkbox__input">
				</div>
				<div class="modal__password-section" id="password-section" style="display: none;">
					<div class="field">
						<label for="new-password" class="field__label">New Password</label>
						<input type="password" id="new-password" name="pwd" class="field__input">
					</div>
					<div class="field">
						<label for="confirm-password" class="field__label">Confirm Password</label>
						<input type="password" id="confirm-password" name="pwd_repeat" class="field__input">
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive">Confirm</button>
					<a id="cancel-button" class="button button--negative">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Account Delate</h2>
			<p class="modal__message modal__message--warning">! Konto zostanie trwale usunięte, czy chcesz potwierdzić !</p>
			<form action="/operator-del-profile" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button button--positive">Confirm</button>
					<a class="button button--negative" id="cancel-button2">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content modal__content--large">
			<h2 class="modal__title">Account Edit</h2>
			<form class="modal-form" action="/operator-edit-profile" method="post">
				<input type="hidden" id="edit_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_login" class="field__label">Login</label>
							<input type="text" id="edit_login" name="login" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_name" class="field__label">Imię</label>
							<input type="text" id="edit_name" name="name" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_lastName" class="field__label">Nazwisko</label>
							<input type="text" id="edit_lastName" name="lastName" class="field__input" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_phoneNumber" class="field__label">Nume telefonu</label>
							<input type="text" id="edit_phoneNumber" name="phoneNumber" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_email" class="field__label">Adres email</label>
							<input type="text" id="edit_email" name="email" class="field__input" required>
						</div>
					</div>
				</div>

				<div class="modal-form__row">
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_houseNumber" class="field__label">Numer domu</label>
							<input type="text" id="edit_houseNumber" name="houseNumber" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_street" class="field__label">Ulica</label>
							<input type="text" id="edit_street" name="street" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_town" class="field__label">Miejscowość</label>
							<input type="text" id="edit_town" name="town" class="field__input" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_zipCode" class="field__label">Kod pocztowy</label>
							<input type="text" id="edit_zipCode" name="zipCode" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_city" class="field__label">Miasto</label>
							<input type="text" id="edit_city" name="city" class="field__input" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_privileges" class="field__label">Uprawnienia</label>
							<select name="privileges" id="edit_privileges" class="field__input">
								<option value="manager">Menedżer</option>
								<option value="user">Użytkownik</option>
							</select>
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_status" class="field__label">Status Konta</label>
							<select name="status" id="edit_status" class="field__input">
								<option value="new">---</option>
								<option value="block">Blokada</option>
								<option value="active">Aktywny</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button type="submit" class="button button--positive">Confirm</button>
					<a class="button button--negative" id="cancel-button3">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<?php if (!empty($_SESSION["operatorsManagment"])) : ?>
		<?php flash("operatorsManagment"); ?>
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
					<li class="sidebar__item"><a href="/admin-dashboard" class="sidebar__link">Strona główna</a></li>
					<li class="sidebar__item"><a href="/operators" class="sidebar__link">Operatorzy</a></li>
					<li class="sidebar__item"><a href="/admins" class="sidebar__link">Administracja</a></li>
					<li class="sidebar__item"><a href="/register" class="sidebar__link">Dodaj użytkownika</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Operatorzy</h2>
			<div class="user-panel">
				<table class="user-panel__table">
					<thead>
						<tr class="user-panel__row">
							<th class="user-panel__header">First Name</th>
							<th class="user-panel__header">Last Name</th>
							<th class="user-panel__header">Login</th>
							<th class="user-panel__header">Phone</th>
							<th class="user-panel__header">Email</th>
							<th class="user-panel__header user-panel__header--status">Status</th>
							<th class="user-panel__header">Last Login</th>
							<th class="user-panel__header">Permissions</th>
							<th class="user-panel__header">Options</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($params['operators'])) : ?>
							<?php foreach ($params['operators'] as $operator): ?>
								<tr class="user-panel__row">
									<td class="user-panel__cell"><?php echo $operator['name']; ?></td>
									<td class="user-panel__cell"><?php echo $operator['last_name']; ?></td>
									<td class="user-panel__cell"><?php echo $operator['login']; ?></td>
									<td class="user-panel__cell"><?php echo $operator['phone_number']; ?></td>
									<td class="user-panel__cell"><?php echo $operator['email']; ?></td>
									<td class="user-panel__cell  user-panel__cell--<?php echo $operator['user_status']; ?>"><?php echo $operator['user_status']; ?></td>
									<td class="user-panel__cell"><?php echo $operator['last_login']; ?></td>
									<td class="user-panel__cell"><?php echo $operator['user_grant']; ?></td>
									<td class="user-panel__cell user-panel__cell--options">
										<button class="user-panel__icon"><i class="icon-pencil" onclick="editProfile(
									'<?php echo $operator['id_operator']; ?>',
									'<?php echo $operator['login']; ?>',
									'<?php echo $operator['name']; ?>',
									'<?php echo $operator['last_name']; ?>',
									'<?php echo $operator['phone_number']; ?>',
									'<?php echo $operator['email']; ?>',
									'<?php echo $operator['house_number']; ?>',
									'<?php echo $operator['street']; ?>',
									'<?php echo $operator['town']; ?>',
									'<?php echo $operator['zip_code']; ?>',
									'<?php echo $operator['city']; ?>',
									'<?php echo $operator['user_grant']; ?>',
									'<?php echo $operator['user_status']; ?>'
									)"></i></button>
										<button class="user-panel__icon"><i class="icon-key" onclick="pwdChanges(
									'<?php echo $operator['id_operator']; ?>',
									'<?php echo $operator['login_error']; ?>'
									)"></i></button>
										<button class="user-panel__icon"><i class="icon-trash" onclick="delProfile(
									'<?php echo $operator['id_operator']; ?>'
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

	function pwdChanges(id, failed) {
		document.getElementById('pwd_id').value = id;
		document.getElementById('pwd_failed').innerHTML = failed;
		document.getElementById('modal1').style.display = 'block';
	}

	function delProfile(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function editProfile(id, login, name, lastName, phoneNumber, email, houseNumber, street, town, zipCode, city, privileges, status) {
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

	const changePasswordCheckbox = document.getElementById('change-password');
	const passwordSection = document.getElementById('password-section');
	const cancelButton = document.getElementById('cancel-button');
	const cancelButton2 = document.getElementById('cancel-button2');
	const cancelButton3 = document.getElementById('cancel-button3');
	const modal1 = document.getElementById('modal1');
	const modal2 = document.getElementById('modal2');
	const modal3 = document.getElementById('modal3');

	changePasswordCheckbox.addEventListener('change', function() {
		if (this.checked) {
			passwordSection.style.display = 'block';
		} else {
			passwordSection.style.display = 'none';
		}
	});

	// cancelButton3.addEventListener("click", closeModal);

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