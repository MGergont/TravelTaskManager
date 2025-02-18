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
						<p class="routs-execution__message"><strong>Nazwa delegacji: </strong><?php echo $params['orders']['order_name']; ?></p>
						<p class="routs-execution__message"><strong>Data realizacji: </strong><?php echo $params['orders']['due_date']; ?></p>
						<p class="routs-execution__message"><strong>Data utworzenia: </strong><?php echo date('Y-m-d', strtotime($params['orders']['created_at'])); ?></p>
						<p class="routs-execution__message"><strong>Status: </strong><?php echo $params['orders']['status_order']; ?></p>
						<br>
						<form class="modal-form" action="/user-dashboard/reject" method="post">
							<input type="hidden" id="id_order" value="<?php echo $params['orders']['id_order']; ?>" name="id_order">
							<button class="button button--negative">Anuluj</button>
						</form>
						<?php if (!empty($params['orders'])) : ?>
							<?php switch ($_SESSION['action']) {
								case 'start': ?>
									<h3>Aktualna cel</h3>
									<form class="modal-form" method="post" action="/user-dashboard/start">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<?php echo $params['orders']['origin_city']. "<br> " .$params['orders']['origin_zip_code']. " " .$params['orders']['origin_town']. " ul. " . $params['orders']['origin_street']. " " . $params['orders']['origin_house_number']; ?>
										<button class="button button--positive">Confirm</button>
									</form>
								<?php break;
								case 'stop': ?>
									<h3>Koniec trasy</h3>
									<form class="modal-form" method="post" action="/user-dashboard/stop">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<?php echo $params['orders']['destination_city']. "<br> " .$params['orders']['destination_zip_code']. " " .$params['orders']['destination_town']. " ul. " . $params['orders']['destination_street']. " " . $params['orders']['destination_house_number']; ?>
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
					<h2 class="dashboard__title">Dopisz koszt do delegacji</h2>
					<form class="modal-form" action="/user/order" method="post">
						<div class="modal-form__row">
							<div class="modal-form__full">
								<div class="field">
									<label for="StopRoute" class="field__label">Dodaj opis kosztu delegacji</label>
									<input type="text" id="StopRoute" name="StopRoute" class="field__input" placeholder="opis" required>
								</div>
							</div>
						</div>
						<div class="modal-form__row">
							<div class="modal-form__full">
								<div class="field">
									<label for="StopRoute" class="field__label">Dodaj kwotę</label>
									<input type="number" step="0.01" min="0" id="add_amount" name="add_amount" class="field__input" placeholder="kwota" required>
								</div>
							</div>
						</div>
						<div class="modal__actions">
							<button class="button button--positive">Confirm</button>
							<a class="button button--negative" id="cancel-button2">Cancel</a>
						</div>
					</form>
				</div>
				<!-- Moduł samochodu -->
				<?php if (isset($params['car'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Twój samochód</h2>
						<div class="dashboard__car-info">
							<div class="dashboard__data">
								<p><strong>Numer rejestracyjny:</strong> <?php echo $params['car']['license_plate'] ?></p>
								<p><strong>Marka:</strong> <?php echo $params['car']['brand'] ?></p>
								<p><strong>Model:</strong> <?php echo $params['car']['model'] ?></p>
								<p><strong>Przebieg:</strong> <?php echo $params['car']['mileage'] ?> km</p>
								<p><strong>Ubezpieczenie ważne do:</strong> <?php echo $params['car']['end_of_insurance'] ?></p>
							</div>
						</div>
						<img src="resources\image\car\img_67af4a168fea49.94863134.jpg" alt="Samochód" class="dashboard__car-image">
					</div>
				<?php endif; ?>

				<!-- Moduł kosztów -->
				<div class="dashboard__section">
					<h2 class="dashboard__title">Koszty eksploatacji (ostatnie 30 dni)</h2>
					<p class="dashboard__costs"><?php echo $params['carCost']['total_costs'] ?> PLN</p>
				</div>

				<!-- Moduł tras -->
				<?php if (isset($params['showOrder'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Najbliższe trasy</h2>
						<p><strong>Zlecenie:</strong> <?php echo $params['showOrder'][0]["order_name"] . " " . $params['showOrder'][0]["due_date"] ?></p>
						<div class="dashboard__routes">
							<?php foreach ($params['showOrder'] as $order): ?>
								<div class="dashboard__route">
									<span><strong><?php echo $order["origin_location"] . " → " . $order["destination_location"] ?></strong></span>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif; ?>
				<!-- Moduł kosztów -->
				<?php if (isset($params['showDistance'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Statystyka tras (ostatnie 30 dni)</h2>
						<p class="dashboard__costs"><strong>Przebyty dystans:</strong> <?php echo $params['showDistance']['total_distance'] ?> KM</p>
						<p class="dashboard__costs"><strong>Ilość tras:</strong> <?php echo $params['showDistance']['total_routes'] ?> szt</p>
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