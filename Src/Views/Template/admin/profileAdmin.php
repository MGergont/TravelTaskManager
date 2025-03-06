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
			<h2 class="modal__title"><?php $this->LangContents('modalLockTitle') ?></h2>
			<form action="" method="post">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="new-password" class="field__label"><?php $this->LangContents('modalLock4') ?></label>
							<input type="password" id="new-password" name="pwd" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="confirm-password" class="field__label"><?php $this->LangContents('modalLock5') ?></label>
							<input type="password" id="confirm-password" name="pwd_repeat" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="confirm-password" class="field__label"><?php $this->LangContents('modalLock5') ?></label>
							<input type="password" id="confirm-password" name="pwd_repeat" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf') ?></button>
					<a id="cancel-button" class="button button--negative"><?php $this->LangContents('btmCancel') ?></a>
				</div>
			</form>
		</div>
	</div>
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
							<a href="/admin/profile" class="menu-user__dropdown-link"><?php $this->LangContentsNav('userProfil') ?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="#" class="menu-user__dropdown-link"><?php $this->LangContentsNav('settings') ?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="/logout" class="menu-user__dropdown-link"><?php $this->LangContentsNav('logOut') ?></a>
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
					<li class="sidebar__item"><a href="/admin-dashboard" class="sidebar__link"><?php $this->LangContentsNav('homePage') ?></a></li>
					<li class="sidebar__item"><a href="/operators" class="sidebar__link"><?php $this->LangContentsNav('user') ?></a></li>
					<li class="sidebar__item"><a href="/admins" class="sidebar__link"><?php $this->LangContentsNav('admin') ?></a></li>
					<li class="sidebar__item"><a href="/register" class="sidebar__link"><?php $this->LangContentsNav('addUser') ?></a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title"><?php $this->LangContents('title') ?></h2>
			<div class="profile">
				<div class="profile__section">
					<h2 class="profile__title">Dane osobowe</h2>
					<div class="profile__data">
						<p><strong>Imię:</strong> Jan</p>
						<p><strong>Nazwisko:</strong> Kowalski</p>
						<p><strong>Email:</strong> jan.kowalski@example.com</p>
						<p><strong>Telefon:</strong> 123-456-789</p>
					</div>
				</div>
				<div class="profile__section">
					<h2 class="profile__title">Adres</h2>
					<div class="profile__data">
						<p><strong>Ulica:</strong> Kwiatowa 15</p>
						<p><strong>Miejscowość:</strong> Warszawa</p>
						<p><strong>Kod pocztowy:</strong> 00-123</p>
						<p><strong>Kraj:</strong> Polska</p>
					</div>
				</div>
				<button class="button button--positive" onclick="pwdChange()">Zmień hasło</button>
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

	function pwdChange() {
		document.getElementById('modal1').style.display = 'block';
	}

	const cancelButton = document.getElementById('cancel-button');
	const modal1 = document.getElementById('modal1');

	cancelButton.addEventListener('click', function() {
		modal1.style.display = 'none';
	});

	document.addEventListener("keydown", (event) => {
		if (event.key === "Escape") {
			modal1.style.display = 'none';
		}
	});
</script>

</html>