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
			<form action="/admin-pwd-unlock" method="post">
				<input type="hidden" id="pwd_id" name="id">
				<div class="modal__form-group">
					<input type="checkbox" id="unlock-account" class="modal__checkbox" name="pwd_unlock">
					<label for="unlock-account" class="modal__label">Unlock account</label>
				</div>
				<div class="modal__form-group">
					<input type="checkbox" id="change-password" class="modal__checkbox" name="pwd_change">
					<label for="change-password" class="modal__label">Change password</label>
				</div>
				<div class="modal__password-section" id="password-section" style="display: none;">
					<div class="modal__form-group">
						<label for="new-password" class="modal__label">New Password</label>
						<input type="password" id="new-password" class="modal__input" placeholder="Enter new password" name="pwd">
					</div>
					<div class="modal__form-group">
						<label for="confirm-password" class="modal__label">Confirm Password</label>
						<input type="password" id="confirm-password" class="modal__input" placeholder="Confirm new password" name="pwd_repeat">
					</div>
				</div>
				<div class="modal__actions">
					<button class="modal__button modal__button--confirm">Confirm</button>
					<a class="modal__button modal__button--cancel" id="cancel-button">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Account Delate</h2>
			<form action="/admin-del-profile" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="modal__button modal__button--confirm">Confirm</button>
					<a class="modal__button modal__button--cancel" id="cancel-button2">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Account Edit</h2>
			<form class="edit-modal" action="/admin-edit-profile" method="post">
				<input type="hidden" id="edit_id" name="id">
				<div class="field">
					<label for="login" class="field__label">Login</label>
					<input type="text" id="login" name="login" class="field__input" placeholder="Login" required>
				</div>
				<div class="field">
					<label for="name" class="field__label">Imię</label>
					<input type="text" id="name" name="name" class="field__input" placeholder="Imię" required>
				</div>
				<div class="field">
					<label for="lastName" class="field__label">Nazwisko</label>
					<input type="text" id="lastName" name="lastName" class="field__input" placeholder="Nazwisko" required>
				</div>
				<div class="field">
					<label for="phoneNumber" class="field__label">Nume telefonu</label>
					<input type="text" id="phoneNumber" name="phoneNumber" class="field__input" placeholder="Nume telefonu" required>
				</div>
				<div class="field">
					<label for="email" class="field__label">Adres email</label>
					<input type="text" id="email" name="email" class="field__input" placeholder="Adres email" required>
				</div>
				<div class="field">
					<label for="houseNumber" class="field__label">Numer domu</label>
					<input type="text" id="houseNumber" name="houseNumber" class="field__input" placeholder="Numer domu" required>
				</div>
				<div class="field">
					<label for="street" class="field__label">Ulica</label>
					<input type="text" id="street" name="street" class="field__input" placeholder="Ulica" required>
				</div>
				<div class="field">
					<label for="town" class="field__label">Miejscowość</label>
					<input type="text" id="town" name="town" class="field__input" placeholder="Miejscowość" required>
				</div>
				<div class="field">
					<label for="zipCode" class="field__label">Kod pocztowy</label>
					<input type="text" id="zipCode" name="zipCode" class="field__input" placeholder="Kod pocztowy" required>
				</div>
				<div class="field">
					<label for="city" class="field__label">Miasto</label>
					<input type="text" id="city" name="city" class="field__input" placeholder="Miasto" required>
				</div>
				<div class="select-wrapper">
					<label for="privileges" class="select-wrapper__label">Uprawnienia</label>
					<select name="privileges" id="privileges" class="select-wrapper__select">
						<option value="manager">Menedżer</option>
						<option value="user">Użytkownik</option>
					</select>
				</div>
				<div class="modal__actions">
					<button class="modal__button modal__button--confirm">Confirm</button>
					<a class="modal__button modal__button--cancel" id="cancel-button3">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<?php if (!empty($_SESSION["pwdUnlock"])) : ?>
		<?php flash("pwdUnlock"); ?>
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
					<li class="sidebar__item"><a href="/register" class="sidebar__link">Dodaj użytkownika</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Admin Dashboard</h2>
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
									'<?php echo $operator['id_operator']; ?>'
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

	function editProfile(id) {
		document.getElementById('edit_id').value = id;
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