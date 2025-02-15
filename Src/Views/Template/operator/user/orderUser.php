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
		<div class="modal__content modal__content--large">
			<h2 class="modal__title">Account Edit</h2>
			<form class="modal-form" method="post">
				<input type="hidden" id="edit_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__column">
						<p class="modal__message">Data wyjazdu:<samp id="dateA"></samp></p>
						<p class="modal__message">Nazwa:<samp id="nameA"></samp></p>
						<p class="modal__message">Miejscowość:<samp id="cityA"></samp></p>
						<p class="modal__message">Kod pocztowy:<samp id="zipCodeA"></samp></p>
						<p class="modal__message">Miasto:<samp id="townA"></samp></p>
						<p class="modal__message">Ulica:<samp id="streetA"></samp></p>
						<p class="modal__message">Numer domu:<samp id="numberA"></samp></p>
						<p class="modal__message">Data wyjazdu:<samp id="dateA"></samp></p>
					</div>
					<div class="modal-form__column">
						<p class="modal__message">Nazwa:<samp id="nameB"></samp></p>
						<p class="modal__message">Miejscowość:<samp id="cityB"></samp></p>
						<p class="modal__message">Kod pocztowy:<samp id="zipCodeB"></samp></p>
						<p class="modal__message">Miasto:<samp id="townB"></samp></p>
						<p class="modal__message">Ulica:<samp id="streetB"></samp></p>
						<p class="modal__message">Numer domu:<samp id="numberB"></samp></p>
						<p class="modal__message">Data Przyjazdu:<samp id="dateB"></samp></p>
					</div>
				</div>
				<div class="modal__actions">
					<a class="button button--negative" id="cancel-button">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Przyjmij zlecenie</h2>
			<form class="modal-form" action="/user/order" method="post">
				<input type="hidden" id="edit_order_id" name="id">
				<p class="modal__message">Nazwa zlecenia: </p><p class="modal__message" id="name_order"></p>
				<p class="modal__message">Data realizacji: </p><p class="modal__message" id="date_due"></p>
				<div class="modal__actions">
					<button class="button button--positive">Confirm</button>
					<a class="button button--negative" id="cancel-button2">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<?php if (!empty($_SESSION["orderUser"])) : ?>
		<?php flash("orderUser"); ?>
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
			<h2 class="content__title">Zlecenia Delegacji</h2>
			<div class="user-panel">
				<div class="accordion">
					<div class="accordion__table-wrapper">
					<div class="accordion__title">
						<div class="accordion__text"></div>
						<div class="accordion__text">Nazwa</div>
						<div class="accordion__text">Data wykonania</div>
						<div class="accordion__text">Data utworzenia/modyfikacji</div>
						<div class="accordion__text">Status</div>
						<div class="accordion__text"></div>
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
												<th>Options</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($order['locations'])) : ?>
												<?php foreach ($order['locations'] as $location): ?>
													<tr>
														<td><?php echo $location['origin_name'] . "; " . $location['origin_city']; ?></td>
														<td><?php echo $location['destination_name'] . "; " . $location['destination_city']; ?></td>
														<td>
															<button class="accordion__icon"><i class="icon-location-outline" onclick="editRoute(
															'<?php echo $location['id_route']; ?>',
															'<?php echo $location['origin_name']; ?>',
															'<?php echo $location['origin_city']; ?>',
															'<?php echo $location['origin_zip_code']; ?>',
															'<?php echo $location['origin_town']; ?>',
															'<?php echo $location['origin_street']; ?>',
															'<?php echo $location['origin_house_number']; ?>',
															'<?php echo $location['departure_time']; ?>',
															'<?php echo $location['destination_name']; ?>',
															'<?php echo $location['destination_city']; ?>',
															'<?php echo $location['destination_zip_code']; ?>',
															'<?php echo $location['destination_town']; ?>',
															'<?php echo $location['destination_street']; ?>',
															'<?php echo $location['destination_house_number']; ?>',
															'<?php echo $location['arrival_time']; ?>',
															)"></i></button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
									<div class="accordion__options">
										<div class="accordion__button">
											<button type="submit" name="submit" class="button button--positive" onclick="editOrder(
											'<?php echo $order['id_order']; ?>',
											'<?php echo $order['order_name']; ?>',
											'<?php echo $order['due_date']; ?>',
											)">Przyjmij Zlecenie</button>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
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

	function editRoute(id, nameA, cityA, zipCodeA, townA, streetA, numberA, dateA, nameB, cityB, zipCodeB, townB, streetB, numberB, dateB) {
		document.getElementById('edit_id').value = id;
		document.getElementById('nameA').innerHTML = nameA;
		document.getElementById('cityA').innerHTML = cityA;
		document.getElementById('zipCodeA').innerHTML = zipCodeA;
		document.getElementById('townA').innerHTML = townA;
		document.getElementById('streetA').innerHTML = streetA;
		document.getElementById('numberA').innerHTML = numberA;
		document.getElementById('dateA').innerHTML = dateA;

		document.getElementById('nameB').innerHTML = nameB;
		document.getElementById('cityB').innerHTML = cityB;
		document.getElementById('zipCodeB').innerHTML = zipCodeB;
		document.getElementById('townB').innerHTML = townB;
		document.getElementById('streetB').innerHTML = streetB;
		document.getElementById('numberB').innerHTML = numberB;
		document.getElementById('dateB').innerHTML = dateB;

		document.getElementById('modal1').style.display = 'block';
	}

	function editOrder(id, nameOrder, date) {
		document.getElementById('edit_order_id').value = id;
		
		document.getElementById('name_order').innerHTML = nameOrder;
		document.getElementById('date_due').innerHTML = date;

		document.getElementById('modal2').style.display = 'block';
	}

	const cancelButton = document.getElementById('cancel-button');
	const cancelButton2 = document.getElementById('cancel-button2');

	const modal1 = document.getElementById('modal1');
	const modal2 = document.getElementById('modal2');

	cancelButton.addEventListener('click', function() {
		modal1.style.display = 'none';
	});

	cancelButton2.addEventListener('click', function() {
		modal2.style.display = 'none';
	});

	document.addEventListener("keydown", (event) => {
		if (event.key === "Escape") {
			modal1.style.display = 'none';
			modal2.style.display = 'none';
		}
	});
</script>

</html>