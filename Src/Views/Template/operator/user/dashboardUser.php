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
	<?php if (!empty($_SESSION["dashboard"])) : ?>
		<?php flash("dashboard"); ?>
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
							<a href="/logout-ope" class="menu-user__dropdown-link">wyloguj się</a>
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
					<li class="sidebar__item"><a href="/user-dashboard" class="sidebar__link">Strona główna</a></li>
					<li class="sidebar__item"><a href="/user/route" class="sidebar__link">Delegacja</a></li>
					<li class="sidebar__item"><a href="/user/order" class="sidebar__link">Zlecenia delegacji</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">User Dashboard</h2>
			<div class="user-panel">
				<?php if (isset($params['orders'])): ?>
					<h3>Aktywan delegacja</h3>
						<?php echo $params['orders']['order_name']; ?>
						<?php echo $params['orders']['due_date']; ?>
						<?php echo $params['orders']['created_at']; ?>
						<?php echo $params['orders']['status_order']; ?>
						<br>
						<form action="/user-dashboard/reject" method="post">
							<input type="hidden" id="id_order" value="<?php echo $params['orders']['id_order']; ?>" name="id_order">
							<button class="button-form button-form--negative">Anuluj</button>
						</form>
						<?php if (!empty($params['orders'])) : ?>
							<?php switch ($_SESSION['action']) {
								case 'start': ?>
									<h3>Aktualna delegacja</h3>
										<form method="post" action="/user-dashboard/start">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<br>---------------<br>
										<br>
										<?php echo $params['orders']['origin_location']; ?>
										<button class="button-form button-form--positive">Confirm</button>
										</form>
								<?php break;
								case 'stop': ?>
									<h3>Koniec trasy</h3>
										<form method="post" action="/user-dashboard/stop">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<br>---------------<br>
										<?php echo $params['orders']['destination_location']; ?>
										<button class="button-form button-form--positive">Confirm</button>
										</form>
								<?php break;
								default: ?>
									<p>Witaj! Twoja rola jest nieznana.</p>
							<?php break;
							} ?>
						<?php endif; ?>
				<?php endif; ?>
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
</script>

</html>