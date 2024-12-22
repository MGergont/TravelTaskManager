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
		<div class="modal__content modal__content--add">
			<h2 class="modal__title">Dodawanie lokalizacji</h2>
			<form class="add-modal" action="" method="post">
				<div class="add-modal__name">
					<div class="field">
						<label for="add_name" class="field__label">Nazwa</label>
						<input type="text" id="add_name" name="add_name" class="field__input" placeholder="Nazwa" required>
					</div>
				</div>
				<div class="add-modal__line">
					<div class="field">
						<label for="add_houseNumber" class="field__label">Numer domu</label>
						<input type="text" id="add_houseNumber" name="add_houseNumber" class="field__input" placeholder="Numer domu" required>
					</div>
					<div class="field">
						<label for="add_street" class="field__label">Ulica</label>
						<input type="text" id="add_street" name="add_street" class="field__input" placeholder="Ulica" required>
					</div>
				</div>
				<div class="add-modal__line">
					<div class="field">
						<label for="add_town" class="field__label">Miejscowość</label>
						<input type="text" id="add_town" name="add_town" class="field__input" placeholder="Miejscowość" required>
					</div>
					<div class="field">
						<label for="add_zipCode" class="field__label">Kod pocztowy</label>
						<input type="text" id="add_zipCode" name="add_zipCode" class="field__input" placeholder="Kod pocztowy" required>
					</div>
					<div class="field">
						<label for="add_city" class="field__label">Miasto</label>
						<input type="text" id="add_city" name="add_city" class="field__input" placeholder="Miasto" required>
					</div>
				</div>
				<div class="add-modal__coord">
					<div class="field">
						<label for="add_latitude" class="field__label">Wysokość geograficzna</label>
						<input type="text" id="add_latitude" name="add_latitude" class="field__input" placeholder="Wysokość geograficzna">
					</div>
				</div>
				<div class="add-modal__coord">
					<div class="field">
						<label for="add_longitude" class="field__label">Szerokość geograficzna</label>
						<input type="text" id="add_longitude" name="add_longitude" class="field__input" placeholder="Szerokość geograficzna">
					</div>
				</div>
				<div class="modal__actions">
					<button class="button-form button-form--positive">Confirm</button>
					<a class="button-form button-form--negative" id="cancel-button">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Route Delate</h2>
			<form action="/manager/order/dell" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button-form button-form--positive">Confirm</button>
					<a class="button-form button-form--negative" id="cancel-button2">Cancel</a>
				</div>
			</form>
		</div>
	</div>
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
			<?php if (!empty($_SESSION["addOrder"])) : ?>
				<?php flash("addOrder"); ?>
			<?php endif; ?>
			<h2 class="content__title">Dodawanie zlecenia delegacji</h2>
			<a href="/manager/order"><button name="submit" class="button-form button-form--positive">
					<< </button></a>
			<?php switch ($_SESSION['orderStatus']) {
				case 'start': ?>
					<form class="form-add" action="/manager/order/add" method="POST">
						<!-- //TODOdane osobiste -->
						<h3 class="">Wprowadź dane zlecenia</h3>
						<div class="form-add__login">
							<div class="field">
								<label for="name_order" class="field__label">Nazwa zlecenia</label>
								<input type="text" id="name_order" name="name_order" class="field__input" placeholder="Nazwa" required>
							</div>
						</div>
						<div class="form-add__priv">
							<div class="select-wrapper">
								<label for="user_order" class="select-wrapper__label">Użytkownik (Login/Name)</label>
								<select name="user_order" id="user_order" class="select-wrapper__select">
									<?php foreach ($params['users'] as $veh): ?>
										<option value="<?php echo $veh['id_operator']; ?>">
											<?php echo $veh['login'] . " // " . $veh['name'] . " " . $veh['last_name']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-add__login">
							<div class="field">
								<label for="date_due" class="field__label">Data realizacji</label>
								<input type="date" id="date_due" name="date_due" class="field__input" required>
							</div>
						</div>
						<button type="submit" class="button-form button-form--positive">Dodaj</button>
					</form>
				<?php break;
				case 'location': ?>
					<form class="form-add" action="/manager/order/next" method="POST">
						<!-- //TODOdane osobiste -->
						<h3 class="">Wprowadź dane lokalizacji A</h3>
						<div class="modal__form-group">
							<!-- //TODO przełącznik start -->
							<input type="checkbox" id="home_adres_togle" class="modal__checkbox" name="home_adres_togle">
							<label for="home_adres_togle" class="modal__label">Adres zamieszkania</label>
						</div>
						<input type="hidden" name="id_home_location" value="<?php echo $params['adresHome']['id_address'] ?>"/>
						<div class="form-add" id="home_adres_view" style="display: none;">
							<?php if (isset($params['adresHome'])) : ?>
								<?php echo $params['adresHome']['town'] ?>
								<?php echo $params['adresHome']['street'] ?>
								<?php echo $params['adresHome']['house_number'] . "<br>" ?>
								<?php echo $params['adresHome']['zip_code'] ?>
								<?php echo $params['adresHome']['city'] ?>
							<?php endif; ?>
						</div>
						<div class="form-add__priv" id="home_adres" style="display: block;">
							<div class="select-wrapper">
								<label for="location_order_A" class="select-wrapper__label">Punkt startowyk</label>
								<select name="location_order_A" id="location_order_A" class="select-wrapper__select">
									<?php foreach ($params['location'] as $veh): ?>
										<option value="<?php echo $veh['id_location']; ?>">
											<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-add__login">
							<div class="field">
								<label for="departure_date_A" class="field__label">Data wyjazdu(opcjonalnie)</label>
								<input type="datetime-local" id="departure_date_A" name="departure_date_A" class="field__input">
							</div>
						</div>
						<h3 class="">Wprowadź dane lokalizacji B</h3>
						<div class="form-add__priv" id="home_adres" style="display: block;">
							<div class="select-wrapper">
								<label for="location_order_B" class="select-wrapper__label">Punkt końcowy</label>
								<select name="location_order_B" id="location_order_B" class="select-wrapper__select">
									<?php foreach ($params['location'] as $veh): ?>
										<option value="<?php echo $veh['id_location']; ?>">
											<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-add__login">
							<div class="field">
								<label for="arrival_date" class="field__label">Data przyjazdu(opcjonalnie)</label>
								<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
							</div>
						</div>
						<div class="form-add__login">
							<div class="field">
								<label for="departure_date_B" class="field__label">Data odjazdu(opcjonalnie)</label>
								<input type="datetime-local" id="departure_date_B" name="departure_date_B" class="field__input">
							</div>
						</div>
						<button type="submit" class="button-form button-form--positive">Dodaj</button>
						<a href="/manager/order/clean" class="button-form button-form--positive">Anuluj</a>
						<a class="button-form button-form--positive" onclick="addLocation()">Dodaj lokalizacje</a>
					</form>
				<?php break;
				case 'location2': ?>
					<form class="form-add" action="/manager/order/end" method="POST">
						<!-- //TODOdane osobiste -->
						<h3 class="">Poprzedni punkt końca trasy A</h3>
						<?php echo $params['locationA']['location_name'] ?>
						<?php echo $params['locationA']['city'] ?>
						<?php echo $params['locationA']['zip_code'] ?>
						<?php echo $params['locationA']['town'] ?>
						<?php echo $params['locationA']['street'] ?>
						<?php echo $params['locationA']['house_number'] ?>
						<p>Adres</p>
						<h3 class="">Wprowadź dane lokalizacji B</h3>
						<div class="form-add__priv">
							<input type="hidden" name="location_order_A" value="<?php echo $params['locationA']['id_location'] ?>">
							<div class="select-wrapper">
								<label for="location_order_B" class="select-wrapper__label">Punkt końcowy</label>
								<select name="location_order_B" id="location_order_B" class="select-wrapper__select">
									<?php foreach ($params['location'] as $veh): ?>
										<option value="<?php echo $veh['id_location']; ?>">
											<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-add__login">
							<div class="field">
								<label for="arrival_date" class="field__label">Data przyjazdu(opcjonalnie)</label>
								<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
							</div>
						</div>
						<button type="submit" class="button-form button-form--positive">Dodaj</button>
						<a href="/manager/order/clean" class="button-form button-form--positive">Koniec</a>
						<a class="button-form button-form--positive" onclick="addLocation()">Dodaj lokalizacje</a>
					</form>
				<?php break;
				default: ?>
					<p>Witaj! Twoja rola jest nieznana.</p>
			<?php break;
			} ?>

		<?php if (!empty($params['orderList'])) : ?>
			<div class="user-panel">
				<table class="user-panel__table">
					<thead>
						<tr class="user-panel__row">
							<th class="user-panel__header">Lokalizacja A | Nazwa | Adres</th>
							<th class="user-panel__header">Lokalizacja B | Nazwa | Adres</th>
							<th class="user-panel__header">Options</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($params['orderList'] as $orderList): ?>
								<tr class="user-panel__row">
									<td class="user-panel__cell"><?php echo $orderList['origin_location'] . "; " . $orderList['origin_city']. "ul." . $orderList['origin_street'] . " " . $orderList['origin_house_number']; ?></td>
									<td class="user-panel__cell"><?php echo $orderList['destination_location'] . "; " . $orderList['destination_city']. "ul." . $orderList['destination_street'] . " " . $orderList['destination_house_number']; ?></td>
									<td class="user-panel__cell user-panel__cell--options">
										<button class="user-panel__icon"><i class="icon-pencil" onclick="editLocation(
									'<?php echo $orderList['id_route']; ?>',
									'<?php echo $orderList['origin_location']; ?>'
									)"></i></button>
										<button class="user-panel__icon"><i class="icon-trash" onclick="delLocation(
									'<?php echo $orderList['id_route']; ?>'
									)"></i></button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php endif; ?>
		</main>
	</div>
</body>
<script>
	const togleSection = document.getElementById('home_adres');
	const togleSectionAdres = document.getElementById('home_adres_view');
	const adresCheckbox = document.getElementById('home_adres_togle');
	const adresListCheckbox = document.getElementById('list_adres_togle');
	const sidebar = document.querySelector('.sidebar');
	const topbarHamburger = document.querySelector('.topbar__hamburger');
	
	const modal1 = document.getElementById('modal1');
	const modal2 = document.getElementById('modal2');

	const cancelButton = document.getElementById('cancel-button');
    const cancelButton2 = document.getElementById('cancel-button2');
                        
	function toggleSidebar() {
		sidebar.classList.toggle('sidebar--hidden');
	};

	if (topbarHamburger) {
		topbarHamburger.addEventListener('click', toggleSidebar);
	};

	function delLocation(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}
	
	function addLocation() {
		document.getElementById('modal1').style.display = 'block';
	};
	
	cancelButton.addEventListener('click', function() {
		modal1.style.display = 'none';
	});

	cancelButton2.addEventListener('click', function() {
		modal2.style.display = 'none';
	});

	adresCheckbox.addEventListener('change', function() {
		if (this.checked) {
			togleSection.style.display = 'none';
		} else {
			togleSection.style.display = 'block';
		}

		if (this.checked) {
			togleSectionAdres.style.display = 'block';
		} else {
			togleSectionAdres.style.display = 'none';
		}
	});
</script>

</html>