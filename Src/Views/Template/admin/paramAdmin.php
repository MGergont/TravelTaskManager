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
			<h2 class="modal__title"><?php $this->LangContents('modalLockTitle')?></h2>
			<p class="modal__message"><?php $this->LangContents('modalLock1')?><strong id="pwd_failed"></strong></p>
			<form action="/admin-pwd-unlock" method="post">
				<input type="hidden" id="pwd_id" name="id">
				<div class="field-checkbox">
					<label for="unlock-account" class="field-checkbox__label"><?php $this->LangContents('modalLock2')?></label>
					<input type="checkbox" id="unlock-account" name="pwd_unlock" class="field-checkbox__input">
				</div>
				<div class="field-checkbox">
					<label for="change-password" class="field-checkbox__label"><?php $this->LangContents('modalLock3')?></label>
					<input type="checkbox" id="change-password" name="pwd_change" class="field-checkbox__input">
				</div>
				<div class="modal__password-section" id="password-section" style="display: none;">
					<div class="field">
						<label for="new-password" class="field__label"><?php $this->LangContents('modalLock4')?></label>
						<input type="password" id="new-password" name="pwd" class="field__input">
					</div>
					<div class="field">
						<label for="confirm-password" class="field__label"><?php $this->LangContents('modalLock5')?></label>
						<input type="password" id="confirm-password" name="pwd_repeat" class="field__input">
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">`
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('modalDelTitle')?></h2>
			<p class="modal__message modal__message--warning"><?php $this->LangContents('modalInfo')?></p>
			<form action="/admin-del-profile" method="post">
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
			<h2 class="modal__title"><?php $this->LangContents('modalEditTitle')?></h2>
			<form class="modal-form" action="/admin-edit-profile" method="post">
				<input type="hidden" id="edit_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_login" class="field__label"><?php $this->LangContents('modalEdit1')?></label>
							<input type="text" id="edit_login" name="login" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_name" class="field__label"><?php $this->LangContents('modalEdit2')?></label>
							<input type="text" id="edit_name" name="name" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__trio">
						<div class="field">
							<label for="edit_lastName" class="field__label"><?php $this->LangContents('modalEdit3')?></label>
							<input type="text" id="edit_lastName" name="lastName" class="field__input" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_phoneNumber" class="field__label"><?php $this->LangContents('modalEdit4')?></label>
							<input type="text" id="edit_phoneNumber" name="phoneNumber" class="field__input" required>
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="edit_email" class="field__label"><?php $this->LangContents('modalEdit5')?></label>
							<input type="text" id="edit_email" name="email" class="field__input" required>
						</div>
					</div>	
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_status" class="field__label"><?php $this->LangContents('modalEdit6')?></label>
							<select name="status" id="edit_status" class="field__input">
								<option value="new">---</option>
								<option value="block"><?php $this->LangContents('modalEdit7')?></option>
								<option value="active"><?php $this->LangContents('modalEdit8')?></option>
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
	<?php if (!empty($_SESSION["adminManagement"])) : ?>
		<?php flash("adminManagement"); ?>
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
							<a href="/admin/profile" class="menu-user__dropdown-link"><?php $this->LangContentsNav('userProfil')?></a>
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
					<li class="sidebar__item"><a href="/admin-dashboard" class="sidebar__link"><?php $this->LangContentsNav('homePage')?></a></li>
					<li class="sidebar__item"><a href="/operators" class="sidebar__link"><?php $this->LangContentsNav('user')?></a></li>
					<li class="sidebar__item"><a href="/admins" class="sidebar__link"><?php $this->LangContentsNav('admin')?></a></li>
					<li class="sidebar__item"><a href="/register" class="sidebar__link"><?php $this->LangContentsNav('addUser')?></a></li>
					<li class="sidebar__item"><a href="/parameters" class="sidebar__link"><?php $this->LangContentsNav('paramSystem')?></a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title"><?php $this->LangContents('title')?></h2>
			<div class="dashboard">
				<div class="dashboard__section">
					<h2 class="dashboard__title">Parametry hasła użytkonika</h2>
				</div>
				<div class="dashboard__section">
					<h2 class="dashboard__title">Parametry hasła admina</h2>
				</div>
				<div class="dashboard__section">
					<h2 class="dashboard__title">Parametry systemu</h2>
				</div>
				<div class="dashboard__section">
					<h2 class="dashboard__title">Test 4</h2>
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

	function pwdChanges(id, failed) {
		document.getElementById('pwd_id').value = id;
		document.getElementById('pwd_failed').innerHTML = failed;
		document.getElementById('modal1').style.display = 'block';
	}

	function delProfile(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function editProfile(id, login, name, lastName, phoneNumber, email, status) {
		document.getElementById('edit_id').value = id;
		document.getElementById('edit_login').value = login;
		document.getElementById('edit_name').value = name;
		document.getElementById('edit_lastName').value = lastName;
		document.getElementById('edit_phoneNumber').value = phoneNumber;
		document.getElementById('edit_email').value = email;

		const statusSelect = document.getElementById('edit_status');
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