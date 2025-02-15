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
					<li class="sidebar__item"><a href="/user/fleet" class="sidebar__link">Flota</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">User Dashboard</h2>
			<div class="dashboard">
			<div class="dashboard__section">
			<h2 class="dashboard__title">Delegacje</h2>
				<?php if (isset($params['orders'])): ?>
					<h3>Aktywan delegacja</h3>
						<p class="routs-execution__message">1<?php echo $params['orders']['order_name']; ?></p>
						<p class="routs-execution__message">2<?php echo $params['orders']['due_date']; ?></p>
						<p class="routs-execution__message">3<?php echo $params['orders']['created_at']; ?></p>
						<p class="routs-execution__message">4<?php echo $params['orders']['status_order']; ?></p>
						<br>
						<form class="modal-form" action="/user-dashboard/reject" method="post">
							<input type="hidden" id="id_order" value="<?php echo $params['orders']['id_order']; ?>" name="id_order">
							<button class="button button--negative">Anuluj</button>
						</form>
						<?php if (!empty($params['orders'])) : ?>
							<?php switch ($_SESSION['action']) {
								case 'start': ?>
									<h3>Aktualna delegacja</h3>
									<form class="modal-form" method="post" action="/user-dashboard/start">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<?php echo $params['orders']['origin_location']; ?>
										<button class="button button--positive">Confirm</button>
									</form>
								<?php break;
								case 'stop': ?>
									<h3>Koniec trasy</h3>
									<form class="modal-form" method="post" action="/user-dashboard/stop">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<?php echo $params['orders']['destination_location']; ?>
										<button class="button button--positive">Confirm</button>
									</form>
								<?php break;
								default: ?>
									<p>Witaj! Twoja rola jest nieznana.</p>
							<?php break;
							} ?>
						<?php endif; ?>
					<?php else: ?>
						Obecnie nie ma delegacji
					<?php endif ?>
				</div>
				<div class="dashboard__section">
					<!-- TODO rejestracja kosztów -->
				</div>
				<!-- Moduł samochodu -->
				<div class="dashboard__section">
					<h2 class="dashboard__title">Twój samochód</h2>
					<div class="dashboard__car-info">
						<div class="dashboard__data">
							<p><strong>Numer rejestracyjny:</strong> WX 12345</p>
							<p><strong>Marka:</strong> Volkswagen</p>
							<p><strong>Model:</strong> Golf 7</p>
							<p><strong>Przebieg:</strong> 95 000 km</p>
							<p><strong>Ubezpieczenie ważne do:</strong> 2024-05-12</p>
						</div>
					</div>
				</div>

				<!-- Moduł kosztów -->
				<div class="dashboard__section">
					<h2 class="dashboard__title">Koszty eksploatacji (ostatnie 30 dni)</h2>
					<p class="dashboard__costs">1 250 PLN</p>
				</div>

				<!-- Moduł tras -->
				<div class="dashboard__section">
					<h2 class="dashboard__title">Najbliższe trasy</h2>
					<div class="dashboard__routes">
						<div class="dashboard__route">
							<span><strong>Warszawa → Kraków</strong></span>
							<span>2024-03-10 08:30</span>
						</div>
						<div class="dashboard__route">
							<span><strong>Łódź → Gdańsk</strong></span>
							<span>2024-03-12 14:00</span>
						</div>
					</div>
				</div>

				<!-- Moduł tras -->
				<div class="dashboard__section">
					<h2 class="dashboard__title">Najbliższe trasy</h2>
					<div class="dashboard__routes">
						<div class="dashboard__route">
							<span><strong>Warszawa → Kraków</strong></span>
							<span>2024-03-10 08:30</span>
						</div>
						<div class="dashboard__route">
							<span><strong>Łódź → Gdańsk</strong></span>
							<span>2024-03-12 14:00</span>
						</div>
					</div>
				</div>
				<!-- Moduł dodatkowy -->
				<div class="dashboard__section">
					<h2 class="dashboard__title">Nowy moduł</h2>
					<p class="dashboard__data">Tu można dodać kolejne informacje...</p>
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
</script>

</html>