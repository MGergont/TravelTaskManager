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
					<li class="sidebar__item"><a href="/manager/order" class="sidebar__link">Zlecenia Delegacji</a></li>
					<li class="sidebar__item"><a href="/manager/route" class="sidebar__link">Delegacja</a></li>
					<li class="sidebar__item"><a href="/manager/location" class="sidebar__link">Lokalizacje</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Zlecenia Delegacji</h2>
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
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($order['locations'])) : ?>
												<?php foreach ($order['locations'] as $location): ?>
													<tr>
														<td><?php echo $location['origin_name'] ."; ". $location['origin_city']; ?></td>
														<td><?php echo $location['destination_name'] ."; ". $location['destination_city']; ?></td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
									<div class="accordion__options">
										<div class="accordion__button">
											<button type="submit" name="submit" class="button-form button-form--positive">Dodaj punkt</button>
										</div>
										<div class="accordion__button">
											<button type="submit" name="submit" class="button-form button-form--positive">Edytuj punkty</button>
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
</script>

</html>