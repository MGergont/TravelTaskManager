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
					<li class="sidebar__item"><a href="/manager-dashboard" class="sidebar__link">Strona główna</a></li>
					<li class="sidebar__item"><a href="/manager/order" class="sidebar__link">Zlecenia Delegacji</a></li>
					<li class="sidebar__item"><a href="/manager/route" class="sidebar__link">Delegacja</a></li>
					<li class="sidebar__item"><a href="/manager/location" class="sidebar__link">Lokalizacje</a></li>
					<li class="sidebar__item"><a href="/manager/fleet" class="sidebar__link">Flota</a></li>
					<li class="sidebar__item"><a href="/manager/vehicle" class="sidebar__link">Samochód</a></li>
				</ul>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Manager Dashboard</h2>
			<div class="dashboard-manager">
				<?php if (isset($params['StatusOrders'])): ?>
					<div class="dashboard-manager__section">
						<h2 class="dashboard-manager__title">Status realizacji zamówień</h2>
						<div class="dashboard-manager__routes">
							<?php foreach ($params['StatusOrders'] as $orders): ?>
								<div class="dashboard-manager__route">
									<span><strong><?php echo $orders["status_order"] . " " . $orders["order_count"] . "szt. " ?></strong></span>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($params['ActiveCar'])): ?>
					<div class="dashboard-manager__section">
						<h2 class="dashboard-manager__title">Samochody z największymi kosztami eksploatacji (ostatnie 6 miesięcy)</h2>
						<?php foreach ($params['carCost'] as $cost): ?>
							<p class="dashboard-manager__costs"><?php echo $cost['license_plate'] . "<br> " . $cost['brand'] . " " . $cost['model'] . " koszt: " . $cost['total_expenses']; ?> PLN</p>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if (isset($params['ActiveCar'])): ?>
					<div class="dashboard-manager__section">
						<h2 class="dashboard-manager__title">Liczba aktywnych samochodów</h2>
						<p class="dashboard-manager__costs"><?php echo $params['ActiveCar']['active_cars']; ?> szt</p>
					</div>
				<?php endif; ?>
				<?php if (isset($params['EndInsurance'])): ?>
					<div class="dashboard-manager__section">
						<h2 class="dashboard-manager__title">Status realizacji zamówień</h2>
						<div class="dashboard-manager__routes">
							<?php foreach ($params['EndInsurance'] as $car): ?>
								<div class="dashboard-manager__route">
									<span><strong><?php echo $car["id_car"] . " | " . $car["license_plate"] . " | " . $car["brand"] . " | " . $car["model"] . " | " . date('Y-m-d', strtotime($car["end_of_insurance"])) ?></strong></span>
								</div>
							<?php endforeach ?>
						</div>
					</div>
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